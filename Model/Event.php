<?php
namespace Joindin\Model;

/**
 * @property string $name
 * @property string $start_date
 * @property string $end_date
 * @property string $description
 * @property string $href
 * @property string $attendee_count
 * @property string $icon
 * @property string $latitude
 * @property string $longitude
 * @property string $tz_continent
 * @property string $tz_place
 * @property string $location
 * @property string $comments_enabled
 * @property string $event_comment_count
 * @property string $cfp_start_date
 * @property string $cfp_end_date
 */
class Event
{
    public function load($id)
    {
        $event = current((array)json_decode(
            file_get_contents(
                '../Cache/event.'.$id.'.json'
//                'http://api.joind.in/v2/events/'.$id.'?format=json&verbose=yes'
            ))
        );

        // import properties
        foreach($event as $key => $value) {
            $this->$key = $value;
        }
    }
}
