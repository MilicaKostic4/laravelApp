<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Knjiga extends Model
{
    use HasFactory;

    protected $fillable = [
        'nazivKnjige',
        'godinaIzdanja',
        'brojStrana',
        'opis'
    ];

    public function autor(){
        return $this->belongsTo(Autor::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function zanr(){
        return $this->belongsTo(Zanr::class);
    }
    
}
