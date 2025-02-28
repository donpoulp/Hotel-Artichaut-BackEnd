<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
class Teams extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'teams';

    protected $fillable = [
        'id',
        'about_description_id',
        'name',
        'description',
    ];

    public function about_description():belongsTo{
        return $this->belongsTo(AboutDescription::class);
    }

    public function teams_strongest_point():HasMany{
        return $this->hasMany(TeamsStrongestPoint::class);
    }

    public function picture():HasMany{
        return $this->hasMany(Picture::class);
    }
}
