@extends('admin.layouts.app')
@section('title','Event Add/Edit')

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
            <form method="POST" action="{{ $route }}"  enctype="multipart/form-data">
                @csrf
                @isset($data)
                    @method('PUT')
                @endisset
                <div class="row">
                    <!-- Category -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="category" class="col-form-label">Category {!! starSign() !!}</label>
                            <select name="category" id="category"
                                class="form-select select2 @error('category') is-invalid @enderror">
                                <option value="">Select Category</option>
                                @foreach (eventCategories() as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category', $data->category ?? '') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category')
                                {!! displayError($message) !!}
                            @enderror
                        </div>
                    </div>

                    <!-- Title -->
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

                    <!-- Location -->
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

                    <!-- Event Type -->
                    <div class="col-md-4 pb-2">
                        <div class="form-group">
                            <label for="event_type" class="col-form-label">Type</label>
                            <select name="event_type" id="event_type" class="form-select">
                                <option value="UPCOMING"
                                    {{ (old('event_type') ?? ($data->event_type ?? '')) == 'UPCOMING' ? 'selected' : '' }}>
                                    Upcoming</option>
                                <option value="COMPLETE"
                                    {{ (old('event_type') ?? ($data->event_type ?? '')) == 'COMPLETE' ? 'selected' : '' }}>
                                    Complete</option>
                            </select>
                            @error('event_type')
                                {!! displayError($message) !!}
                            @enderror
                        </div>
                    </div>

                    <!-- Event From -->
                    <div class="col-md-4 pb-2">
                        <div class="form-group">
                            <label for="event_from" class="col-form-label">Event From {!! starSign() !!}</label>
                            <input name="event_from" value="{{ old('event_from') ?? ($data->event_from ?? now()) }}"
                                type="text" placeholder="Select Date"
                                class="form-control common-picker datetimepicker @error('event_from') is-invalid @enderror"
                                readonly>
                            @error('event_from')
                                {!! displayError($message) !!}
                            @enderror
                        </div>
                    </div>

                    <!-- Event To -->
                    <div class="col-md-4 pb-2">
                        <div class="form-group">
                            <label for="event_to" class="col-form-label">Event To {!! starSign() !!}</label>
                            <input name="event_to" value="{{ old('event_to') ?? ($data->event_to ?? now()) }}"
                                type="text" placeholder="Select Date"
                                class="form-control common-picker datetimepicker @error('event_to') is-invalid @enderror"
                                readonly>
                            @error('event_to')
                                {!! displayError($message) !!}
                            @enderror
                        </div>
                    </div>

                    <!-- Image -->
                    <div class="col-md-4 pb-2">
                        <div class="form-group">
                            <label for="thumbnail" class="col-form-label">Thumbnail {!! starSign() !!}</label>
                            <input name="thumbnail" accept=".jpg,.png,.jpeg" type="file"
                                class="form-control @error('thumbnail') is-invalid @enderror">
                            @error('thumbnail')
                                {!! displayError($message) !!}
                            @enderror
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="col-md-4 pb-2">
                        <div class="form-group">
                            <label for="status" class="col-form-label">Status</label>
                            <select name="status" id="status" class="form-select">
                                <option value="1"
                                    {{ (old('status') ?? ($data->status ?? '')) == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0"
                                    {{ (old('status') ?? ($data->status ?? '')) == '0' ? 'selected' : '' }}>Inactive
                                </option>
                            </select>
                            @error('status')
                                {!! displayError($message) !!}
                            @enderror
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="col-md-12 col-12 pb-2">
                        <div class="form-group">
                            <label>Description {!! starSign() !!}</label>
                            <textarea name="description" id="description" class="form-control ckeditor-" cols="30" rows="10">{{ old('description') ?? ($data->description ?? '') }}</textarea>
                            @error('description')
                                {!! displayError($message) !!}
                            @enderror
                        </div>
                    </div>

                    <!-- Event Images Section -->
                    <div class="col-md-12 mt-2">
                        <div class="card">
                            <div class="card-header"><strong>Event Images</strong></div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered table-sm" width="100%" id="image_table">
                                    <thead>
                                        <tr>
                                            <th>Image Title {!! starSign() !!}</th>
                                            <th>Image {!! starSign() !!}</th>
                                            <th>Display On Slider</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(old('image_title',[]) as $index => $title)
                                            <tr>
                                                <td>
                                                    <input name="image_title[]" type="text"
                                                        class="form-control @error('image_title.' . $index) is-invalid @enderror"
                                                        placeholder="Title" value="{{ old('image_title.' . $index) }}">
                                                    @error('image_title.' . $index)
                                                        {!! displayError($message) !!}
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input name="photos[]" type="file"
                                                        class="form-control @error('photos.' . $index) is-invalid @enderror"
                                                        accept=".jpg,.jpeg,.png">
                                                    @error('photos.' . $index)
                                                        {!! displayError($message) !!}
                                                    @enderror
                                                </td>
                                                <td class="pl-2 pt-2 pb-0">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitch{{ $index }}"
                                                            {{ old('display_on_slider.' . $index, 'off') == 'on' ? 'checked' : '' }}>
                                                        <input type="hidden" name="display_on_slider[]"
                                                            value="{{ old('display_on_slider.' . $index, 'off') }}">
                                                        <label class="custom-control-label"
                                                            for="customSwitch{{ $index }}">Display Image On
                                                            Slider</label>
                                                            @error('display_on_slider.' . $index)
                                                        {!! displayError($message) !!}
                                                    @enderror
                                                    </div>
                                                </td>
                                                <td style="width: 5%">
                                                    <button type="button"
                                                        class="btn btn-sm btn-danger text-right remove_imave">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        
                                        @endforeach

                                    </tbody>

                                </table>
                                <button type="button" class="btn btn-sm btn-success" id="add_more_image"><i
                                        class="fa fa-plus"></i> Add More</button>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="col-md-12 text-end mt-3">
                        <button type="submit" class="btn btn-primary">Save Event</button>
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
        // Counter to generate unique IDs for switches
        let switchCounter = 1;

        $(document).on('click', '#add_more_image', function() {
            switchCounter++; // Increment counter for unique IDs
            let imave_div = `<tr>
        <td>
            <input name="image_title[]" type="text" class="form-control" placeholder="Title">
        </td>
        <td>
            <input name="photos[]" type="file" class="form-control" accept=".jpg,.jpeg,.png">
        </td>
        <td class="pl-2 pt-2 pb-0">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="customSwitch${switchCounter}">
                <input type="hidden" name="display_on_slider[]" value="off">
                <label class="custom-control-label" for="customSwitch${switchCounter}">Display Image On Slider</label>
            </div>
        </td>
        <td style="width: 5%">
            <button type="button" class="btn btn-sm btn-danger text-right remove_imave">
                <i class="fa fa-trash"></i>
            </button>
        </td>
    </tr>`;

            $('#image_table').find('tbody').append(imave_div);
        });

        $(document).on('click', '.remove_imave', function() {
            let event = this;
            $(event).parent().parent().remove();
        });

        // Update hidden input value based on switch state
        $(document).on('change', '.custom-control-input', function() {
            let hiddenInput = $(this).siblings('input[type="hidden"]');
            if (this.checked) {
                hiddenInput.val('on');
            } else {
                hiddenInput.val('off');
            }
        });

        $('#prevent-form').on('submit', function(e) {
            // Ensure the CKEditor content is transferred to the textarea before form submission
            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
        });
    </script>
@endpush
