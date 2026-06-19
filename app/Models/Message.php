<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['prenom', 'nom', 'telephone', 'email', 'service', 'sujet', 'message'];
}
