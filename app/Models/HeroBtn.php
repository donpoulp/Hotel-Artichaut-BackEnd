<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class HeroBtn extends Model
{
    use HasFactory, Notifiable, HasUuids;

    protected $table = 'hero_btn';
    public $timestamps = true;

    protected $fillable = [
        'text',
        'action',
        'backgroundColor',
        'textColor',
    ];
}
