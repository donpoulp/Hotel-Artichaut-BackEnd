<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class About extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'about';

    protected $fillable = [
        'id',
        'background_color',
        'background_opacity',
    ];

    public function about_section():HasMany{
        return $this->hasMany(AboutSection::class);
    }
}


