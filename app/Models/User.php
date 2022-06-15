<?php

namespace App\Models;
/*
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
*/
use Illuminate\Database\Eloquent\Model;

class user extends Model
{
  protected $table="user";
public $timestamps = false;
  public function tbchat()
    {
        return $this->hasMany(Tbchat::class);
    }
}
