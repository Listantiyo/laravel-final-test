<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardList extends Model
{
    use HasFactory;

    protected $table='card_lists';

    protected $guarded='';

        public function typecard()
        {
            return $this->belongsTo(TypeCard::class,'id_type');
        }
}


