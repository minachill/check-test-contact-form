
@extends('layouts.admin')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/register.css') }}">
@endsection

@section('content')
<div class="auth-wrapper">
    <h2 class="auth-title">Register</h2>
    <div class="auth-box">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="name">お名前</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="例: 山田 太郎">
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">メールアドレス</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="例: test@example.com" >
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">パスワード</label>
                <input id="password" type="password" name="password" placeholder="例: coachtech1106" >
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="auth-button">登録</button>
        </form>
    </div>
</div>
@endsection
