<?php
namespace Joindin\Controller;
require_once 'Base.php';
require_once '../Model/Collection/Event.php';

class Event extends Base
{
    protected function defineRoutes(\Slim $app)
    {
        $app->get('/', array($this, 'hot'));
    }

    public function hot()
    {
        $event_collection = new \Joindin\Model\Collection\Event();
        $hot_events      = $event_collection->retrieve('hot', 5);
        $upcoming_events = $event_collection->retrieve('upcoming', 5);
        $this->prepareEventData($hot_events);
        $this->prepareEventData($upcoming_events);

        echo $this->application->render(
            'events/hot.html.twig',
            array(
                'hot_events'      => $hot_events,
                'upcoming_events' => $upcoming_events
            )
        );
    }

    /**
     * Converts the start and end date of events to a human readable format.
     *
     * @param array $events
     *
     * @return void
     */
    protected function prepareEventData(array $events)
    {
        array_walk($events, function(&$v) {
            if (!$v->icon) {
                $v->icon = '/img/logos/none.gif';
            } else {
                $v->icon = 'http://joind.in/inc/img/event_icons/'.$v->icon;
            }

            $v->start_date = date('D M dS Y', strtotime($v->start_date));
            $v->end_date = date('D M dS Y', strtotime($v->end_date));
        });
    }
}