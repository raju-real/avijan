@extends('admin.layouts.app')
@section('title','Category Add/Edit')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h4>Add/Edit Category</h4>
                </div>
                <div class="col-md-6 text-end">
                    <a class="btn btn-sm btn-primary" href="{{ url()->previous() }}">Back</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ $route }}" id="prevent-form" enctype="multipart/form-data">
                @csrf
                @isset($data)
                    @method('PUT')
                @endisset
                <div class="row">
                    <div class="col-md-4 pb-3">
                        <div class="form-group">
                            <label for="name" class="col-form-label">Name {!! starSign() !!}</label>
                            <input name="name" value="{{ old('name') ?? ($data->name ?? '') }}" id="name"
                                type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                {!! displayError($message) !!}
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 pb-3">
                        <div class="form-group">
                            <label for="name" class="col-form-label">Description</label>
                            <textarea name="description" id="description" class="form-control" placeholder="Description">{{ old('description') ?? ($data->description ?? '') }}</textarea>
                            @error('description')
                                {!! displayError($message) !!}
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 text-end mt-4">
                        <x-submit-button />
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
