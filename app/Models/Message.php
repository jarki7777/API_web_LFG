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
    protected $hidden = ['created_at', 'updated_at'];

    public function party()
    {
        return $this->hasMany(Party::class, 'id');
    }

    public function user()
    {
        return $this->hasMany(User::class, 'user_id');
    }
}
