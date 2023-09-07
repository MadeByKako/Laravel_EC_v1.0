<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:60',
            'email' => 'required|email|max:100',
            'star' => 'required|integer|between:1,5',
            'text' => 'required|string|max:512',
            'item_id' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nameは必須入力です。',
            'name.string' => 'Nameは文字で入力してください。',
            'name.max' => 'Nameは60文字以内で入力してください。',
            'email.required' => 'emailは必須入力です。',
            'email.email' => 'emailを入力してください。',
            'email.max' => 'emailは100文字以内で入力してください。',
            'star.required' => 'アプリケーションエラーが発生致しました。',
            'star.integer' => 'アプリケーションエラーが発生致しました。',
            'star.between' => 'アプリケーションエラーが発生致しました。',
            'text.required' => 'Reviewは必須入力です。',
            'text.string' => 'Reviewは文字で入力してください。',
            'text.max' => 'Reviewは512文字以内で入力してください。',
            'item_id.required' => 'アプリケーションエラーが発生致しました。',
            'item_id.integer' => 'アプリケーションエラーが発生致しました。',
        ];
    }
}
