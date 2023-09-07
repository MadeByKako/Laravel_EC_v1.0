<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TopSearchRequest extends FormRequest
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
            'parent_category_id' => 'integer|nullable',
            'category_id' => 'integer|nullable',
            'sort_id' => 'integer|nullable',
        ];
    }

    public function messages()
    {
        return [
            'parent_category_id.integer' => 'アプリケーションエラーが発生致しました。',
            'category_id.integer' => 'アプリケーションエラーが発生致しました。',
            'sort_id.integer' => 'アプリケーションエラーが発生致しました。',
        ];
    }
}
