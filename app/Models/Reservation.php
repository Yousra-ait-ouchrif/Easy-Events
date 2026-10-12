<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
   protected $fillable = [
    'user_id',
    'service_id',
    'prestataire_id',
    'date',
    'details',
    'status',
   
];
protected $dates = ['date'];


    

public function service()
{
    return $this->belongsTo(Service::class);
}

public function user()
{
    return $this->belongsTo(User::class, 'user_id'); 
}
public function prestataire()
{
    return $this->belongsTo(User::class, 'prestataire_id');
}


    
}
