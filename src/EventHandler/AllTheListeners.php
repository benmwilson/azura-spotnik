<?php

declare(strict_types=1);

namespace Plugin\Spotnik\EventHandler;

use App\Event;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class AllTheListeners implements EventSubscriberInterface
{
    /**
     * Returns an array of event names this subscriber wants to listen to.
     *
     * @return array The event names to listen to
     */
    public static function getSubscribedEvents()
    {
        return [
            // For now, we'll keep this empty to avoid any issues
            // We can add events back later once the basic plugin is working
        ];
    }

    /**
     * Example method that can be called when we add events back
     */
    public function onExampleEvent($event)
    {
        // This is a placeholder for future event handling
        // We can add spotDL integration here later
    }
}
