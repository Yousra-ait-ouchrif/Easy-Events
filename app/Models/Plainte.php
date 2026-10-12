<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plainte extends Model
{
    protected $fillable = ['user_id', 'contenu', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
