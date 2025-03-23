<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class Strongest extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = "id";
    protected $table = 'strongest';
    public $timestamps = true;

    protected $fillable = [
        'background_color_1',
        'background_opacity_1',
        'background_color_2',
        'background_opacity_2'
    ];
    public function icon():HasMany{
        return $this->hasMany(Icon::class);
    }
}
