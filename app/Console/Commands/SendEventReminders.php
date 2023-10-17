<?php

namespace App\Console\Commands;

use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Console\Command;

class SendEventReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-event-reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends notifications to all event attendes that event starts soon';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $events = Event::with('attendees.user')->whereBetween('start_time',[now(),now()->addDay()])
        ->get();

        $eventsCount = $events->count();
        $eventLabel = Str::plural('event', $eventsCount);

        $events->each(fn($event) => $event->attendees->each(
        fn($attendee) => $this->info("Notifying the user {$attendee->user_id}")
        ));
        $this->info("Found {$eventsCount} {$eventLabel}");
        $this->info('Reminder notifications sent successfully');
    }
}
