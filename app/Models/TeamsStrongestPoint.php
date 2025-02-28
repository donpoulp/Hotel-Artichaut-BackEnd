<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class TeamsStrongestPoint extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'teams_strongest_point';

    protected $fillable = [
        'id',
        'teams_id',
        'text',
    ];
    public function teams():belongsTo{
        return $this->belongsTo(Teams::class);
    }
}
