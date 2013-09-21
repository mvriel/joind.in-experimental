<?php
namespace Joindin\Controller;
require_once __DIR__ .'/Base.php';
require_once __DIR__ .'/../Model/Collection/Event.php';
require_once __DIR__ .'/../Model/Event.php';

class Event extends Base
{
    protected function defineRoutes(\Slim $app)
    {
        $app->get('/events', array($this, 'index'));
        $app->get('/events/:id', array($this, 'show'));
        $app->get('/events/:id/schedule', array($this, 'schedule'));
        $app->get('/events/:id/comments', array($this, 'comments'));
        $app->get('/events/:id/attendees', array($this, 'attendees'));
        $app->get('/events/submit', array($this, 'create'));
        $app->get('/events/:id/edit', array($this, 'edit'));
        $app->get('/events/:id/delete', array($this, 'delete'));
    }

    public function index()
    {

    }

    public function show($id)
    {
        $event = new \Joindin\Model\Event();
        $event->load($id);

        echo $this->application->render(
            'Event/show.html.twig',
            array('event' => $event)
        );
    }

    public function schedule($id)
    {

    }

    public function comments($id)
    {

    }

    public function attendees($id)
    {

    }

    public function create()
    {

    }

    public function edit($id)
    {

    }

    public function delete($id)
    {

    }

}