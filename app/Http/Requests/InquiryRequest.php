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
}
