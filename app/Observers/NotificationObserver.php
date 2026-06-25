<?php

namespace App\Observers;

use App\Models\Notification;
use App\Notifications\GenericWebPush;

class NotificationObserver
{
    public function created(Notification $notification)
    {
        $user = $notification->user;
        
        if ($user) {
            $user->notify(new GenericWebPush(
                'Tech Planet Update',
                $notification->message
            ));
        }
    }
}
