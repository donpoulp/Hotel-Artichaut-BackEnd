<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class BedroomType extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'bedroom_type';
    public $timestamps = true;

    protected $fillable = [
        'nameFr',
        'nameEn',
        'descriptionFr',
        'descriptionEn',
        'background_color',
        'background_opacity',
        'price',
    ];
    public function picture():HasMany{
        return $this->hasMany(Picture::class, "bedroomtype_id");
    }
    public function bedroom():HasMany{
        return $this->hasMany(Bedroom::class,"bedroom_type_id");
    }
    public function icon():HasMany{
        return $this->hasMany(Icon::class);
    }
}
