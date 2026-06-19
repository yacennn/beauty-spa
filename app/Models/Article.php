<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['titre', 'date_publication', 'auteur', 'description', 'image'];

    protected $casts = ['date_publication' => 'date'];
}
