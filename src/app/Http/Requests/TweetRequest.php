<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TweetRequest extends FormRequest
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
        return [
            'content' => ['required', 'string', 'max:140'],
        ];
    }
    public function messages(): array
    {
        return [
            'content.required' => '投稿内容は必須です',
            'content.string'   => '投稿内容は文字列で入力してください',
            'content.max'      => '投稿は140文字以内で入力してください',
        ];
    }
}
