<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class Services extends Model
{
    use HasFactory, Notifiable, HasUuids;

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
    public function reservations(): HasMany{
        return $this->hasMany(Reservation::class);
    }
}
