@extends('layout')
@section('content')

<div class="container">
    <div class="row">
        <div class="col col-md-offset-3 col-md-6">
            <nav class="panel panel-default">
                <div class="panel-heading" style="background-color: #006888;">
                    <p class="p-h-p">ユーザー情報編集</p>
                </div>
                <div class="panel-body">
                    @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $message)
                        <p>{{ $message }}</p>
                        @endforeach
                    </div>
                    @endif
                    <form class="edit_user" enctype="multipart/form-data" action="/users/update" accept-charset="UTF-8" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="user_profile_photo">プロフィール写真</label><br>
                            @if ($user->profile_photo)
                            <p>
                                <img src="{{ asset('storage/user_images/' . $user->profile_photo) }}" alt="avatar" class="round-img"/>
                            </p>
                            @endif
                            <input type="file" name="user_profile_photo"  value="{{ old('user_profile_photo',$user->id) }}" accept="image/jpeg,image/gif,image/png" />
                        </div>



                        <div class="form-group">
                            <label for="name">ユーザー名</label>
                            <input autofocus="autofocus" class="form-control" type="text" value="{{ old('user_name',$user->name) }}" name="user_name" />
                        </div>


                        <div class="form-group">
                            <label for="email">メールアドレス</label>
                            <input autofocus="autofocus" class="form-control" type="email" value="{{ old('user_email',$user->email) }}" name="user_email" />
                        </div>

                        <div class="form-group">
                            <label for="user_gym_name">お気に入りのジム</label>
                            <input autofocus="autofocus" class="form-control" type="string" value="{{ old('user_gym_name',$user->user_gym_name) }}" name="gym_name" />
                        </div>


                        <div class="form-group">
                            <label for="user_gym_address">お気に入りのジムの住所</label>
                            <input autofocus="autofocus" class="form-control" type="string" value="{{ old('user_gym_address',$user->user_gym_address) }}" name="gym_address" />
                        </div>


                        <div class="form-group">
                            <label for="user_password">パスワード</label>
                            <input autofocus="autofocus" class="form-control" type="password" value="{{ old('user_password',$user->password) }}" name="user_password" />
                        </div>

                        <div class="form-group">
                            <label for="user_password_confirmation">パスワード</label>
                            <input autofocus="autofocus" class="form-control" type="password" name="user_password_confirmation" />
                        </div>

                    </div>

                    <div class="text-right" style="padding: 15px 20px 20px 0;">
                        <button type="submit" class="btn btn-info" >送信</button>
                    </div>
                </form>
            </div>
        </nav>
    </div>
    @endsection


