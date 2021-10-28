<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diemdung extends Model
{
    use HasFactory;
    public $table = 'diadiem';
    protected $casts = [
        'cactuyen' => 'array'
   ];
    protected $fillable = ['tendiadiem','lat','lng','cactuyen'];
}
