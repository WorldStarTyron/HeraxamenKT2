<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class beurt extends Model
{
    protected $table = 'beurts';

    protected $primaryKey = 'beurt_id';

    protected $fillable = [
        'afspraak_id',
        'beurt_naam',
        'beurt_datum',
        'beurt_tijd',
        'maximaal_aantal_auto',
    ];

    public $timestamps = false;

    public function afspraak(): BelongsTo
    {
        return $this->belongsTo(Afspraken::class, 'afspraak_id', 'afspraak_id');
    }
}
