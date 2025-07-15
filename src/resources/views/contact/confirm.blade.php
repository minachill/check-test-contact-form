@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact/confirm.css') }}">
@endsection

@section('content')
<div class="confirm-container">
    <h1>Confirm</h1>

    <form method="POST" action="{{ route('contacts.store') }}">
        @csrf
        <table class="confirm-table">
            <tr><th>お名前</th><td>{{ $data['last_name'] }}　{{ $data['first_name'] }}</td></tr>
            <tr><th>性別</th><td>
                @if ($data['gender'] == 1) 男性
                @elseif ($data['gender'] == 2) 女性
                @else その他
                @endif
            </td></tr>
            <tr><th>メールアドレス</th><td>{{ $data['email'] }}</td></tr>
            <tr><th>電話番号</th><td>{{ $data['tel'] }}</td></tr>
            <tr><th>住所</th><td>{{ $data['address'] }}</td></tr>
            <tr><th>建物名</th><td>{{ $data['building'] }}</td></tr>
            <tr><th>お問い合わせ項目</th><td>{{ $category_name }}</td></tr>
            <tr><th>お問い合わせ内容</th><td>{!! nl2br(e($data['detail'])) !!}</td></tr>
        </table>

        @foreach($data as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach
        <input type="hidden" name="tel1" value="{{ substr($data['tel'], 0, 3) }}">
        <input type="hidden" name="tel2" value="{{ substr($data['tel'], 3, 4) }}">
        <input type="hidden" name="tel3" value="{{ substr($data['tel'], 7) }}">

        <div class="button-area">
            <button type="submit" name="action" value="submit">送信</button>
            <button type="submit" name="action" value="back">修正</button>
        </div>
    </form>
</div>
@endsection