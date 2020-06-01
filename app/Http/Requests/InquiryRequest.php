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
    public function rules()
    {
        return [
            'name'      => ['required'],
            'email'     => ['required', 'email:rfc'],
            'message'   => ['required'],
            'token'     => ['required', resolve(ReCaptcha::class)],
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
            'name.required'     => 'お名前は必須です。',
            'email.required'    => 'メールアドレスは必須です。',
            'message.required'  => 'メッセージは必須です。',
        ];
    }
}
