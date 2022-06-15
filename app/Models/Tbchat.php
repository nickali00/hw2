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

class tbchat extends Model
{
  public $timestamps = false;
  protected $table="tbchat";

  public function user()
  {
      return $this->belongsTo(Tbuser::class);
  }
}
