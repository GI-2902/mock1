<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Laravel\Fortify\Http\Requests\LoginRequest as FortifyLoginRequest;

class LoginOkRequest extends FortifyLoginRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            //vendorはgithubにpushできない
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
            //Password::defaults(),

        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'email.exists' => 'ログイン情報が登録されていません',
            'email.required' => 'メールアドレスを入力して下さい',
            'email.email' => 'メールアドレス形式で入力して下さい',
            'password.required' => 'パスワードを入力して下さい',
            'failed' => 'ログイン情報が登録されていません',
        ];
    }
}
