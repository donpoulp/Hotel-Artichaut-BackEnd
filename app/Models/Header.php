<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Header extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'header';
    public $timestamps = true;

    protected $fillable = [
        'logo',
        'icone',
        'backgroundColor',
    ];
}
