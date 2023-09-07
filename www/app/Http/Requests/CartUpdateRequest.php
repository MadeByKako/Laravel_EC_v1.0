<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartUpdateRequest extends FormRequest
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
            'rowId' => 'array',
            'rowId.*' => 'string|nullable',
            'qty' => 'array',
            'qty.*' => 'nullable|integer',
        ];
    }

    public function messages()
    {
        return [
            'rowId.array' => 'アプリケーションエラーが発生致しました。',
            'rowId.*.string' => 'アプリケーションエラーが発生致しました。',
            'qty.array' => 'アプリケーションエラーが発生致しました。',
            'qty.*.integer' => 'アプリケーションエラーが発生致しました。',
        ];
    }
}
