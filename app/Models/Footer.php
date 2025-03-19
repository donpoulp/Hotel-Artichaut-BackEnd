<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class Footer extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'footer';
    public $timestamps = true;

    protected $fillable = [
        'titleFr',
        'titleEn',
        'textFr',
        'textEn',
        'iconReseau',
        'linkReseau',
        'background_color',
        'background_opacity',
    ];
    public function icon():HasMany{
        return $this->hasMany(Icon::class);
    }
}
