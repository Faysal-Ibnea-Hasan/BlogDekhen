<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'title' => 'required',
            'content' => 'required',
            'tag_id' => 'required',
            'category_id' => 'required',
        ];
    }
    public function messages(){
        return[
            'title.required' => 'Title field is required',
            'content.required' => 'Content field is required',
            'tag_id.required' => 'Tag is required',
            'category_id.required' => 'Category is required'
        ];
    }
}
