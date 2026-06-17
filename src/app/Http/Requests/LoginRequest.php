<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Laravel\Fortify\Http\Requests\LoginRequest as FortifyLoginRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginRequest extends FortifyLoginRequest
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
            'email' => 'required|email',
        ];

        $rules['password'] = ['required', function ($attribute, $value, $fail) {
            $user = User::where('email', $this->email)->first();
            //Log::debug($value);
            //dd(Hash::check($value, $user->password));
            if (!Hash::check($value, $user->password)) {


                $fail('ログイン情報が登録されていません');
            }
        }];


        return $rules;
    }

    public function messages()
    {
        return [
            'email.required' => 'メールアドレスを入力して下さい',
            'email.email' => 'メールアドレス形式で入力して下さい',
            'password.required' => 'パスワードを入力して下さい',
        ];
    }
}
