<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    protected $table = "comptes";

    protected $fillable = ['rib', 'solde', 'client_id'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}