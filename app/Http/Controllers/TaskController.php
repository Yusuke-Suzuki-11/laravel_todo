<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Folder;
use App\Task;
use App\Http\Requests\CreateTask;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EditTask;


class TaskController extends Controller
{
    public function index(int $id)
    {
        // すべてのフォルダを取得する
        $folders = Auth::user()->folders()->get();

        // 選ばれたフォルダを取得する
        $current_folder = Folder::find($id);

        // 選ばれたフォルダに紐づくタスクを取得する
        $tasks = $current_folder->tasks()->get(); // ★

        return view('tasks/index', [
            'folders' => $folders,
            'current_folder_id' => $current_folder->id,
            'tasks' => $tasks,
        ]);
    }

    public function showCreateForm(int $id)
    {
        // ビューにフォルダーIDを返す
        return view('tasks/create', ['folder_id' => $id]);
    }

    public function create (int $id, CreateTask $request)
    {
        // フォルダーを取得
        $current_folder = Folder::find($id);

        // タスクを設定
        $task = new Task();
        $task->title = $request->title;
        $task->due_date = $request->due_date;

        // 選択中のフォルダーに結びつけて保存
        $current_folder->tasks()->save($task);

        return redirect()->route('tasks.index', ['id' => $current_folder->id,]);
    }

    public function showEditForm(int $id, int $task_id)
    {
        // タスクIDのタスクを取得
        $task = Task::find($task_id);

        // ビューに返す
        return view('tasks/edit', ['task' => $task,]);
    }

    public function edit(int $id, int $task_id, EditTask $request)
    {
        // タスクIDと一致するタスクを取得
        $task = Task::find($task_id);

        // リクエストから送られてくるカラムを書き込み
        $task->title = $request->title;
        $task->status = $request->status;
        $task->due_date = $request->due_date;
        $task->save();

        //ホームにリダイレクト
        return redirect()->route('tasks.index', ['id' => $task->folder_id,]);
    }
}
