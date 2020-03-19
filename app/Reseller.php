<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reseller extends Model
{
    protected $table = "reseller";
    protected $fillable = [
        'nama_reseller', 'no_wa', 'domisili'
    ];
}
