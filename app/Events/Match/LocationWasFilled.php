<?php

namespace App\Events\Match;

use App\Location;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LocationWasFilled
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $location;
    public $users;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Location $location)
    {
        $this->location = $location;
        $this->users = $location->usersMatched();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
