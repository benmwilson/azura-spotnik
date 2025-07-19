<?php

declare(strict_types=1);

use App\CallableEventDispatcherInterface;
use App\Event;

return static function (CallableEventDispatcherInterface $dispatcher) {
    $dispatcher->addListener(
        Event\BuildConsoleCommands::class,
        function (Event\BuildConsoleCommands $event) use ($dispatcher) {
            $event->addAliases([
                'spotnik:list-stations' => Plugin\Spotnik\Command\ListStations::class,
            ]);
        }
    );

    // Tell the view handler to look for templates in this directory too
    $dispatcher->addListener(Event\BuildView::class, function(Event\BuildView $event) {
        $event->getView()->addFolder('spotnik', __DIR__.'/templates');
    });

    // Add routes handled exclusively by the plugin.
    $dispatcher->addListener(Event\BuildRoutes::class, function(Event\BuildRoutes $event) {
        $app = $event->getApp();

        $app->get('/spotnik', \Plugin\Spotnik\Controller\HelloWorld::class)
            ->setName('spotnik-plugin:index:index')
            ->add(\App\Middleware\EnableView::class);

        $app->get('/spotnik/spotdl', \Plugin\Spotnik\Controller\SpotDLController::class)
            ->setName('spotnik-plugin:spotdl:dashboard')
            ->add(\App\Middleware\EnableView::class);
    });

    // Add the event subscriber back now that we've simplified it
    $dispatcher->addSubscriber(new \Plugin\Spotnik\EventHandler\AllTheListeners);
};
