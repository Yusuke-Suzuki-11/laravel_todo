@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col col-md-offset-2 col-md-8">
            <nav class="panel panel-default">
                <div class="panel-heading" style="background-color: #006888;">
                <p style="font-weight: bold; text-align: center; font-size: 16px; margin: 0; color: #e9fbfb;">フォルダーを追加する</p>
            </div>
                <div class="panel-body">
                    @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $message)
                        <p>{{ $message }}</p>
                        @endforeach
                    </div>
                    @endif
                    <form action="{{ route('folders.create') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title">フォルダ名</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" />
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

