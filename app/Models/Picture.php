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
        'about_section_id',
        'about_description_id',
        'teams_id'

    ];

    public function bedroomType(): BelongsTo{
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
    public function about_section():BelongsTo{
        return $this->belongsTo(AboutSection::class);
    }
    public function about_description():BelongsTo{
        return $this->belongsTo(AboutSection::class);
    }
    public function teams():BelongsTo{
        return $this->belongsTo(Teams::class);
    }

}


