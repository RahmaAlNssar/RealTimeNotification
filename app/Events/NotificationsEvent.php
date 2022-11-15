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
    public $complain;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($complain)
    {
        $this->complain = $complain;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // $user = $this->complain->user_id;
        $user =Admin::first();
        return new Channel('Notification.'.$user->id);
    }

    public function broadcastAs(){
        return 'NotificationEvent';
    }
}
