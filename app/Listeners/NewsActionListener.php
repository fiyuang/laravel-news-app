<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Models\NewsLog;

class NewsActionListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $news = $event->news;
        $action = $event->action;
        $userId = $event->userId;

        Log::info("News {$action}: ID {$news->id} - Title: {$news->title}");

        NewsLog::create([
            'uuid' => Str::uuid()->toString(),
            'user_id' => $userId,
            'news_id' => $news->id,
            'action' => $action,
            'title' => $news->title,
        ]);
    }
}
