<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Slider::query();
        $data->when(request()->get('title'),function($query) {
            $title = request()->get('title');
            $query->where('title',"LIKE","%{$title}%");
        });
        $sliders = $data->paginate(20);
        return view('admin.slider.slider_list',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $route = route('admin.sliders.store');
        return view('admin.slider.slider_add_edit',compact('route'));
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
            'status' => 'required|in:0,1'
        ]);

        $row = new slider();
        $row->title = $request->title;
        if($request->file('image')) {
            $row->photo_path = uploadImage($request->file('image'),'assets/admin/files/images/sliders/');
        }
        $row->status = $request->status;
        $row->save();
        return redirect()->route('admin.sliders.index')->with(savedMessage());
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Slider::findOrFail($id);
        $route = route('admin.sliders.update',$data->id);
        return view('admin.slider.slider_add_edit',compact('route','data'));
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
            'status' => 'required|in:0,1'
        ]);
        $row = Slider::findOrFail($id);
        $row->title = $request->title;
        if($request->file('image')) {
            $row->photo_path = uploadImage($request->file('image'),'assets/admin/files/images/sliders/');
        }
        $row->status = $request->status;
        $row->save();
        return redirect()->route('admin.sliders.index')->with(updateMessage());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Slider::findOrFail($id)->delete();
        return redirect()->route('admin.sliders.index')->with(deleteMessage());
    }
}
