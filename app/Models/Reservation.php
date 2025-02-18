<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;

class Reservation extends Model
{

    use HasFactory, Notifiable;

    protected $table = 'reservation';
    public $timestamps = true;

    protected $fillable = [
        'startDate',
        'endDate',
        'user_id',
        'picture_id'
    ];

    public function user(): BelongsTo{

        return $this->belongsTo(User::class);
    }

    public function services(): BelongsToMany{
        return $this->belongsToMany(Services::class);
}
    public function bedroomType(): BelongsToMany{
            return $this->belongsToMany(BedroomType::class);
}
    public function picture():BelongsToMany{
        return $this->BelongsToMany(Picture::class);
    }
}
