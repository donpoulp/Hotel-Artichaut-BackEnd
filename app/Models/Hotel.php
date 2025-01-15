<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Hotel extends Model
{
    use HasFactory, Notifiable, HasUuids;

    protected $table = 'hotel';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'address',
        'description',
        'phone',
        'email',
        'postalCode',
    ];
}
