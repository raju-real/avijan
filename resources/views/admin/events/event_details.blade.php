@extends('admin.layouts.app')
@section('title',$event->title)
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h4>Event Details</h4>
                </div>
                <div class="col-md-6 text-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.events.index') }}">Back</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <!-- Data Table -->
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-md">
                    <tr>
                        <th>Thumbnail</th>
                        <td>
                            <img src="{{ asset($event->thumbnail) }}" alt="" class="img-responsive" height="400" width="50%">
                        </td>
                    </tr>
                    <tr>
                        <th>Created On</th>
                        <td>{{ date('d m, y',strtotime($event->created_at)) }}</td>
                    </tr>
                    <tr>
                        <th>Type</th>
                        <td>{{ $event->event_type ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Location</th>
                        <td>{{ $event->location ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Date Duration</th>
                        <td>{{ date('d m, y', strtotime($event->from_date)) . ' to ' . date('d m, y', strtotime($event->to_date)) }}</td>
                    </tr>
                    <tr>
                        <th>Time Duration</th>
                        <td>{{ date('d m, y', strtotime($event->from_time)) . ' to ' . date('d m, y', strtotime($event->to_time)) }}</td>
                    </tr>
                    <tr>
                        <th>Category</th>
                        <td>{{ $event->category->name ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{!! $event->description ?? '' !!}</td>
                    </tr>
                    <tr>
                        <th>Event Photos</th>
                        <td>
                            <div class="row">
                                @foreach($event->event_photos as $photo)
                                    <div class="col-md-3 col-6 mb-3"> <!-- Adjust column width as needed -->
                                        <img src="{{ asset($photo->photo_path) }}" alt="" class="img-fluid" height="200" width="200">
                                    </div>
                                @endforeach
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
