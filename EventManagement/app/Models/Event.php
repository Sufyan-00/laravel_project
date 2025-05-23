<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['name', 'description', 'event_date', 'time', 'venue'];
    
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}
