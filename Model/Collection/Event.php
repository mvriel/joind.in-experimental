<?php
namespace Joindin\Model\Collection;

class Event
{
    public function retrieve($filter = 'all', $limit = 10, $page = 1)
    {
        $events = (array)json_decode(
            file_get_contents(
                '../Cache/events.'.$filter.'.json'
//                'http://api.joind.in/v2/events?format=json&filter='.$filter.'&resultsperpage='.$limit.'&page='.$page
            )
        );
        $meta = array_pop($events);

        return $events;
    }
}
