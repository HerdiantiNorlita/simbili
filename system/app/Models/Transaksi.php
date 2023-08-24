<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Transaksi extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'transaksi';
    protected $primaryKey = 'transaksi_id';

}
