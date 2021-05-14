<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Game;
use App\Models\Message;
use App\Models\User;

class Party extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'game_id'];

    public function game()
    {
        return $this->hasMany(Game::class, 'game_id');
    }

    public function message()
    {
        return $this->belongsTo(Message::class, 'party_id');
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'party_users');
    }
}
