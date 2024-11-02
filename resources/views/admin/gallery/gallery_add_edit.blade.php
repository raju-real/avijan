@extends('admin.layouts.app')
@section('title','Add/Edit Gallery')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h4>Add/Edit Gallery</h4>
                </div>
                <div class="col-md-6 text-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.galleries.index') }}">Back</a>
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
                            <input name="title" value="{{ old('title') ?? $data->title ?? '' }}" id="title"
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
                            <input name="image" accept=".jpg,.png,.jpeg" type="file" class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                                {!! displayError($message) !!}
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4 pb-3">
                        <div class="form-group">
                            <label for="display_on_slider" class="col-form-label">Display on Slider</label>
                            <select name="display_on_slider" id="display_on_slider" class="form-select">
                                <option value="1" {{ (old('display_on_slider') ?? $data->display_on_slider ?? '') == '1' ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ (old('display_on_slider') ?? $data->display_on_slider ?? '') == '0' ? 'selected' : '' }}>No</option>
                            </select>
                            @error('display_on_slider')
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

@push('js')
<script>
    CKEDITOR.replace( 'description', {
        removePlugins: ['info','image'],
   });
</script>
@endpush
