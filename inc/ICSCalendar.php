<?php 
error_reporting(E_ERROR | E_PARSE);
Class ICSCalendar{
    const DT_FORMAT = 'Ymd\THis';
    public $args;

    public function __construct($args){
            $this->args = $args;
    }

    function dateToCal($time, $tz) {
        $dt = new DateTime($time,new DateTimeZone($tz));
        return $dt->format(self::DT_FORMAT);
        
        //return date('Ymd\This', $time) . 'Z';
    }

    function format_timestamp($timestamp,$tz) {
        $dt = new DateTime($timestamp, new DateTimeZone($tz));
        return $dt->format(self::DT_FORMAT);
      }

    function getInvite(){
        // Build the ics file
        $ical = 'BEGIN:VCALENDAR'                                                                                               . PHP_EOL;
        $ical .= 'VERSION:2.0'                                                                                                  . PHP_EOL;
        $ical .= 'PRODID:-//hacksw/handcal//NONSGML v1.0//EN'                                                                   . PHP_EOL;
        $ical .= 'CALSCALE:GREGORIAN'                                                                                           . PHP_EOL;
        $ical .= 'BEGIN:VEVENT'                                                                                                 . PHP_EOL;
        $ical .= 'DTEND;TZID=' .$this->args->timezone . ':' . $this->dateToCal($this->args->end, $this->args->timezone)         . PHP_EOL;
        $ical .= 'UID:' . md5($this->args->title)                                                                               . PHP_EOL;
        $ical .= 'DTSTAMP:' . $this->format_timestamp('now', $this->args->timezone)                                             . PHP_EOL;
        $ical .= 'LOCATION:' . addslashes($this->args->location)                                                                . PHP_EOL;
        $ical .= 'DESCRIPTION:' . addslashes($this->args->details)                                                              . PHP_EOL;
        $ical .= 'URL;VALUE=URI:' . $this->args->url                                                                            . PHP_EOL;
        $ical .= 'SUMMARY:' . addslashes($this->args->subject)                                                                  . PHP_EOL;
        $ical .= 'DTSTART;TZID=' .$this->args->timezone . ':' . $this->dateToCal($this->args->start,$this->args->timezone)      . PHP_EOL;
        $ical .= 'END:VEVENT'                                                                                                   . PHP_EOL;
        $ical .= 'END:VCALENDAR'                                                                                                . PHP_EOL;

        return $ical;
    }

}