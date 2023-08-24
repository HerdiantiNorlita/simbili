<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home2 extends Model
{
    use HasFactory;
     protected $table = 'home_2';
     protected $fillable = ["voltage","current","power","energy","frequency","pf"];
     protected $primaryKey = 'home_id';

}
