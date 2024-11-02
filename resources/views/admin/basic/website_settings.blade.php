@extends('admin.layouts.app')
@section('title','Website Settings')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h4>Add/Edit Article</h4>
                </div>
                <div class="col-md-6 text-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.dashboard') }}">Back</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.update-website-settings') }}" id="prevent-form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-4 pb-3">
                        <div class="form-group">
                            <label for="company_name" class="col-form-label">Company Name {!! starSign() !!}</label>
                            <input name="company_name" value="{{ old('company_name') ?? siteSetting()['company_name'] ?? '' }}" id="company_name"
                                   type="text" placeholder="Company Name"
                                   class="form-control {!! hasError('company_name') !!}">
                            @error('company_name')
                                {!! displayError($message) !!}
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 pb-3">
                        <div class="form-group">
                            <label for="email" class="col-form-label">Email {!! starSign() !!}</label>
                            <input name="email" value="{{ old('email') ?? siteSetting()['email'] ?? '' }}" id="email"
                                   type="text" placeholder="Email"
                                   class="form-control {!! hasError('email') !!}">
                            @error('email')
                                {!! displayError($message) !!}
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 pb-3">
                        <div class="form-group">
                            <label for="mobile" class="col-form-label">Mobile {!! starSign() !!}</label>
                            <input name="mobile" value="{{ old('mobile') ?? siteSetting()['mobile'] ?? '' }}" id="mobile"
                                   type="text" placeholder="Mobile"
                                   class="form-control {!! hasError('mobile') !!}">
                            @error('mobile')
                                {!! displayError($message) !!}
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 pb-3">
                        <div class="form-group">
                            <label for="phone" class="col-form-label">Phone {!! starSign() !!}</label>
                            <input name="phone" value="{{ old('phone') ?? siteSetting()['phone'] ?? '' }}" id="phone"
                                   type="text" placeholder="Phone"
                                   class="form-control {!! hasError('phone') !!}">
                            @error('phone')
                                {!! displayError($message) !!}
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 pb-3">
                        <div class="form-group">
                            <label for="address" class="col-form-label">Address {!! starSign() !!}</label>
                            <textarea name="address" class="form-control {!! hasError('address') !!}" cols="30" rows="1" placeholder="Address">{{ old('address') ?? siteSetting()['address'] ?? '' }}</textarea>
                            @error('address')
                                {!! displayError($message) !!}
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 pb-3">
                        <div class="form-group">
                            <label for="footer_text" class="col-form-label">Footer Text {!! starSign() !!}</label>
                            <textarea name="footer_text" class="form-control {!! hasError('footer_text') !!}" cols="30" rows="1" placeholder="Footer Text ">{{ old('footer_text') ?? siteSetting()['footer_text'] ?? '' }}</textarea>
                            @error('address')
                                {!! displayError($message) !!}
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 pb-3">
                        <div class="form-group">
                            <label for="google_map_url" class="col-form-label">Google Map URL</label>
                            <textarea name="google_map_url" class="form-control {!! hasError('google_map_url') !!}" cols="30" rows="1" placeholder="Google Map URL">{{ old('google_map_url') ?? siteSetting()['google_map_url'] ?? '' }}</textarea>
                            @error('google_map_url')
                                {!! displayError($message) !!}
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 pb-3">
                        <div class="form-group">
                            <label for="facebook_url" class="col-form-label">Facebook URL</label>
                            <input name="facebook_url" value="{{ old('facebook_url') ?? siteSetting()['facebook_url'] ?? '' }}" id="facebook_url"
                                   type="text" placeholder="Facebook URL"
                                   class="form-control {!! hasError('facebook_url') !!}">
                            @error('facebook_url')
                                {!! displayError($message) !!}
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 pb-3">
                        <div class="form-group">
                            <label for="linkedin_url" class="col-form-label">Linkedin URL</label>
                            <input name="linkedin_url" value="{{ old('linkedin_url') ?? siteSetting()['linkedin_url'] ?? '' }}" id="linkedin_url"
                                   type="text" placeholder="Linkedin URL"
                                   class="form-control {!! hasError('linkedin_url') !!}">
                            @error('linkedin_url')
                                {!! displayError($message) !!}
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 pb-3">
                        <div class="form-group">
                            <label for="about_us_image" class="col-form-label">About Us Image {!! starSign() !!}</label>
                            <input name="about_us_image" accept=".jpg,.png,.jpeg" type="file" class="form-control @error('about_us_image') is-invalid @enderror">
                            @error('about_us_image')
                                {!! displayError($message) !!}
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 pb-3">
                        <div class="form-group">
                            <label for="about_us_title" class="col-form-label">About Us Title</label>
                            <input name="about_us_title" value="{{ old('about_us_title') ?? siteSetting()['about_us_title'] ?? '' }}" id="about_us_title"
                                   type="text" placeholder="About Us Title"
                                   class="form-control {!! hasError('about_us_title') !!}">
                            @error('about_us_title')
                                {!! displayError($message) !!}
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 col-12 pb-3">
                        <div class="form-group">
                            <label>About Us {!! starSign() !!}</label>
                            <textarea name="about_us" id="about_us" class="form-control" cols="30" rows="10">{{ old('about_us') ?? siteSetting()['about_us'] ?? '' }}</textarea>
                            @error('about_us')
                                {!! displayError($message) !!}
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 col-12 pb-3">
                        <div class="form-group">
                            <label>Mission & Vission </label>
                            <textarea name="mission_vission" id="mission_vission" class="form-control" cols="30" rows="10">{{ old('mission_vission') ?? siteSetting()['mission_vission'] ?? '' }}</textarea>
                            @error('mission_vission')
                                {!! displayError($message) !!}
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 col-12 pb-3">
                        <div class="form-group">
                            <label>Privacy Policy</label>
                            <textarea name="privacy_policy" id="privacy_policy" class="form-control" cols="30" rows="10">{{ old('privacy_policy') ?? siteSetting()['privacy_policy'] ?? '' }}</textarea>
                            @error('privacy_policy')
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
    CKEDITOR.replace( 'about_us', {
        removePlugins: ['info','image'],
   });
    CKEDITOR.replace( 'mission_vission', {
        removePlugins: ['info','image'],
   });
    CKEDITOR.replace( 'privacy_policy', {
        removePlugins: ['info','image'],
   });
</script>
@endpush
