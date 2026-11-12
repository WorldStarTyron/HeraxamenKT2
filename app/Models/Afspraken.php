<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;

class Afspraken extends Model
{
    protected $table = 'afsprakens';
    protected $primaryKey = 'afspraken_id';
    protected $fillable = [
        'klant_id',
        'Afspraak_title',
        'Afspraak_datum',
        'Afspraak_omschrijving',
    ];

    public $timestamps = false;



     public function klanten(): BelongsTo
    {
        return $this->belongsTo(klanten::class, 'klant_id', 'klant_id');
    }

        public function beurt(): BelongsTo
    {
        return $this->belongsTo(beurt::class, 'afspraken_id', 'afspraken_id');
    }
}