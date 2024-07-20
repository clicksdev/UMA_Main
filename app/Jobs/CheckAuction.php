<?php

namespace App\Jobs;

use App\Models\AuctionBid;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CheckAuction implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $auction;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($auction)
    {
        $this->auction = $auction;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->auction && $this->auction->bids->where('pivot.is_winner', 1)->count() == 0) {
            $users = AuctionBid::where('auction_id', $this->auction->id)->get()->unique('user_id')->pluck('user_id')->toArray();
            foreach (User::whereIn('id', $users)->get() as $user) {
                $user->increment('coins', $this->auction->bids->where('pivot.user_id', $user->id)->count());
            }
        }
    }
}
