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
        'title',
        'description',
        'background_color_1',
        'background_opacity_1',
        'backgroundText_color_1',
        'backgroundText_opacity_1',
        'backgroundText_color_2',
        'backgroundText_opacity_2',
    ];
    public function picture():HasMany{
        return $this->hasMany(Picture::class);
    }
}


