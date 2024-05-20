<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function isAdmin(){
        return $this->role==='admin';
    }
    public function isPelanggan(){
        return $this->role==='pelanggan';
    }

    // protected $fillable = [
    //     'username',
    //     'nama',
    //     'email',
    //     'password',
    //     'role',
    //     'telepon',
    //     'alamat',
    //     'email_verified_at',
    // ];

    protected $guarded = [
        'id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
