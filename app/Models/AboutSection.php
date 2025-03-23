<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class AboutSection extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'about_section';

    protected $fillable = [
        'id',
        'about_id',
        'titleEn',
        'titleFr'
    ];

    public function picture():HasMany{
        return $this->hasMany(Picture::class);
    }

    public function about():BelongsTo{
        return $this->belongsTo(About::class);
    }

    public function about_description():HasMany{
        return $this->hasMany(AboutDescription::class);
    }
}
