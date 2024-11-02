@extends('admin.layouts.app')
@section('title', 'Slider List')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h4>Slider List</h4>
                </div>
                <div class="col-md-6 text-end">
                    <a class="btn btn-sm btn-primary" href="{{ url()->previous() }}">Back</a>
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
                            <form method="GET" action="{{ route('admin.sliders') }}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="title" class="form-control"
                                                placeholder="Search by Title">
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
                            <th>Title</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $slider)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>

                                <td>{{ $slider->title }}</td>
                                <td>
                                    <img src="{{ asset($slider->photo_path) }}" alt="" class="img-responsive"
                                        height="200" width="250">
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
