<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'master',
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'master' => 'boolean',
        'email_verified_at' => 'datetime',
    ];

    public $order = "master DESC, name ASC, email ASC";

    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => Hash::make($value),
        );
    }

    protected function master(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => ($value === 'on') ? true : $value,
        );
    }

    public function rules()
    {
        return [
            "name" => "required|min:3|max:50",
            "email" => "required|email|unique:users",
            "master" => "required|sometimes",
            "username" => "required|min:3|max:50|unique:users",
            "password" => "sometimes|required|min:6|confirmed",
        ];
    }
}
