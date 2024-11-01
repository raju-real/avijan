@extends('admin.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h4>Slider Lists</h4>
                </div>
                <div class="col-md-6 text-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.sliders.create') }}">Add New</a>
                </div>
            </div>
        </div>

        <div class="card-body">

            <!-- Accordion for Search -->
            <div class="accordion mb-3" id="accordionSearch">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSearch">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseSearch" aria-expanded="false" aria-controls="collapseSearch">
                            Search
                        </button>
                    </h2>
                    <div id="collapseSearch" class="accordion-collapse collapse" aria-labelledby="headingSearch"
                        data-bs-parent="#accordionSearch">
                        <div class="accordion-body">
                            <form method="GET" action="{{ route('admin.sliders.index') }}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="title" class="form-control"
                                                placeholder="Search by Title">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select name="status" id="status" class="form-select">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
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
                <table class="table table-striped table-bordered table-md">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $slider)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    <img src="{{ asset($slider->photo_path) }}" alt="" class="img-responsive" height="50" width="50">
                                </td>
                                <td>{{ $slider->title }}</td>
                                <td>
                                    <span>{{ $slider->status == 1 ? 'Active' : 'Inactive' }}</span>
                                </td>
    
                                <td>
                                    <a href="{{ route('admin.sliders.edit',$slider->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                    
                                    <a class="btn btn-danger btn-sm delete-data" data-id="{{ 'delete-slider-'.$slider->id }}" href="javascript:void(0);">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <form id="delete-slider-{{ $slider->id }}"
                                        action="{{ route('admin.sliders.destroy',$slider->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>

            <!-- Pagination Links -->
<div class="d-flex justify-content-end">
    {{ $sliders->links() }}
</div>
        </div>
    </div>
@endsection