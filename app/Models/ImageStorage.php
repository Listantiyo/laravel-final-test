<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageStorage extends Model
{
    use HasFactory;

    protected $table = 'images';
    protected $fillable = [
        'card_id',
        'url',
    ];

    public function image() {//user yang menginput data image
        return $this->belongsTo('CardList::class', 'card_id');
    }

}
