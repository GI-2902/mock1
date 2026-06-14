@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('/css/register.css')}}">
@endsection

@section('content')

    <form action="/register" method="post" class="regi">
        @csrf
        <div class="regi_body">
        
            <div class="regi_body_title">会員登録</div>
            <div class="regi_body_user">
                <div class="regi_body_user_title">ユーザ名</div>
                <input type="text" name="name" class="regi_body_user_input" value="{{old('name')}}"/>
            </div>
            <div class="regi_body_email">
                <div class="regi_body_email_title">メールアドレス</div>
                <input type="email" name="email" class="regi_body_email_input" value="{{old('email')}}"/>
            </div>
            <div class="regi_body_pass">
                <div class="regi_body_pass_title">パスワード</div>
                <input type="password" name="password" class="regi_body_pass_input"/>
            </div>
            <div class="regi_body_confirm">
                <div class="regi_body_confirm_title">確認用パスワード</div>
                <input type="password" name="password_confirmation" class="regi_body_confirm_input"/>
            </div>
        </div>

        <input type="submit" value="登録する" class="regi_button"></input>
        <div class="regi_login">
            <a href="/login" class="regi_login_link">ログインはこちら</a>
        </div>
        
    </form>

@endsection