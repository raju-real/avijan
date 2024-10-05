<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        //dd($this->all());
        return [
            'category' => 'required|integer|exists:event_categories,id',
            'title' => 'required|string|max:191',
            'location' => 'required|string|max:255',
            'event_type' => 'required|in:UPCOMING,PAST,CURRENT',
            'event_from' => 'required|date_format:Y-m-d H:i',
            'event_to' => 'required|date_format:Y-m-d H:i|after_or_equal:event_from',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:1,0',
            'description' => 'required|string|max:10000',
            'image_title.*' => 'required|string|max:255',
            'photos.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'display_on_slider.*' => 'required|in:on,off'
        ];
    }

    public function messages()
    {
        return [
            'image_title.*.required' => 'The image title is required.',
            'image_title.*.string' => 'The image title must be a string.',
            'photos.*.required' => 'The event image is required.',
            'photos.*.image' => 'The event image must be a valid image file.',
        ];
    }
} 