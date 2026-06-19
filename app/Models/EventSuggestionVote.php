<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventSuggestionVote extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'event_suggestion_id',
        'vote',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function eventSuggestion()
    {
        return $this->belongsTo(EventSuggestion::class);
    }
}
