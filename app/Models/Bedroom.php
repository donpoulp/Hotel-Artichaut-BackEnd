<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class Bedroom extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'bedroom';
    public $timestamps = true;

    protected $fillable = [
        'number',
        'bedroom_type_id',
    ];
    public function reservation():HasMany{
        return $this->hasMany(Reservation::class);
    }
    public function picture():HasMany{
        return $this->hasMany(Picture::class);
    }
    public function bedroom_type():BelongsTo{
        return $this->belongsTo(BedroomType::class);
    }
}
