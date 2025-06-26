<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Tweet;

class UserController extends Controller
{
    public function mypage()
    {
        $user = Auth::user();
        $tweets = $user->tweets()->latest()->get(); // ログインユーザーの投稿一覧
        return view('mypage', compact('user', 'tweets'));
    }
}
