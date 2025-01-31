<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Strongest extends Model
{
    use HasFactory, Notifiable, HasUuids;

    protected $table = 'strongest';
    public $timestamps = true;

    protected $fillable = [
        'background_color_1' => 'nullable',
        'background_opacity_1' => 'nullable',
        'background_color_2' => 'nullable',
        'background_opacity_2' => 'nullable'
    ];
}
