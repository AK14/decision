<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LinkPostRequest extends FormRequest
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
	        'link' => 'required|max:500|url:http,https',
//	        'short_link' => 'unique:links,short_link'
        ];
    }

	public function messages(): array
	{
		return [
			'link.required' => 'Destination is required',
			'link.max' => 'Destination can only contain up to 500 characters',
			'link.url' => 'Destination can be valid url',

			'short_link.required' => 'Short link is required',
			'short_link.unique' => 'A short link similar to this already exists. <br> try giving a new name or leave the field blank',
		];
	}
}
