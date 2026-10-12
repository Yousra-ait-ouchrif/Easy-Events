<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
   use HasFactory;
 


    protected $fillable = [
        'user_id',
        'titre',
        'description',
        'prix',
        'images',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function resevations()
{
    return $this->hasMany(Reservation::class); 
}
public function images()
{
    return $this->hasMany(serviceimage::class);
}

}
