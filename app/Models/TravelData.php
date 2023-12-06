<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelData extends Model
{
    protected $fillable = ['username', 'tanggal', 'jam', 'lokasi', 'suhu'];

}
