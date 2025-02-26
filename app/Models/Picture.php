<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class Picture extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'pictures';

    protected $fillable = [

        'id',
        'PicturePath',
        'hero_id',
        'bedroom_id',
        'bedroomtype_id',
        'news_id',
        'services_id',
        'about_id',

    ];

    public function bedroomtype(): BelongsTo{
        return $this->belongsTo(BedroomType::class);
    }
    public function hero():BelongsTo{
        return $this->belongsTo(Hero::class);
    }
    public function news():BelongsTo{
        return $this->belongsTo(News::class);
    }
    public function services():BelongsTo{
        return $this->belongsTo(Services::class);
    }
    public function bedroom():BelongsTo{
        return $this->belongsTo(Bedroom::class);
    }
    public function about():BelongsTo{
        return $this->belongsTo(About::class);
    }

}


