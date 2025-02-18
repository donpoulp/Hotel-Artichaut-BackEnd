<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class Services extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'services';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'description',
        'duration',
        'price',
        'time',
        'quantity',
    ];
    public function reservations(): BelongsToMany{
        return $this->belongsToMany(Reservation::class);
    }
}
