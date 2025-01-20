<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;

class News extends Model
{
    use HasFactory, Notifiable, HasUuids;

    protected $table = 'news';
    public $timestamps = true;

    protected $fillable = [
        'title',
        'description',
    ];
    public function picture():BelongsToMany{
        return $this->BelongsToMany(Picture::class);
    }
}
