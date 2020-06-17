@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        @include("share.side")
        <div class="col col-md-9">
            <nav class="panel panel-default" style="padding-bottom: 10px;" >

                <div class="panel-heading" style="background-color: #006888;">
                    <p class="p-h-p">タスクのキーワードを入力</p>
                </div>
                <div class="form-group" style="width: 90%; margin: 20px auto">
                    <form action="{{url('/tasks/search')}}" method="GET">
                        <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search" style="display: inline"></i> 検索</button>
                        <input  type="string" class="form-control" name="keyword" id="title" placeholder="キーワードを入力してください" />
                    </form>
                </div>
            </nav>
            <nav class="panel panel-default" style="padding-bottom: 10px;" >

                <div class="panel-heading" style="background-color: #006888;">
                    <p class="p-h-p">タスク検索一覧</p>
                </div>

                @if ($folder_name != null)
                    @for($i = 0; $i<count($folder_name); $i++)
                    <div class="form-group" style="width: 90%; margin: 20px auto ; border-bottom: 1px solid #aab2bd">
                        <p>フォルダ名 : <a href="{{ route('tasks.index', ['id' => $folder_id[$i]]) }}">{{$folder_name[$i]}}</a></p>
                        <p>タスク名 : {{$array[$i]}}</p>
                    </div>
                    @endfor

                @else
                    <div class="form-group" style="width: 90%; margin: 20px auto ; font-weight: bold; text-align: center">
                        <p>検索キーワードを入力してください</p>
                    </div>

                @endif

            </nav>
        </div>
    </div>
</div>
@endsection

