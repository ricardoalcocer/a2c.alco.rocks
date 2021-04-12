<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $inData = file_get_contents('php://input');
    $qs = array();
    parse_str($inData, $qs);

    $hash       = uniqid();
    $timestamp  = new DateTime();
    $timestamp  = $timestamp->format('Y-m-d H:i:s');
    if (empty($url)) {
        $url = "";
    }
    $payload = (object)[
        "subject"   => $qs["subject"],
        "start"     => $qs["start"],
        "end"       => $qs["end"],
        "timezone"  => $qs["timezone"],
        "details"   => $qs["details"],
        "location"  => $qs["location"],
        "url"       => $qs["url"],
        "hash"      => $hash,
        "timestamp" => $timestamp
    ];
    
    $baseURL    = "https://" . $_SERVER["HTTP_HOST"];
    
    // template engine
    require_once '../ste/loader.php';
    $env    = new SimpleTemplateEngine\Environment('../views', '.php');
    //

    // page model
    require_once '../models/Events.php';
    $Events = new Events();
    //

    $res = $Events->save($payload);

    Header("Location: ./confirm/{$hash}")
    
    // $gURL = $baseURL . "/link/{$hash}/g";
    // $iURL = $baseURL . "/link/{$hash}/i";
?>
<!-- <h1>Your links</h1>
<ul>
    <li>Google Calendar: <a href="<?php echo $gURL ?>"><?php echo $gURL ?></a></li>
    <li>Apple Calendar: <a href="<?php echo $iURL ?>"><?php echo $iURL ?></a></li>
</ul>
     -->