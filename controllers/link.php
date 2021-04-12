<?php
    error_reporting(E_ALL | E_WARNING | E_NOTICE);
    ini_set('display_errors', 1);
    
    require_once '../ste/loader.php';
    $env    = new SimpleTemplateEngine\Environment('../views', '.php');
    
    require_once '../models/Links.php';
    $Links = new Links();
    
    $pageTitle = "Your buttons are ready";
    
    $hash = $_GET["h"];
    $type = $_GET["t"];

    $db         = new SQLite3('../db/callinks.db');
    $res        = $db->query("SELECT * FROM links where hash = '{$hash}'");
    $row        = $res->fetchArray();
    $db->close();

    if (!$row){
        //Header('Location: /error');
        print_r('error');
        exit();
    }
    
    // comes from db
    $args = (object)[
        "subject"   => $row["subject"],
        "start"     => $row["start"],
        "end"       => $row["end"],
        "duration"  => null, // this should be calculated by the difference between the two above
        "timezone"  => $row["timezone"],
        "details"   => $row["details"],
        "location"  => $row["location"],
        "url"       => $row["url"]
    ];

    if (strtoupper($type) == 'G'){
        include('../inc/GCalendar.php');

        $oLink = new GCalendar();
        $oLink->setSubject($args->subject);
        $oLink->setStart($args->start);
        $oLink->setEnd($args->end);
        $oLink->setTimezone($args->timezone);
        $oLink->setDetails($args->details);
        $oLink->setLocation($args->location);

        $link = $oLink->getHREF(). PHP_EOL;
        Header('Location: ' . $link);
    }else{
        include('../inc/ICSCalendar.php');
        $icsCalendar = new ICSCalendar($args);
        $ics = $icsCalendar->getInvite();
        Header('Content-type: text/calendar; charset=utf-8');
        Header('Content-Disposition: inline; filename=calendar.ics');
        echo $ics;
    }
