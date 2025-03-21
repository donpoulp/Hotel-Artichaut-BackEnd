<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class AboutDescription extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'about_description';

    protected $fillable = [
        'id',
        'about_section_id',
        'titleEn',
        'titleFr',
        'descriptionEn',
        'descriptionFr',
        'background_color',
        'background_opacity',
    ];

    public function picture():HasMany{
        return $this->hasMany(Picture::class);
    }

    public function about_section():BelongsTo{
        return $this->belongsTo(AboutSection::class);
    }

    public function teams():HasMany{
        return $this->hasMany(Teams::class);
    }
}
