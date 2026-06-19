<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventSuggestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'title',
        'description',
        'suggested_date',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function votes()
    {
        return $this->hasMany(EventSuggestionVote::class);
    }

    public function supportVotesCount()
    {
        return $this->votes()->where('vote', 'support')->count();
    }

    public function neutralVotesCount()
    {
        return $this->votes()->where('vote', 'neutral')->count();
    }

    public function rejectVotesCount()
    {
        return $this->votes()->where('vote', 'reject')->count();
    }

    public function userVote($userId)
    {
        $voteRecord = $this->votes()->where('user_id', $userId)->first();
        return $voteRecord ? $voteRecord->vote : null;
    }
}
