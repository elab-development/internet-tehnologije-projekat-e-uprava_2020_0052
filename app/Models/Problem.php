<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    use HasFactory;
    const STATUS_NOVO = "NOVO";
    const STATUS_PRIHVACENO = "PRIHVACENO";
    const STATUS_ZAVRSENO = "ZAVRSENO";

    protected $table = 'problemi';

    protected $fillable = [
        'nazivProblema',
        'opisProblema',
        'user_id',
        'datumPrijave',
        'status'
    ];
}
