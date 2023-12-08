<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zahtev extends Model
{
    use HasFactory;
    protected $table = 'zahtevi';
    
    protected $fillable = [
        'datumUsluge',
        'user_id',
        'usluga_id',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function usluga()
    {
        return $this->belongsTo(Usluga::class);
    }
}

