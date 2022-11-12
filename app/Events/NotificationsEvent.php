<?php

namespace App\Events;

use App\Models\Admin;
use App\Models\Complain;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NotificationsEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $NotificationsEvent;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($NotificationsEvent)
    {
        $this->NotificationsEvent = $NotificationsEvent;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        $user = $this->NotificationsEvent->user_id;
        return new PrivateChannel('Notification.'.$user);
    }

    public function broadcastAs(){
        return 'NotificationEvent';
    }
}
