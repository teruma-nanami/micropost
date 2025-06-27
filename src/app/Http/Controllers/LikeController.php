<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;

class LikeController extends Controller
{
    public function like($id)
    {
        $tweet = Tweet::findOrFail($id);
        $tweet->likedByUsers()->attach(auth()->id());

        return redirect()->back()->with('success', 'ツイートにいいねしました！');
    }

    public function unlike($id)
    {
        $tweet = Tweet::findOrFail($id);
        $tweet->likedByUsers()->detach(auth()->id());

        return redirect()->back()->with('success', 'ツイートのいいねを解除しました！');
    }
}
