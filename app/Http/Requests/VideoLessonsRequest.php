<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoLessonsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'course_id' => 'required|integer|exists:courses,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'video_url' => 'required|url',
            'duration' => 'nullable|integer|min:0',
            'level_id' => 'nullable|integer|exists:levels,id',
            'order_index' => 'nullable|integer|min:0',
            'thumbnail_url' => 'nullable|url',
        ];
    }
}
