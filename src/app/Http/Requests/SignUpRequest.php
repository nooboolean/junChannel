<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path() ==  'signup')
        {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|max:20',
            'nickname' => 'max:20',
        ];
    }


    //バリデーションのエラー文はデフォルトで英語なので、日本語を設定しておく。
    public function messages()
    {
    return [
        'email.required' => 'メールアドレスは必ず入力して下さい。',
        'email.email'  => 'メールアドレスの形式で入力してください。',
        'password.required' => 'パスワードは必ず入力して下さい。',
        'password.max' => 'パスワードは20文字以内にして下さい。',
        'nickname.max' => 'ニックネームは20文字以内にして下さい。',
    ];
    }
}
