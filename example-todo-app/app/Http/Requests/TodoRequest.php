<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // https://zenn.dev/naopusyu/articles/fa4fdaf7d12dab
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'title' => 'required',
            'body' => 'required',
        ];
    }

    // 本文→内容に上書き
    public function attributes()
    {
        return [
            'body' => '内容',
        ];
    }
}
