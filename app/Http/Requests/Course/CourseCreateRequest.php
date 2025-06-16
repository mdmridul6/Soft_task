<?php

namespace App\Http\Requests\Course;

use Illuminate\Foundation\Http\FormRequest;

class CourseCreateRequest extends FormRequest
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
        return [
            'title' => 'required|string|max:255',
            'modules' => 'required|array|min:1',
            'modules.*.title' => 'required|string|max:255',
            'modules.*.contents' => 'required|array|min:1',
            'modules.*.contents.*.title' => 'required|string|max:255',
            'modules.*.contents.*.video_url' => 'required|url',
        ];
    }


    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Course title is required.',
            'modules.required' => 'At least one module is required.',
            'modules.*.title.required' => 'Each module must have a title.',
            'modules.*.contents.required' => 'Each module must have at least one content.',
            'modules.*.contents.*.title.required' => 'Each content must have a title.',
            'modules.*.contents.*.video_url.required' => 'Each content must have a video URL.',
            'modules.*.contents.*.video_url.url' => 'Each video URL must be valid.',
        ];
    }
}
