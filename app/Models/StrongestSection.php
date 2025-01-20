<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class StrongestSection extends Model
{
    use HasFactory, Notifiable, HasUuids;

    protected $table = 'strongest_section';
    public $timestamps = true;

    protected $fillable = [
        'icon',
        'text',
    ];
}
