<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookManageRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'genre' => 'required',
            'title' => 'required',
            'body' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'genre' => 'ジャンル',
            'title' => '本のタイトル',
            'body' => '感想',
        ];
    }
}
