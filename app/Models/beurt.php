<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class beurt extends Model
{
    protected $table = 'beurten';
    protected $primaryKey = 'beurt_id';
    protected $fillable = [
        'afspraken_id',
        'klant_id',
        'beurt_naam',
        'beurt_datum',
        'beurt_tijd',
        'maximaal_aantal_auto',
    ];

    public $timestamps = false;
    
}
