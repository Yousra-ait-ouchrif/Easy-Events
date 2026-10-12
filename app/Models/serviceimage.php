<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class serviceimage extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'image_path',
    ];
protected $table = 'service_images';
    public function service()
{
    return $this->belongsTo(Service::class);
}




}
