<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventPhoto;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
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
        $data->when(request()->get('title'), function ($query) {
            $title = request()->get('title');
            $query->where('title', "LIKE", "%{$title}%");
        });

        if(request()->has('category')) {
            $data->where('category_id',request()->get('category_id'));
        }
        if(request()->has('status')) {
            $data->where('status',request()->get('status'));
        }
        $data->when(request()->get('event_type'),function($query) {
            return request()->get('event_type');
            $query->where('event_type',request()->get('event_type'));
        });
        
        $events = $data->paginate(20);
        return view('admin.events.event_list', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $route = route('admin.events.store');
        return view('admin.events.event_add_edit', compact('route'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new Event();
        $event->category_id = $request->category_id;
        $event->title = $request->title;
        $event->slug = Str::slug($request->title);
        $event->location = $request->location;
        $event->event_type = $request->event_type;
        $event->from_date = $request->from_date;
        $event->to_date = $request->to_date;
        $event->from_time = $request->from_time;
        $event->to_time = $request->to_time;
        $event->status = $request->status;
        $event->description = $request->description;

        if ($request->file('thumbnail')) {
            $event->thumbnail = uploadImage($request->file('thumbnail'), 'assets/files/images/events/');
        }

        if ($event->save()) {
            if (isset($request->image_title) and sizeof($request->image_title) > 0) {
                foreach ($request->file('photos') as $key => $file) {
                    $event_photo = new EventPhoto();
                    $event_photo->event_id = $event->id;
                    $event_photo->title = $request->image_title[$key] ?? "None";
                    if (isset($request->file('photos')[$key])) {
                        $event_photo->photo_path = uploadImage($request->file('photos')[$key], 'assets/files/images/events/');
                    }
                    $event_photo->display_on_slider = $request->display_on_slider[$key] == 'on' ? true : false;
                    $event_photo->save();
                }
            }
        }
        return redirect()->route('admin.events.index')->with(savedMessage());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $event = Event::whereSlug($slug)->firstOrFail();
        return view('admin.events.event_details',compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $route = route('admin.events.update',$id);
        return view('admin.events.event_add_edit', compact('event', 'route'));
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
        //return $request;
        $event = Event::findOrFail($id); // Find the event by its ID
        $event->category_id = $request->category_id;
        $event->title = $request->title;
        $event->slug = Str::slug($request->title);
        $event->location = $request->location;
        $event->event_type = $request->event_type;
        $event->from_date = $request->from_date;
        $event->to_date = $request->to_date;
        $event->from_time = $request->from_time;
        $event->to_time = $request->to_time;
        $event->status = $request->status;
        $event->description = $request->description;

        if ($request->file('thumbnail')) {
            $event->thumbnail = uploadImage($request->file('thumbnail'), 'assets/files/images/events/');
        }

        if ($event->save()) {
            if (isset($request->image_title) && sizeof($request->image_title) > 0) {
                $existingEventPhotoIds = $event->event_photos->pluck('id')->toArray() ?? [];
                $requestIds = $request->photo_ids ?? [];
                $needDeletedIds = array_diff($existingEventPhotoIds, $requestIds) ?? [];
            
                foreach ($request->image_title as $key => $file) {
                    // Check if the image title is valid
                    if (!empty($request->image_title[$key])) {
                        if (is_array($request->photo_ids) && count($request->photo_ids)) {
                            if (isset($request->photo_ids[$key]) && in_array($request->photo_ids[$key], $existingEventPhotoIds)) {
                                $event_photo = EventPhoto::find($request->photo_ids[$key]);
                            } else {
                                $event_photo = new EventPhoto();
                                $event_photo->event_id = $event->id;
                            }
                        } else {
                            $event_photo = new EventPhoto();
                            $event_photo->event_id = $event->id;
                        }
            
                        $event_photo->title = $request->image_title[$key];
            
                        if (isset($request->file('photos')[$key])) {
                            $event_photo->photo_path = uploadImage($request->file('photos')[$key], 'assets/files/images/events/');
                        }
            
                        // Ensure display_on_slider is set correctly
                        $event_photo->display_on_slider = isset($request->display_on_slider[$key]) && $request->display_on_slider[$key] == 'on';
            
                        $event_photo->save();
                    }
                }
            
                // Delete any existing event photos that were not updated
                EventPhoto::where('event_id', $event->id)->whereIn('id', $needDeletedIds)->delete();
            }
        }

        return redirect()->route('admin.events.index')->with(updateMessage());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        EventPhoto::whereIn('event_id', [$event->id])->delete();
        $event->delete();
        return redirect()->route('admin.events.index')->with(deleteMessage());
    }
}
