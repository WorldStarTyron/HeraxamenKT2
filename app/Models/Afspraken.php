<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Afspraken extends Model
{
    protected $table = 'afsprakens';

    protected $primaryKey = 'afspraak_id';

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

    public function beurten(): HasMany
    {
        return $this->hasMany(beurt::class, 'afspraak_id', 'afspraak_id');
    }
}
