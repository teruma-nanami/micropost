<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Tweet;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $tweets = $user->tweets()->latest()->get(); // ログインユーザーの投稿一覧
        return view('mypage', compact('user', 'tweets'));
    }

    public function show($id)
    {
        $user = User::with('tweets')->findOrFail($id);
        // 見知らぬIDのパターンに備えて findOrFail() で404を返す

        return view('.show', compact('user'));
    }
    public function store($id)
    {
        $user = User::findOrFail($id);
        // Auth::user()->follows($user); // フォロー処理
        auth()->user()->follows()->attach($user);
        return redirect()->back()->with('success', 'フォローしました！');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        // Auth::user()->follows($user); // フォロー解除処理
        auth()->user()->follows()->detach($user);

        return redirect()->back()->with('success', 'フォローを解除しました！');
    }
}
