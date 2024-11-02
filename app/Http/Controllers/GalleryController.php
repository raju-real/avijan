<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Gallery::query();
        $data->when(request()->get('title'),function($query) {
            $title = request()->get('title');
            $query->where('title',"LIKE","%{$title}%");
        });
       
        if(request()->has('display_on_slider')) {
            $data->where('display_on_slider',request()->get('display_on_slider'));
        }
        
        $galleries = $data->paginate(20);
        return view('admin.gallery.gallery_list',compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $route = route('admin.galleries.store');
        return view('admin.gallery.gallery_add_edit',compact('route'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|max:191',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:5120',
            'display_on_slider' => 'required|in:0,1'
        ]);

        $row = new gallery();
        $row->title = $request->title;
        if($request->file('image')) {
            $row->photo_path = uploadImage($request->file('image'),'assets/admin/files/images/galleries/');
        }
        $row->display_on_slider = $request->display_on_slider;
        $row->save();
        return redirect()->route('admin.galleries.index')->with(savedMessage());
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Gallery::findOrFail($id);
        $route = route('admin.galleries.update',$data->id);
        return view('admin.gallery.gallery_add_edit',compact('route','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required|max:191',
            'image' => 'nullable|sometimes|image|mimes:png,jpg,jpeg|max:5120',
            'display_on_slider' => 'required|in:0,1'
        ]);
        $row = Gallery::findOrFail($id);
        $row->title = $request->title;
        if($request->file('image')) {
            $row->photo_path = uploadImage($request->file('image'),'assets/admin/files/images/galleries/');
        }
        $row->display_on_slider = $request->display_on_slider;
        $row->save();
        return redirect()->route('admin.galleries.index')->with(updateMessage());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gallery::findOrFail($id)->delete();
        return redirect()->route('admin.galleries.index')->with(deleteMessage());
    }
}
