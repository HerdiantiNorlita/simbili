<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home1 extends Model
{
    use HasFactory;
     protected $table = 'home_1';
     protected $fillable = ["voltage","current","power","energy","frequency","pf"];
     protected $primaryKey = 'home_id';

}
