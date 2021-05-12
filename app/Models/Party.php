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

    public function Game()
    {
        return $this->hasMany(Game::class, 'game_id');
    }

    public function Message()
    {
        return $this->belongsTo(Message::class, 'party_id');
    }

    public function User()
    {
        return $this->belongsToMany(User::class, 'party_users');
    }
}
