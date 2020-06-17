@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        @include("share.side")
        <div class="col col-md-9">
            <nav class="panel panel-default">
                <div class="panel-heading" style="background-color: #006888;">
                    <p class="p-h-p" style="font-size: 18px">{{$training->title}}</p>
                </div>
                <div class="panel-body">
                    <div class="card-wrap ">
                        <div class="card text-center">
                            <iframe src="/storage/movies/{{ $training->id }}.mp4"  width="90%" height="450px"></iframe>
                        </div>
                        <div class="card-body list-group-item">
                            <p class="tr-cap">回数</p><br>
                                <span>{{ $training->set }}セット　×　{{$training->num}}回</span>
                        </div>
                        <div class="card-body list-group-item">
                            <p class="tr-cap">筋トレの説明</p><br>
                                <span　>{{ $training->detail }}</span>
                        </div>
                        <div class="card-body list-group-item">
                            <p class="tr-cap">ポイント・注意点</p><br>
                                <span>{{ $training->point }}</span>
                        </div>



                            <a class=" btn btn-danger " style="margin-top: 20px; margin-left: 10px; color: white; float: right; padding: 3px 10px" href="/training/delete/{{$training->id}}">削除</a>
                            <a class=" btn btn-primary" style="margin-top: 20px; color: white; float: right; padding: 3px 10px" href="/training/delete/{{$training->id}}">編集</a>




                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
@endsection
