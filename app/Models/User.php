<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class User extends model
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'emailBis',
        'password',
        'phone',
        'phoneBis',
        'role',
    ];
    protected $hidden = [
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function reservation(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }
}
