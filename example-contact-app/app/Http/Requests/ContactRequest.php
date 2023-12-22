<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'required',

            // 国内は0から
            // 'tel' => 'required|numeric|starts_with:0|digits_between:10,11',
            'tel' => 'required|numeric',

            // dns ドメインが存在するか、filter ひらがな、かたかな、漢字を弾く
            // 'email' => 'required|email:filter,dns',
            'email' => 'required|email:filter',

            // checkbox
            'type_design' => 'boolean',
            'type_frontend' => 'boolean',
            'type_backend' => 'boolean',

            // select
            'prefecture_id' => 'required|numeric|between:1,47',

            // radio
            'receive_notification' => 'required|boolean',

            // textarea
            'contact_detail' => 'required',
        ];
    }

    public function attributes(): array
    {
        return [
            'username' => 'お名前',
            'tel' => '電話番号',
            'prefecture_id' => '都道府県',
            'contact_detail' => 'お問い合わせ内容',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attributeは必ず入力してください',
            'starts_with' => ':attributeには:valuesで始まる値を入力してください',
            'email' => ':attributeには有効なメールアドレスを入力してください',
            'prefecture_id' => ':attributeは必ず選択してください',
        ];
    }
}
