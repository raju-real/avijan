@extends('admin.layouts.app')
@section('title','Article Add/Edit')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h4>Add/Edit Article</h4>
                </div>
                <div class="col-md-6 text-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.articles.index') }}">Back</a>
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
                            <label for="title" class="col-form-label">Title {!! starSign() !!}</label>
                            <input name="title" value="{{ old('title') ?? ($data->title ?? '') }}" id="title"
                                type="text" placeholder="Title"
                                class="form-control @error('title') is-invalid @enderror">
                            @error('title')
                                {!! displayError($message) !!}
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 pb-3">
                        <div class="form-group">
                            <label for="image" class="col-form-label">Image {!! starSign() !!}</label>
                            <input name="image" accept=".jpg,.png,.jpeg" type="file"
                                class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                                {!! displayError($message) !!}
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4 pb-3">
                        <div class="form-group">
                            <label for="status" class="col-form-label">Status</label>
                            <select name="status" id="status" class="form-select">
                                <option value="1"
                                    {{ (old('status') ?? ($data->status ?? '')) == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0"
                                    {{ (old('status') ?? ($data->status ?? '')) == '0' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                {!! displayError($message) !!}
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label>Description {!! starSign() !!}</label>
                            <textarea name="description" id="description" class="form-control" cols="30" rows="10">{{ old('description') ?? ($data->description ?? '') }}</textarea>
                            @error('description')
                                <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
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

@push('js')
    <script>
        CKEDITOR.replace('description', {
            removePlugins: ['info', 'image'],
        });
    </script>
@endpush
