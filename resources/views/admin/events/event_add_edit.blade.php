@extends('admin.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h4>{{ isset($data) ? 'Edit' : 'Add' }} Event</h4>
                </div>
                <div class="col-md-6 text-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.events.index') }}">Back</a>
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
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="category" class="col-form-label">Category {!! starSign() !!}</label>
                            <select name="category" id="category"
                                class="form-select select2 @error('category') is-invalid @enderror">
                                <option value="">Select Category</option>
                                @foreach (eventCategories() as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                {!! displayError($message) !!}
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4 pb-2">
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
                    <div class="col-md-4 pb-2">
                        <div class="form-group">
                            <label for="location" class="col-form-label">Location {!! starSign() !!}</label>
                            <input name="location" value="{{ old('location') ?? ($data->location ?? '') }}" id="location"
                                type="text" placeholder="Location"
                                class="form-control @error('location') is-invalid @enderror">
                            @error('location')
                                {!! displayError($message) !!}
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 pb-2">
                        <div class="form-group">
                            <label for="event_type" class="col-form-label">Type</label>
                            <select name="event_type" id="event_type" class="form-select">
                                <option value="UPCOMING"
                                    {{ (old('event_type') ?? ($data->event_type ?? '')) == 'UPCOMING' ? 'selected' : '' }}>
                                    Ucoming</option>
                                <option value="COMPLETE"
                                    {{ (old('event_type') ?? ($data->event_type ?? '')) == 'COMPLETE' ? 'selected' : '' }}>
                                    Complete</option>
                            </select>
                            @error('event_type')
                                {!! displayError($message) !!}
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 pb-2">
                        <div class="form-group">
                            <label for="event_from" class="col-form-label">Event From {!! starSign() !!}</label>
                            <input name="event_from" value="{{ old('event_from') ?? ($data->event_date ?? now()) }}"
                                type="text" placeholder="Select Date"
                                class="form-control common-picker datetimepicker @error('event_from') is-invalid @enderror"
                                readonly>
                            @error('event_from')
                                {!! displayError($message) !!}
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 pb-2">
                        <div class="form-group">
                            <label for="event_to" class="col-form-label">Event From {!! starSign() !!}</label>
                            <input name="event_to" value="{{ old('event_to') ?? ($data->event_date ?? now()) }}"
                                type="text" placeholder="Select Date"
                                class="form-control common-picker datetimepicker @error('event_to') is-invalid @enderror"
                                readonly>
                            @error('event_to')
                                {!! displayError($message) !!}
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 pb-2">
                        <div class="form-group">
                            <label for="image" class="col-form-label">Thumbnail {!! starSign() !!}</label>
                            <input name="image" accept=".jpg,.png,.jpeg" type="file"
                                class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                                {!! displayError($message) !!}
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4 pb-2">
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

                    <div class="col-md-12 col-12 pb-2">
                        <div class="form-group">
                            <label>Description {!! starSign() !!}</label>
                            <textarea name="description" id="description" class="form-control" cols="30" rows="10">{{ old('description') ?? ($data->description ?? '') }}</textarea>
                            @error('description')
                                {!! displayError($message) !!}
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12 mt-2">
                        <table class="table table-tripped" width="100%" id="image_table">
                            <thead>
                                <tr>
                                    <th class="pl-1">Image Title {!! starSign() !!}</th>
                                    <th class="pl-0">Image {!! starSign() !!}</th>
                                    <th class="pl-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="pl-0">
                                        <input name="image_title[]" type="text" class="form-control"
                                            placeholder="Title" required>
                                    </td>
                                    <td class="pl-0">
                                        <input name="photos[]" type="file" class="form-control" required>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="mt-1">
                            <div class="form-group">
                                <button type="button" id="add_more_image" class="btn btn-primary btn-sm">
                                    <i class="fa fa-plus"></i>
                                    <span class="ms-1">Add More</span>
                                </button>
                            </div>
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
