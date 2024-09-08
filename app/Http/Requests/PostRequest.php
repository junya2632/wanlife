<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'post.spot_name' => 'required|string|max:100',
            'post.address' => 'required|string|max:200',
            'post.description' => 'required|string|max:2000',
            'post.body' => 'required|string',
        ];
    }
}
