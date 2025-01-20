<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;

class Picture extends Model
{
    use HasFactory, Notifiable, HasUuids;

    protected $table = 'Pictures';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'name',
        'PicturePath'
    ];
    public function bedroom():BelongsToMany{
        return $this->belongsToMany(Bedroom::class);
    }
    public function hero():BelongsToMany{
        return $this->belongsToMany(Hero::class);
    }
    public function news():BelongsToMany{
        return $this->belongsToMany(News::class);
    }
}
