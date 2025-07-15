<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    public function index()
{
    $categories = Category::all();
    return view('contact.index', compact('categories'));
}

public function confirm(ContactRequest $request)
    {
        $data = $request->validated();
        $category = Category::find($data['category_id']);
        $category_name = $category ? $category->content : '不明';
        return view('contact.confirm', [
            'data' => $data,
            'category_name' => $category_name,
        ]);
    }


    public function store(ContactRequest $request)
    {
        $data = $request->validated();
        $category = Category::find($data['category_id']);
        $category_name = $category ? $category->content : '不明';
        if ($request->input('action') === 'submit') {
            Contact::create($data);
            return redirect()->route('contact.thanks');
        } else {
            return redirect()
            ->route('contact.index')
            ->withInput($request->except('_token', 'action') + [
                'tel1' => substr($request->tel, 0, 3),
                'tel2' => substr($request->tel, 3, 4),
                'tel3' => substr($request->tel, 7),]);
        }
    }

    public function thanks()
{
    return view('contact.thanks');
}
}
