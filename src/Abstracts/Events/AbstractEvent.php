<?php

namespace ApiArchitect\Core\Abstracts\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

/**
 * Class AbstractEvent
 *
 * @package ApiArchitect\Core\Abstracts\Events
 * @author James Kirkby <hello@jameskirkby.com>
 */
class AbstractEvent
{

    use SerializesModels;

    /**
     * Create a new event instance.
     *
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}