@extends('layout')
@section('content')
@inject('Num', 'App\Library\Num')
<div class="container">
    <div class="row">
        <div class="col col-md-offset-2 col-md-8">
            <nav class="panel panel-default">
                <div class="panel-heading" style="background-color: #006888;">
                    <p class="p-h-p">筋トレメニューを編集する</p>
                </div>

                <div class="panel-body">
                    @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $message)
                        <p>{{ $message }}</p>
                        @endforeach
                    </div>
                    @endif
                    <form class="upload-images p-0 border-0" id="new_post" enctype="multipart/form-data" action="{{ route('training.update', ['id' =>$training->id]) }}" accept-charset="UTF-8" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="movie">トレーニング動画を追加してください</label>
                            <input type="file" name="movie" accept="video/mp4" />
                        </div>
                        <div class="form-group">
                            <label for="title">トレーニング名</label>
                            <input type="string" class="form-control" name="title" id="title" value="{{ old('title', $training->title) }}" placeholder="（例）プッシュアップ" />
                        </div>
                        <div class="form-group">
                            <label for="point">筋トレのコツ・ポイント</label>
                            <input type="string" class="form-control" name="point" id="point" value="{{ old('point', $training->point) }}" placeholder="（例）大胸筋を意識する" />
                        </div>


                        <div class="form-group">
                            <label for="set">セット数</label>
                        <select name="set" value="{{ old('set', $training->set) }}" >
                            {{$Num->setNum(20)}}
                        </select>
                        <strong> ✖︎ </strong>
                            <label for="num">回数</label>
                        <select name="num" value="{{ old('num', $training->num) }}" >
                            {{$Num->num(100)}}
                        </select>
                        </div>
                        <div class="form-group">
                            <label for="detail">筋トレの説明</label>
                            <textarea name="detail" class="form-control" id="detail" cols="30" rows="10" placeholder="筋トレの説明を書く">{{ old('detail', $training->detail) }}</textarea>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-info">送信</button>
                        </div>
                    </form>
                </div>
            </nav>
        </div>
    </div>
</div>
@endsection
