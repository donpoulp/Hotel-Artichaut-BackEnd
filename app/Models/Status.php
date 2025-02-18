<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class Status extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'statuses';
    public $timestamps = true;

    protected $fillable = [
        'state'
    ];

    public function reservations(): HasMany {

        return $this->hasMany(Reservation::class);
    }
}
