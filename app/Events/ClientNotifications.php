<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ClientNotifications implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $title; 
    public $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    public function __construct($title, $message)
    {
        $this->title = $title;
        $this->message = $message;
    }
    

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    /* public function broadcastOn()
    {
    return ['my-channel'];
    } */

    public function broadcastOn()
    {
        return new Channel('notifications');
    }

    public function broadcastAs()
    {
        return new Channel('send');
    }

}