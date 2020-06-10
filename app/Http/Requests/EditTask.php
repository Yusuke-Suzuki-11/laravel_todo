<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Task;
use Illuminate\Validation\Rule;

class EditTask extends CreateTask
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
        //CreateTaskのルールを引継ぎ
        $rule = parent::rules();

        //タスクモデルのステータスを読み込み
        $status_rule = Rule::in(array_keys(Task::STATUS));

        // ルールを追加
        return $rule + ['status' => 'required|' . $status_rule,];
    }

    public function attributes()
    {
        //createTaskのアトリビュートを引継ぎ
        $attributes = parent::attributes();

        //アトリビュートの追加
        return $attributes + ['status' => '状態',];
    }

    public function messages()
    {
        // 親のメッセージを取得
        $messages = parent::messages();

        $status_labels = array_map(function ($item) {
            return $item['label'];
        }, Task::STATUS);

        $status_labels = implode('、', $status_labels);

        return $messages + [
            'status.in' => ':attribute には ' . $status_labels . ' のいずれかを指定してください。',
        ];
    }
}
