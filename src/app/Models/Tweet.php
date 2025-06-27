<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Tweet extends Model
{
	use HasFactory;

	protected $fillable = [
		'content',
		'user_id',
		'parent_id', // 追加
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
	public function likedByUsers()
	{
		return $this->belongsToMany(User::class, 'likes')->withTimestamps();
	}
	// 親（誰に対してのリプライか）
	public function parent()
	{
		return $this->belongsTo(Tweet::class, 'parent_id');
	}

	// 子（この投稿に対してのリプライ一覧）
	public function replies()
	{
		return $this->hasMany(Tweet::class, 'parent_id');
	}
}
