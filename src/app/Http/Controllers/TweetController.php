<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TweetRequest;

class TweetController extends Controller
{
  public function index()
  {
    $tweets = Tweet::with('user')->latest()->get();
    return view('index', compact('tweets'));
  }
  public function create()
  {
    return view('create');
  }
  public function store(Request $request)
  {
    Tweet::create([
      'user_id' => Auth::id(),
      'content' => $request->input('content'),
    ]);

    return redirect()->route('home')->with('success', '投稿が完了しました！');
  }
  public function edit(Tweet $tweet)
  {
    if (auth()->id() !== $tweet->user_id) {
      abort(403, 'この投稿を編集する権限がありません');
    }
    // ユーザーが投稿の所有者である場合、編集画面を表示
    return view('edit', compact('tweet'));
  }
  public function update(TweetRequest $request, Tweet $tweet)
  {
    if (auth()->id() !== $tweet->user_id) {
      abort(403, 'この投稿を更新する権限がありません');
    }

    $tweet->update([
      'content' => $request->input('content'),
    ]);

    return redirect()->route('home')->with('success', '投稿を更新しました');
  }

  public function destroy(Tweet $tweet)
  {
    if (auth()->id() !== $tweet->user_id) {
      abort(403, 'この投稿を削除する権限がありません');
    }

    $tweet->delete();

    return redirect()->route('home')->with('success', '投稿を削除しました');
  }
}
