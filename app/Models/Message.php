<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Party;
use App\Models\User;

class Message extends Model
{
    use HasFactory;
    protected $fillable = ['message', 'party_id', 'user_id'];

    public function Party()
    {
        return $this->hasMany(Party::class, 'party_id');
    }

    public function User()
    {
        return $this->hasMany(User::class, 'user_id');
    }
}
