<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

// ゲストユーザーのみアクセス可能
Route::middleware('guest')->group(function () {
    // ユーザー登録、ログイン、パスワードリセット
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');
    // ユーザー登録処理：：ユーザー登録フォームから送信されたデータを処理
    Route::post('register', [RegisteredUserController::class, 'store']);
    // ログインフォーム表示
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');
    // ログイン処理：：ログインフォームから送信されたデータを処理
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    // パスワードリセット
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');
    // パスワードリセットリンク送信処理：：パスワードリセットリンクを送信
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');
    // パスワードリセットフォーム表示
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');
    // パスワードリセット処理：：パスワードリセットフォームから送信されたデータを処理
    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

// 認証済みユーザーのみアクセス可能
Route::middleware('auth')->group(function () {
    // メールアドレス確認
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');
    // メールアドレス確認処理：：メールアドレス確認リンクをクリック
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');
    // メールアドレス確認リンク再送信処理：：メールアドレス確認リンクを再送信
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');
    // パスワード確認
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');
    // パスワード確認処理：：パスワード確認フォームから送信されたデータを処理
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
    // パスワード変更
    Route::put('password', [PasswordController::class, 'update'])->name('password.update');
    // ログアウト
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
