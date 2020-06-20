<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditTraining extends FormRequest
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
            'title' => 'required',
            'point' => 'required',
            'detail' => 'required|max:100',
            'set' => 'required',
            'num' => 'required',

        ];
    }

    public function attributes()
    {
        return [
            'title' => 'トレーニング名',
            'detail' => '筋トレの説明',
            'point' => '筋トレのコツ・ポイント',
        ];
    }
}
