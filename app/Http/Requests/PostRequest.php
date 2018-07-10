<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|max:255',
            'tags' => 'required_without_all',
            'body'=>'required|max:100',
            'url'=>'required',
            'date'=>'required',
            'first_time'=>'required',
            'end_time'=>'required',
        ];
    }

    public function messages(){

        return [
            'title.required' => 'タイトルを入力してください',
            'tags.required_without_all' => 'タグのチェックをしてください',
            'body.required'=>'内容を入力してください。',
            'url.required'=>'URLを入力してください。',
            'date.required'=>'日付を入れてください',
            'first_time.required'=>'開始時刻を入れてください',
            'end_time.required'=>'終了時刻を入れてください',
        ];

    }

}
