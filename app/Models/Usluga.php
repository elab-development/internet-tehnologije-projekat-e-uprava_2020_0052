<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usluga extends Model
{
    use HasFactory;
    protected $table = 'usluge';
    
    protected $fillable = [
        'nazivUsluge',
        'opisUsluge',
        'kategorija_id',
        'cenaUsluge'
    ];
    
    public function kategorija()
    {
        return $this->belongsTo(Kategorija::class);
    }
}
