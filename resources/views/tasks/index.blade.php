@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        @include("share.side")
        <div class="col col-md-3">
            <nav class="panel panel-default">
                <div class="panel-heading" style="background-color: #006888;">
                    <p class="p-h-p">フォルダ数： {{ $all_folders_num}}</p>
                </div>
                <div class="panel-body">
                    <a href="{{ route('folders.create') }}" class="btn btn-default btn-block">
                        フォルダを追加する
                    </a>
                </div>
                <div class="list-group">
                    @foreach($folders as $folder)
                    <a href="{{ route('tasks.index', ['id' => $folder->id]) }}" class="list-group-item {{ $current_folder_id === $folder->id ? 'active' : '' }}">
                        {{ $folder->title }}
                        <form action="{{ url('folders/' . $folder->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" style="padding: 1px 5px 1px 5px; display: inline-block;">
                                削除
                            </button>
                        </form>
                    </a>
                    @endforeach
                </div>
            </nav>
        </div>
        <div class="column col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #006888;">
                    <p class="p-h-p">タスク数： {{ $all_tasks_num }}</p>
                </div>
                <div class="panel-body">
                    <div class="text-right">
                        <a href="{{ route('tasks.create', ['id' => $current_folder_id]) }}" class="btn btn-default btn-block">
                            タスクを追加する
                        </a>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>タイトル</th>
                            <th>状態</th>
                            <th>期限</th>
                            <th> </th>
                            <th style="width: 44px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                        <tr>
                            <td>
                                {{ $task->title }}
                            </td>
                            <td>
                                <span class="label {{ $task->status_class }}">{{ $task->status_label }}</span>
                            </td>
                            <td>
                                @if ($task->due_date < $date && $task->status_label == '完了')
                                <span class="text-info">{{$task->due_date}}</span>
                                @elseif ($task->due_date > $date )
                                <span class="text-danger">{{$task->due_date}}</span>
                                @else
                                {{$task->due_date}}
                                @endif
                            </td>
                            <td style="padding-right: 0px">
                                <a href="{{ route('tasks.edit', ['id' => $task->folder_id, 'task_id' => $task->id]) }}" class="btn btn-info btn-sm" style="padding: 1px 5px 1px 5px; margin-right: 0px">
                                    編集
                                </a>
                            </td>
                            <td>
                                <form action="/tasks/{{ $task->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" style="padding: 1px 5px 1px 5px;" >
                                        <i class="fa fa-btn fa-trash"></i> 削除
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
