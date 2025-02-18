<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Footer extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'footer';
    public $timestamps = true;

    protected $fillable = [
        'title',
        'text',
        'titleReseau',
        'iconReseau',
        'linkReseau',
    ];
}
