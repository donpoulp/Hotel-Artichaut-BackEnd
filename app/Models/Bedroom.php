<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Bedroom extends Model
{
    use HasFactory, Notifiable, HasUuids;

    protected $table = 'reservations';
    public $timestamps = true;

    protected $fillable = [
        'number',
        'image',
    ];
}
