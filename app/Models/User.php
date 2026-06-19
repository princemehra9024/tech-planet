<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password', 'role', 'semester', 'branch', 'course', 'bio', 'xp', 'last_login_at'];

    protected $casts = [
        'last_login_at' => 'datetime',
    ];

    public function posts() { return $this->hasMany(Post::class); }
    public function comments() { return $this->hasMany(Comment::class); }
    public function likes() { return $this->hasMany(Like::class); }
    public function eventRegistrations() { return $this->hasMany(EventRegistration::class); }
    public function quizAttempts() { return $this->hasMany(QuizAttempt::class); }
    public function userNotifications() { return $this->hasMany(Notification::class); }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function canManagePosts(): bool
    {
        return in_array($this->role, ['admin', 'president', 'secretary', 'treasurer', 'media_manager']);
    }

    public function canSeeAdminDetails(): bool
    {
        return in_array($this->role, ['admin', 'president', 'secretary', 'treasurer']);
    }

    public function addXp($amount, $reason = null) {
        $this->increment('xp', $amount);
        if ($reason) {
            // optional: log xp event
        }
    }

    public function portfolioSlug(): string
    {
        return \Illuminate\Support\Str::slug($this->name) . '-' . $this->id;
    }
}