<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Image extends Model
{
    protected $fillable = [
        'filename', 'original'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
