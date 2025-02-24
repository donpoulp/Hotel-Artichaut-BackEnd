<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class Hero extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'hero';
    public $timestamps = true;

    protected $fillable = [
        'title',
        'description',
    ];
    public function picture():HasMany{
        return $this->hasMany(Picture::class);
    }

}
