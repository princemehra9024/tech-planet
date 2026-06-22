<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use NotificationChannels\WebPush\WebPushMessage;
use NotificationChannels\WebPush\WebPushChannel;

class GenericWebPush extends Notification
{
    use Queueable;

    public $title;
    public $message;
    public $actionUrl;

    public function __construct($title, $message, $actionUrl = null)
    {
        $this->title = $title;
        $this->message = $message;
        $this->actionUrl = $actionUrl ?? url('/student/notifications');
    }

    public function via($notifiable)
    {
        return [WebPushChannel::class];
    }

    public function toWebPush($notifiable, $notification)
    {
        return (new WebPushMessage)
            ->title($this->title)
            ->icon(url('/images/logo.png')) // Fallback if logo doesn't exist
            ->body($this->message)
            ->action('View', $this->actionUrl)
            ->options(['TTL' => 1000]);
    }
}
