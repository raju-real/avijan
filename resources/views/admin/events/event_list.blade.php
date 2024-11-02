@extends('admin.layouts.app')
@section('title','Event Lists')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h4>Event Lists</h4>
                </div>
                <div class="col-md-6 text-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.events.create') }}">Add New</a>
                </div>
            </div>
        </div>

        <div class="card-body">

            <!-- Accordion for Search -->
            <div class="accordion mb-3" id="accordionSearch">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSearch">
                        <button class="accordion-button {{ request()->query() ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseSearch" aria-expanded="{{ request()->query() ? 'true' : 'false' }}" aria-controls="collapseSearch">
                            Search
                        </button>
                    </h2>
                    <div id="collapseSearch" class="accordion-collapse collapse {{ request()->query() ? 'show' : '' }}" aria-labelledby="headingSearch"
                        data-bs-parent="#accordionSearch">
                        <div class="accordion-body">
                            <form method="GET" action="{{ route('admin.events.index') }}">
                                <div class="row">
                                    <div class="col-md-4 pb-4">
                                        <div class="form-group">
                                            <input type="text" name="title" class="form-control"
                                                placeholder="Search by Title" {{ request('title') ?? '' }}>
                                        </div>
                                    </div>
                                    <div class="col-md-4 pb-4">
                                        <div class="form-group">
                                            <select name="category" id="category" class="form-select">
                                                <option value="" {{ !isset(request()->category) ? 'selected' : '' }}>Category</option>
                                                @foreach(eventCategories() as $category)
                                                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 pb-4">
                                        <div class="form-group">
                                            <select name="event_type" id="event_type" class="form-select">
                                                <option value="" {{ !isset(request()->event_type) ? 'selected' : '' }}>
                                                    Select Event Type</option>
                                                <option value="UPCOMING" {{ request('event_type') == 'UPCOMING' ? 'selected' : '' }}>Upcoming</option>
                                                <option value="COMPLETE" {{ request('event_type') == 'COMPLETE' ? 'selected' : '' }}>Complete</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select name="status" id="status" class="form-select">
                                                <option value="" {{ !isset(request()->status) ? 'selected' : '' }}>
                                                    Select Status</option>
                                                <option value="1" {{ request('status') == 1 ? 'selected' : '' }}>Active
                                                </option>
                                                <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>
                                                    Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mt-0">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Data Table -->
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-md">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Thumbnail</th>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($events as $event)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    <img src="{{ asset($event->thumbnail) }}" alt="" class="img-responsive" height="50" width="50">
                                </td>
                                <td>{{ $event->title }}</td>
                                <td>{{ formatDate($event->from_date,'d M, y') .' - '. formatDate($event->to_date,'d M, y') }}</td>
                                <td>{{ formatDate($event->from_time,'h:i A') .' - '. formatDate($event->to_time,'h:i A') }}</td>
                                <td>{{ ucfirst(strtolower($event->event_type)) }}</td>
                                <td><span>{{ $event->status == 1 ? 'Active' : 'Inactive' }}</span></td>
                                <td>
                                    <a href="{{ route('admin.events.show',$event->slug) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('admin.events.edit',$event->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-danger btn-sm delete-data" data-id="{{ 'delete-event-'.$event->id }}" href="javascript:void(0);">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <form id="delete-event-{{ $event->id }}"
                                        action="{{ route('admin.events.destroy',$event->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <x-no-data-found />
                        @endforelse
                    </tbody>
                </table>
                
            </div>

            <!-- Pagination Links -->
<div class="d-flex justify-content-end">
    {{ $events->links() }}
</div>
        </div>
    </div>
@endsection
