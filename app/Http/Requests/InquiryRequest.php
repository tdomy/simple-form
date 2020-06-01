<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ReCaptcha;

class InquiryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(ReCaptcha $re_captcha)
    {
        return [
            'name'      => ['required', 'max:20'],
            'email'     => ['required', 'email:rfc'],
            'message'   => ['required', 'max:1024'],
            'token'     => ['required', $re_captcha],
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
            'required'  => ':attributeは必須です。',
            'max'       => ':attributeは最大:max文字で入力してください。',
            'rfc'       => '正しいメールアドレスを入力してください。',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name'      => 'お名前',
            'email'     => 'メールアドレス',
            'message'   => 'メッセージ',
            'token'     => 'ReCaptcha',
        ];
    }
}
