<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class BedroomType extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'bedroom_type';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'description',
        'price',
    ];
    public function picture():HasMany{
        return $this->hasMany(Picture::class,'picture_id');
    }
}
