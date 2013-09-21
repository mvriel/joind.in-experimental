<?php
namespace Joindin\Controller;

require_once __DIR__ .'/Base.php';
require_once __DIR__ .'/../Model/Collection/Event.php';

class Application extends Base
{
    protected function defineRoutes(\Slim $app)
    {
        $app->get('/', array($this, 'index'));
        $app->get('/oauth/callback', array($this, 'oauth_callback'));
    }

    public function index()
    {
        $event_collection = new \Joindin\Model\Collection\Event();
        $hot_events      = $event_collection->retrieve('hot', 5);
        $upcoming_events = $event_collection->retrieve('upcoming', 5);

        echo $this->application->render(
            'Application/index.html.twig',
            array(
                'hot_events'      => $hot_events,
                'upcoming_events' => $upcoming_events
            )
        );
    }

    public function oauth_callback()
    {
        $_SESSION['access_token'] = $this->application->request()->params('access_token');
        $this->application->redirect('/');
    }
}
