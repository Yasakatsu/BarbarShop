<?php

namespace App\Http\Controllers\bullsCut;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    // contactページ表示
    public function index()
    {
        return view('contact')->with('title', 'お問い合わせ');
    }
    // お問い合わせ内容の送信処理
    public function send(Request $request)
    {
        // バリデーション
        $request->validate([
            'name' => 'required|string|max:255',
            'name_kana' => 'required|string|max:255',
            'tel' => 'nullable|string|max:255', // 電話番号は任意
            'email' => 'required|email|max:255',
            'body' => 'required|string|max:1000',
        ]);
        // メール送信
        Mail::send('emails.contact', [
            'name' => $request->name,
            'email' => $request->email,
            'body' => $request->message,
        ], function ($message) {
            $message->to('chappieoct4@gmail.com')->subject('お問い合わせ');
        });
        // 送信完了メッセージをフラッシュデータとしてセッションに保存
        $request->session()->flash('status', 'お問い合わせを受け付けました。');
        // お問い合わせページにリダイレクト
        return redirect()->route('contact');
    }
}
