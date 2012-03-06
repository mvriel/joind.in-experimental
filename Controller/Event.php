<?php
namespace Joindin\Controller;
require_once 'Base.php';

class Event extends Base
{
    protected function defineRoutes(\Slim $app)
    {
        $app->get('/', array($this, 'hot'));
    }

    public function hot()
    {
        $events = (array)json_decode(
            file_get_contents(
                'http://api.joind.in/v2/events?format=json&filter=hot&resultsperpage=7'
            )
        );

        echo $this->application->render(
            'events/hot.html.twig',
            array('events' => $events)
        );
    }
}