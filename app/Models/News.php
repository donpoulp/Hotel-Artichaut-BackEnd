<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class News extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'news';
    public $timestamps = true;

    protected $fillable = [
        'title',
        'description',
        'background_color',
        'background_opacity',
    ];
    public function picture():HasMany{
        return $this->hasMany(Picture::class,'picture_id');
    }
}
