<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{

protected $fillable = ['service_id', 'rate', 'comment'];

}
