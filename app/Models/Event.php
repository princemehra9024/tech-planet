<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model {
    protected $fillable = ['title', 'description', 'date', 'location', 'max_participants'];
    protected $casts = ['date' => 'datetime'];
    public function registrations() { return $this->hasMany(EventRegistration::class); }
}