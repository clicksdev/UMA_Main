<?php

namespace App\Events;

use App\Http\Resources\AuctionResource;
use App\Models\Auction;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Broadcasting\Channel;

class AuctionUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Auction $auction;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Auction $auction)
    {
        $this->auction = $auction;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('auction.' . $this->auction->id);
    }

    public function broadcastWith()
    {
        return (new AuctionResource($this->auction))->resolve();
    }

    /*public function broadcastAs()
    {
        return 'server.created';
    }*/
}
