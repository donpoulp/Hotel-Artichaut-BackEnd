<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Hotel extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'hotel';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'postalCode',
    ];
}
