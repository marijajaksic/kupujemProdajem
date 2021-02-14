<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proizvod extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['naslov', 'url', 'cena', 'korisnik','opis','broj_telefona', 'kategorije_id'];}
