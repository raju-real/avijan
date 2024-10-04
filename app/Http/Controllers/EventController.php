<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventCategory;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Event::query();
        $data->when(request()->get('title'),function($query) {
            $title = request()->get('title');
            $query->where('title',"LIKE","%{$title}%");
        });
        $data->when(request()->get('category'),function($query) {
            $query->where('category_id',request()->get('category'));
        });
        $data->when(request()->get('status'),function($query) {
            $query->where('status',request()->get('status'));
        });
        $data->when(request()->get('is_active'),function($query) {
            $query->where('is_active',request()->get('is_active'));
        });
        $events = $data->paginate(20);
        return view('admin.events.event_list',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $route = route('admin.events.store');
        return view('admin.events.event_add_edit',compact('route'));
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
            'status' => 'required|in:0,1',
            'description' => 'required|max:10000'
        ]);

        $row = new Article();
        $row->title = $request->title;
        $row->slug = Str::slug($request->title);
        if($request->file('image')) {
            $row->image = uploadImage($request->file('image'),'assets/admin/files/images/articles/');
        }
        $row->description = $request->description;
        $row->status = $request->status;
        $row->created_by = Auth::id();
        $row->save();
        return redirect()->route('admin.articles.index')->with(savedMessage());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            'status' => 'required|in:0,1',
            'description' => 'required|max:10000'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
