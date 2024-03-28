<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'date', 'phone', 'guests', 'time', 'description', 'accept'];
}
