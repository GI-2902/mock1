@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('/css/login.css')}}">
@endsection

@section('content')

    <form action="/login" method="post" class="login">
        @csrf
        <div class="login_title">ログイン</div>
        <div class="login_email">
            <div class="login_email_title">メールアドレス</div>
            <input type="email" name="email" class="login_email_input" value="{{old('email')}}"/>
        </div>
        <div class="login_pass">
            <div class="login_pass_title">パスワード</div>
            <input type="password" name="password" class="login_pass_input"/>
        </div>
        <input type="submit" value="ログインする" class="login_button"></input>
        <div class="login_register">
            <a href="/register" class="login_register_link">会員登録はこちら</a>
        </div>
    
        </div>

    </form>

@endsection