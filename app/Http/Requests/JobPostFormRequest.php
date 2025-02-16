<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobPostFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'feature_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|max:255',
            'description' => 'required',
            'roles' => 'required',
            'job_type' => 'required|in:Full Time,Part Time,Casual,Contract',
            'address' => 'required|max:255',
            'salary' => 'required|numeric',
            'application_close_date' => 'required|date',
        ];
    }
}
