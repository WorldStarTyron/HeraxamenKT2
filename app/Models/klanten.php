<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class klanten extends Authenticatable
{
    protected $table = 'klantens';
    protected $fillable = [
        'klant_naam',
        'klant_email',
        'klant_telefoon',
        'klant_password',
        'klant_role',
    ];
    protected $primaryKey = 'klant_id';
    protected $hidden = [
        'klant_password',
    ];
     public static $klantRoles = [
        'Admin', 
        'Klant'     
    ];

    public $timestamps = false;

      public function getAuthPassword(): string
    {
        return $this->klant_password;
    }

        public function Afspraken(): HasMany
    {
        return $this->hasMany(Afspraken::class, 'klant_id', 'klant_id');
    }
}
