<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartStoreRequest extends FormRequest
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
            'item_id' => 'required|integer',
            'count' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'item_id.required' => 'アプリケーションエラーが発生致しました。',
            'item_id.integer' => 'アプリケーションエラーが発生致しました。',
            'count.required' => 'アプリケーションエラーが発生致しました。',
            'count.integer' => 'アプリケーションエラーが発生致しました。',
        ];
    }
}
