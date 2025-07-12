<?php
namespace Database\Factories;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TweetFactory extends Factory
{
    protected $model = Tweet::class;

    public function definition()
    {
        return [
            'content' => $this->faker->realText(80),
            'user_id' => User::inRandomOrder()->first()->id ?? 1,
            'parent_id' => null, // リプライ機能拡張時はランダムで設定可能
        ];
    }
}
