<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Icon extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'icon';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'link'
    ];
}
