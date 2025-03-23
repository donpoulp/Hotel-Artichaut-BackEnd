<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class Icon extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'icon';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'iconPath',
        'link',
        'footer_id',
        'header_id',
        'bedroomtype_id',
        'strongest_id',
    ];

    public function strongest(): BelongsTo{
        return $this->belongsTo(Strongest::class);
    }
    public function header(): BelongsTo{
        return $this->belongsTo(Header::class);
    }
    public function footer(): BelongsTo{
        return $this->belongsTo(Footer::class);
    }
    public function bedroomtype(): BelongsTo{
        return $this->belongsTo(BedroomType::class);
    }
}

