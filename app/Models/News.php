<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;

class News extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'news';
    public $timestamps = true;

    protected $fillable = [
        'title',
        'description',
        'picture_id'
    ];
    public function picture()
    {
        return $this->belongsTo(Picture::class, 'picture_id');
    }
}
