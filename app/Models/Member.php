<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'gender',
        'email',
        'password',

    ];
    protected $casts = [
        'password' => 'hashed',
    ];

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
