<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    public function photos(){
        return $this->belongsTo(Photo::class, "photo_id");
    }
}
