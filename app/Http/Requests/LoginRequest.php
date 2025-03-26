<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:6',
            'g-recaptcha-response' => 'required|captcha',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không hợp lệ',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu ít nhất 6 ký tự',
            'g-recaptcha-response.required' => 'Vui lòng xác minh reCAPTCHA',
            'g-recaptcha-response.captcha' => 'Xác minh reCAPTCHA không hợp lệ',
        ];
    }
}
