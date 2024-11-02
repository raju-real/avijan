@extends('admin.layouts.app')
@section('title','Category List')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h4>Category Lists</h4>
                </div>
                <div class="col-md-6 text-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.event-categories.create') }}">Add New</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <!-- Data Table -->
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-md">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $category->name ?? 'N/A' }}</td>
                                <td>{{ $category->description ?? 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('admin.event-categories.edit',$category->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>

            <!-- Pagination Links -->
<div class="d-flex justify-content-end">
    {{ $categories->links() }}
</div>
        </div>
    </div>
@endsection
