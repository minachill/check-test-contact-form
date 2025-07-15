@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact/index.css') }}">
@endsection

@section('content')
<div class="contact-form">
    <h1>Contact</h1>

    <form action="{{ route('contact.confirm') }}" method="POST">
        @csrf

        <table class="form-table">

            <tr>
                <th><label for="first_name">お名前 <span class="required">※</span></label></th>
                <td>
                    <div class="name-fields">
                        <input type="text" name="first_name" maxlength="255" placeholder="例: 山田" value="{{ old('first_name') }}">
                        <input type="text" name="last_name" maxlength="255" placeholder="例: 太郎" value="{{ old('last_name') }}">
                    </div>
                    @error('first_name')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                    @error('last_name')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </td>
            </tr>


            <tr>
                <th>性別 <span class="required">※</span></th>
                <td>
                    <div class="custom-radio">
                        <label><input type="radio" name="gender" value="1" {{ old('gender', '1') == '1' ? 'checked' : '' }}> 男性</label>
                        <label><input type="radio" name="gender" value="2" {{ old('gender') == '2' ? 'checked' : '' }}> 女性</label>
                        <label><input type="radio" name="gender" value="3" {{ old('gender') == '3' ? 'checked' : '' }}> その他</label>
                    </div>
                    @error('gender')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </td>
            </tr>


            <tr>
                <th><label for="email">メールアドレス <span class="required">※</span></label></th>
                <td>
                    <input type="text" name="email" maxlength="255" placeholder="例: test@example.com" value="{{ old('email') }}">
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </td>
            </tr>


            <tr>
                <th><label for="tel">電話番号 <span class="required">※</span></label></th>
                <td>
                    <div class="tel-inputs">
                    <input type="text" name="tel1" placeholder="080" value="{{ old('tel1') }}">
                    <span class="hyphen">-</span>
                    <input type="text" name="tel2" placeholder="1234" value="{{ old('tel2') }}">
                    <span class="hyphen">-</span>
                    <input type="text" name="tel3" placeholder="5678" value="{{ old('tel3') }}">
                    </div>
                    @error('tel')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </td>
            </tr>

            <tr>
                <th><label for="address">住所 <span class="required">※</span></label></th>
                <td>
                    <input type="text" name="address" maxlength="255" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
                    @error('address')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </td>
            </tr>

            <tr>
                <th><label for="building">建物名</label></th>
                <td>
                    <input type="text" name="building" maxlength="255" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building') }}">
                    @error('building')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </td>
            </tr>

            <tr>
                <th><label for="category_id">お問い合わせの種類 <span class="required">※</span></label></th>
                <td>
                    <div class="select-wrapper">
                        <select name="category_id">
                            <option value="">選択してください</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->content }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('category_id')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </td>
            </tr>

            <tr>
                <th><label for="detail">お問い合わせ内容 <span class="required">※</span></label></th>
                <td>
                    <textarea name="detail" rows="5" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                    @error('detail')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </td>
            </tr>
        </table>

        <div class="form-button">
            <button type="submit" name="action" value="confirm">確認画面へ</button>
        </div>
    </form>
</div>
@endsection