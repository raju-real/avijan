@extends('admin.layouts.app')
@section('title','Gallery List')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h4>Gallery List</h4>
                </div>
                <div class="col-md-6 text-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.galleries.create') }}">Add New</a>
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
                            <form method="GET" action="{{ route('admin.galleries.index') }}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="title" class="form-control"
                                                placeholder="Search by Title" value="{{ request('title') ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select name="display_on_slider" id="display_on_slider" class="form-select">
                                                <option value="" {{ !isset(request()->display_on_slider) ? 'selected' : '' }}>Slider Display Status</option>
                                                <option value="1" {{ request('display_on_slider') == 1 ? 'selected' : '' }}>Yes</option>
                                                <option value="0" {{ request('display_on_slider') === '0' ? 'selected' : '' }}>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2">
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
                <table class="table table-bordered table-md">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Display on Slider</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($galleries as $gallery)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    <img src="{{ asset($gallery->photo_path) }}" alt="" class="img-responsive" height="50" width="50">
                                </td>
                                <td>{{ $gallery->title }}</td>
                                <td>
                                    <span>{{ $gallery->display_on_slider == 1 ? 'Yes' : 'No' }}</span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.galleries.edit', $gallery->id) }}" class="btn btn-success btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a class="btn btn-danger btn-sm delete-data" data-id="{{ 'delete-gallery-'.$gallery->id }}" href="javascript:void(0);">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <form id="delete-gallery-{{ $gallery->id }}" action="{{ route('admin.galleries.destroy', $gallery->id) }}" method="POST" style="display: none;">
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
    {{ $galleries->links() }}
</div>
        </div>
    </div>
@endsection
