<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $table = 'users';

    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'emailBis',
        'phone',
        'phoneBis',
        'role',
    ];
    protected $hidden = [
        'remember_token',
        'password',
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
