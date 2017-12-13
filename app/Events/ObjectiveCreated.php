<?php

namespace GetShitDone\Events;

use GetShitDone\Objective;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ObjectiveCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /** @var Objective */
    public $objective;

    /**
     * Create a new event instance.
     *
     * @param Objective $objective
     */
    public function __construct(Objective $objective)
    {
        $this->objective = $objective;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel("users.{$this->objective->user->id}");
    }
}
