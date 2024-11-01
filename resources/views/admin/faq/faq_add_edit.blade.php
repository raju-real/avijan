@extends('admin.layouts.app')
@section('title','Faq Add/Edit')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h4>Add/Edit Faq</h4>
                </div>
                <div class="col-md-6 text-end">
                    <a class="btn btn-sm btn-primary" href="{{ url()->previous() }}">Back</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ $route }}" id="prevent-form">
                @csrf
                @isset($data)
                    @method('PUT')
                @endisset
                <div class="row">
                    <div class="col-md-4 pb-3">
                        <div class="form-group">
                            <label for="question" class="col-form-label">Question {!! starSign() !!}</label>
                            <input name="question" value="{{ old('question') ?? ($data->question ?? '') }}" id="question"
                                type="text" placeholder="Question" class="form-control @error('question') is-invalid @enderror">
                            @error('question')
                                {!! displayError($message) !!}
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 pb-3">
                        <div class="form-group">
                            <label for="answer" class="col-form-label">Answer  {!! starSign() !!}</label>
                            <textarea name="answer" id="answer" class="form-control {!! hasError('answer') !!}" placeholder="Answer">{{ old('answer') ?? $data->answer ?? '' }}</textarea>
                            @error('answer')
                                {!! displayError($message) !!}
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 pb-3">
                        <div class="form-group">
                            <label for="status" class="col-form-label">Status  {!! starSign() !!}</label>
                            <select name="status" id="status" class="form-select">
                                <option value="1" {{ (old('status') ?? $data->status ?? '') == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ (old('status') ?? $data->status ?? '') == '0' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
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
