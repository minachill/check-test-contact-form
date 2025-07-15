@extends('layouts.admin')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/index.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/modal.css') }}">
@endsection

@section('content')
<div class="admin-wrapper">
    <h2 class="admin-title">Admin</h2>

    <form method="GET" action="{{ route('admin.index') }}" class="search-form">
        <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{ request('keyword') }}">
        <select name="gender">
            <option value="">性別</option>
            <option value="1" {{ request('gender') == '1' ? 'selected' : '' }}>男性</option>
            <option value="2" {{ request('gender') == '2' ? 'selected' : '' }}>女性</option>
            <option value="3" {{ request('gender') == '3' ? 'selected' : '' }}>その他</option>
        </select>
        <select name="category_id">
            <option value="">お問い合わせの種類</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->content }}
                </option>
            @endforeach
        </select>
        <input type="date" name="date" value="{{ request('date') }}">
        <button type="submit">検索</button>
        <a href="{{ route('admin.index') }}" class="reset-button">リセット</a>
    </form>
    <form method="GET" action="{{ route('admin.export') }}">
        <button type="submit" class="export-button">エクスポート</button>
        <div class="pagination-wrapper">
            {{ $contacts->appends(request()->query())->links('vendor.pagination.custom') }}
        </div>
    </form>


    <table class="admin-table">
        <thead>
            <tr>
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
<tr>
    <td>{{ $contact->full_name }}</td>
    <td>{{ $contact->gender_label }}</td>
    <td>{{ $contact->email }}</td>
    <td>{{ $contact->category->content }}</td>
    <td>
        <button type="button" class="detail-button" data-id="{{ $contact->id }}">
        詳細
        </button>

        <div id="modal-data-{{ $contact->id }}" class="modal-data" style="display: none;">
            <div class="modal-name">{{ $contact->full_name }}</div>
            <div class="modal-gender">{{ $contact->gender_label }}</div>
            <div class="modal-email">{{ $contact->email }}</div>
            <div class="modal-tel">{{ $contact->tel }}</div>
            <div class="modal-address">{{ $contact->address }}</div>
            <div class="modal-building">{{ $contact->building }}</div>
            <div class="modal-category">{{ $contact->category->content }}</div>
            <div class="modal-detail">{{ $contact->detail }}</div>
            <form id="delete-form-{{ $contact->id }}" action="{{ route('admin.destroy', $contact->id) }}" method="POST">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </td>
</tr>
@endforeach
        </tbody>
    </table>

</div>
<div id="detail-modal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="modal-close">&times;</span>

        <div class="modal-row">
            <strong>お名前</strong><span id="modal-name"></span>
        </div>
        <div class="modal-row">
            <strong>性別</strong><span id="modal-gender"></span>
        </div>
        <div class="modal-row">
            <strong>メールアドレス</strong><span id="modal-email"></span>
        </div>
        <div class="modal-row">
            <strong>電話番号</strong><span id="modal-tel"></span>
        </div>
        <div class="modal-row">
            <strong>住所</strong><span id="modal-address"></span>
        </div>
        <div class="modal-row">
            <strong>建物名</strong><span id="modal-building"></span>
        </div>
        <div class="modal-row">
            <strong>お問い合わせの種類</strong><span id="modal-category"></span>
        </div>
        <div class="modal-row">
            <strong>お問い合わせ内容</strong><span id="modal-detail"></span>
        </div>

        <form id="modal-delete-form" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" id="modal-delete-button">削除</button>
        </form>
    </div>
</div>
<script src="{{ asset('js/modal.js') }}"></script>
@endsection