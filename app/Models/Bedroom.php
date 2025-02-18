<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class Bedroom extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'bedroom';
    public $timestamps = true;

    protected $fillable = [
        'number',
    ];
    public function reservation():HasMany{
        return $this->hasMany(Reservation::class);
    }
    public function bedroomType():HasMany{
        return $this->hasMany(BedroomType::class);
    }
    public function picture():BelongsToMany{
        return $this->BelongsToMany(Picture::class);
    }
}
