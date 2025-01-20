<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class Picture extends Model
{
    use HasFactory, Notifiable, HasUuids;

    protected $table = 'pictures';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'PicturePath',
    ];
    public function bedroomType():BelongsToMany{
        return $this->belongsToMany(BedroomType::class);
    }
    public function hero():BelongsToMany{
        return $this->belongsToMany(Hero::class);
    }
    public function news():BelongsToMany{
        return $this->belongsToMany(News::class);
    }
    public function reservation():BelongsToMany{
        return $this->belongsToMany(Reservation::class);
    }
}
