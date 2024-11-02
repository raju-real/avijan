@extends('admin.layouts.app')
@section('title','Event Add/Edit')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h4>{{ isset($event) ? 'Edit' : 'Add' }} Event</h4>
                </div>
                <div class="col-md-6 text-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.events.index') }}">Back</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ $route }}" id="prevent-form" class="needs-validation" novalidate
                enctype="multipart/form-data">
                @csrf
                @isset($event)
                    @method('PUT')
                @endisset
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="category" class="col-form-label">Category {!! starSign() !!}</label>
                            <select name="category_id" id="category"
                                class="form-select select2 @error('category') is-invalid @enderror" required>
                                <option value="">Select Category</option>
                                @foreach (eventCategories() as $category)
                                    <option value="{{ $category->id }}"
                                        {{ isset($event) && $event->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}</option>
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
                            <input name="title" value="{{ $event->title ?? '' }}" id="title" type="text"
                                placeholder="Title" class="form-control @error('title') is-invalid @enderror" required>
                            @error('title')
                                {!! displayError($message) !!}
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 pb-2">
                        <div class="form-group">
                            <label for="location" class="col-form-label">Location {!! starSign() !!}</label>
                            <input name="location" value="{{ $event->location ?? '' }}" id="location" type="text"
                                placeholder="Location" class="form-control @error('location') is-invalid @enderror"
                                required>
                            @error('location')
                                {!! displayError($message) !!}
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 pb-2">
                        <div class="form-group">
                            <label for="event_type" class="col-form-label">Type</label>
                            <select name="event_type" id="event_type" class="form-select" required>
                                <option value="UPCOMING"
                                    {{ isset($event) && $event->event_type == 'UPCOMING' ? 'selected' : '' }}>
                                    Ucoming</option>
                                <option value="COMPLETE"
                                    {{ isset($event) && $event->event_type == 'COMPLETE' ? 'selected' : '' }}>
                                    Complete</option>
                            </select>
                            @error('event_type')
                                {!! displayError($message) !!}
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 pb-2">
                        <div class="form-group">
                            <label for="from_date" class="col-form-label">From Date {!! starSign() !!}</label>
                            <input name="from_date" value="{{ $event->from_date ?? now() }}" type="text"
                                class="form-control common-picker datepicker @error('from_date') is-invalid @enderror"
                                readonly required>
                            @error('from_date')
                                {!! displayError($message) !!}
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 pb-2">
                        <div class="form-group">
                            <label for="to_date" class="col-form-label">To Date {!! starSign() !!}</label>
                            <input name="to_date" value="{{ $event->to_date ?? now() }}" type="text"
                                class="form-control common-picker datepicker @error('to_date') is-invalid @enderror"
                                readonly required>
                            @error('to_date')
                                {!! displayError($message) !!}
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 pb-2">
                        <div class="form-group">
                            <label for="from_time" class="col-form-label">From Time {!! starSign() !!}</label>
                            <input name="from_time" value="{{ $event->from_time ?? now() }}" type="text"
                                class="form-control common-picker timepicker @error('from_time') is-invalid @enderror"
                                readonly required>
                            @error('from_time')
                                {!! displayError($message) !!}
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 pb-2">
                        <div class="form-group">
                            <label for="to_time" class="col-form-label">To Time {!! starSign() !!}</label>
                            <input name="to_time" value="{{ $event->to_time ?? now() }}" type="text"
                                class="form-control common-picker timepicker @error('to_time') is-invalid @enderror"
                                readonly required>
                            @error('to_time')
                                {!! displayError($message) !!}
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 pb-2">
                        <div class="form-group">
                            <label for="thumbnail" class="col-form-label">Thumbnail {!! starSign() !!}</label>
                            <input name="thumbnail" accept=".jpg,.png,.jpeg" type="file"
                                class="form-control @error('thumbnail') is-invalid @enderror"
                                {{ isset($event) && (!$event->thumbnail || !file_exists($event->thumbnail)) ? 'required' : (!isset($event) ? 'required' : '') }}>
                            @error('thumbnail')
                                {!! displayError($message) !!}
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4 pb-2">
                        <div class="form-group">
                            <label for="status" class="col-form-label">Status</label>
                            <select name="status" id="status" class="form-select" required>
                                <option value="1" {{ isset($event) && $event->status == '1' ? 'selected' : '' }}>
                                    Active</option>
                                <option value="0" {{ isset($event) && $event->status == '0' ? 'selected' : '' }}>
                                    Inactive
                                </option>
                            </select>
                            @error('status')
                                {!! displayError($message) !!}
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12 col-12 pb-2">
                        <div class="form-group">
                            <label>Description {!! starSign() !!}</label>
                            <textarea name="description" id="description" class="form-control ckeditor-required" required cols="30"
                                rows="10">{{ $event->description ?? '' }}</textarea>
                            @error('description')
                                {!! displayError($message) !!}
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12 mt-2">
                        <div class="card">
                            <div class="card-header"><strong>Event Images</strong></div>
                            <div class="card-boday">
                                <table class="table table-striped table-bordered table-sm" width="100%"
                                    id="image_table">
                                    <thead>
                                        <tr>
                                            <th>Image Title {!! starSign() !!}</th>
                                            <th>Image {!! starSign() !!}</th>
                                            <th>Display On Slider</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($event) && count($event->event_photos))
                                            @foreach ($event->event_photos as $photo)
                                                <tr>
                                                    <td>
                                                        <input type="hidden" name="photo_ids[]"
                                                            value="{{ intval($photo->id) }}">
                                                        <input name="image_title[]" type="text"
                                                            value="{{ $photo->title ?? '' }}" class="form-control"
                                                            placeholder="Title" required>
                                                    </td>
                                                    <td>
                                                        <input name="photos[]" type="file" class="form-control"
                                                            accept=".jpg,.jpeg,.png"
                                                            {{ !$photo->photo_path || !file_exists($photo->photo_path) ? 'required' : '' }}>
                                                    </td>
                                                    <td class="pl-2 pt-2 pb-0">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch{{ $loop->index + 1 }}"
                                                                {{ $photo->display_on_slider ? 'checked' : '' }}>
                                                            <input type="hidden" name="display_on_slider[]"
                                                                value="{{ $photo->display_on_slider ? 'on' : 'off' }}">
                                                            <label class="custom-control-label"
                                                                for="customSwitch{{ $loop->index + 1 }}">Display Image On
                                                                Slider</label>
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
                                        @endif

                                    </tbody>

                                </table>
                                <div class="p-2">
                                    <button type="button" id="add_more_image" class="btn btn-primary btn-sm">
                                        <i class="fa fa-plus"></i>
                                        <span class="ms-1">Add More</span>
                                    </button>
                                </div>
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
        // Counter to generate unique IDs for switches
        let switchCounter = 1;

        $(document).on('click', '#add_more_image', function() {
            switchCounter++; // Increment counter for unique IDs
            let image_div = `<tr>
                <td>
                    <input name="image_title[]" type="text" class="form-control" placeholder="Title" required>
                </td>
                <td>
                    <input name="photos[]" type="file" class="form-control" accept=".jpg,.jpeg,.png" required>
                </td>
                <td class="pl-2 pt-2 pb-0">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch${switchCounter}" checked>
                        <input type="hidden" name="display_on_slider[]" value="on"> <!-- Default value -->
                        <label class="custom-control-label" for="customSwitch${switchCounter}">Display Image On Slider</label>
                    </div>
                </td>
                <td style="width: 5%">
                    <button type="button" class="btn btn-sm btn-danger text-right remove_imave">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>`;

            $('#image_table tbody').append(image_div); // Assuming your table has a tbody
        });

        // Handle checkbox change to toggle hidden input value
        $(document).on('change', '.custom-control-input', function() {
            const hiddenInput = $(this).closest('td').find('input[type="hidden"]');
            hiddenInput.val($(this).is(':checked') ? 'on' : 'off');
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
    </script>
@endpush
