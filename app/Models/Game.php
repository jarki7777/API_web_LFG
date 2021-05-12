<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Party;

class Game extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'genre'];

    public function Party()
    {
        return $this->belongsTo(Party::class, 'game_id');
    }
}
