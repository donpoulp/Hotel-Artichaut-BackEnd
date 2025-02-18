<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;

class Hero extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'hero';
    public $timestamps = true;

    protected $fillable = [
        'title',
        'description',
        'picture_id'
    ];
    public function picture():BelongsToMany{
        return $this->BelongsToMany(Picture::class);
    }
}
