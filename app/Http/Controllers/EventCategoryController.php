<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\EventCategory;

class EventCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = EventCategory::latest()->paginate(20);
        return view('admin.events.category_list',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $route = route('admin.event-categories.store');
        return view('admin.events.category_add_edit',compact('route'));
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
            'name' => 'required|max:191',
            'description' => 'required|max:1000'
        ]);

        $row = new EventCategory();
        $row->name = $request->name;
        $row->slug = Str::slug($request->name);
        $row->description = $request->description;
        $row->save();
        return redirect()->route('admin.event-categories.index')->with(savedMessage());
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
        $data = EventCategory::findOrFail($id);
        $route = route('admin.event-categories.update',$id);
        return view('admin.events.category_add_edit',compact('data','route'));
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
            'name' => 'required|max:191',
            'description' => 'required|max:1000'
        ]);

        $row = EventCategory::findOrFail($id);
        $row->name = $request->name;
        $row->slug = Str::slug($request->name);
        $row->description = $request->description;
        $row->save();
        return redirect()->route('admin.event-categories.index')->with(updateMessage());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // EventCategory::findOrFail($id)->delete();
        // return redirect()->route('admin.event-categories.index')->with(deleteMessage());
    }
}
