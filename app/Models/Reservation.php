<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_internaute',
        'id_hotel',
        'date_debut_sejour',
        'date_fin_sejour',
        'titre'
    ];

    public function internaute()
    {
        return $this->belongsTo(Internaute::class, 'id_internaute');
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'id_hotel');
    }
}
