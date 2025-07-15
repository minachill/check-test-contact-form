<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|integer|between:1,3',
            'email' => 'required|email|max:255',
            'tel' => 'required|digits_between:10,11|regex:/^\d+$/',
            'address' => 'required|string|max:255',
            'building' => 'nullable|string|max:255',
            'detail' => 'required|string|max:120',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'tel' => $this->tel1 . $this->tel2 . $this->tel3,
        ]);
    }

    public function messages()
    {
        return [
            'first_name.required' => '姓を入力してください',
            'first_name.string' => '姓は文字列で入力してください',
            'first_name.max' => '姓は255文字以内で入力してください',
            'last_name.required' => '名を入力してください',
            'last_name.string' => '名は文字列で入力してください',
            'last_name.max' => '名は255文字以内で入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            'email.max' => 'メールアドレスは255文字以内で入力してください',
            'tel.required' => '電話番号を入力してください',
            'tel.digits_between' => '電話番号は5桁までの数字で入力してください',
            'tel.regex' => '電話番号は半角数字、ハイフンなしで入力してください',
            'address.required' => '住所を入力してください',
            'address.string' => '住所は文字列で入力してください',
            'address.max' => '住所は255文字以内で入力してください',
            'building.string' => '建物名は文字列で入力してください',
            'building.max' => '建物名は255文字以内で入力してください',
            'category_id.required' => 'お問合わせの種類を選択してください',
            'category_id.exists' => '選択されたお問い合わせの種類は無効です',
            'detail.required' => 'お問合わせ内容を入力してください',
            'detail.string' => 'お問合わせ内容は文字列で入力してください',
            'detail.max' => 'お問合わせ内容は120文字以内で入力してください',
        ];
}

}