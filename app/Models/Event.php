<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;


    protected $fillable = ['name', 'capacity'];

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}
