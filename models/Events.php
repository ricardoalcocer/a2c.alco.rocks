<?php
  error_reporting(E_ALL | E_WARNING | E_NOTICE);
  ini_set('display_errors', 1);

  class Events {
    public function __construct() {
      //
    }

    public function save($args){
      $db         = new SQLite3('../db/callinks.db');
      $stm        = $db->prepare("INSERT INTO links(subject,start,end,timezone,details,location,url,hash,timestamp) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
      $stm->bindParam(1, $args->subject);
      $stm->bindParam(2, $args->start);
      $stm->bindParam(3, $args->end);
      $stm->bindParam(4, $args->timezone);
      $stm->bindParam(5, $args->details);
      $stm->bindParam(6, $args->location);
      $stm->bindParam(7, $args->url);
      $stm->bindParam(8, $args->hash);
      $stm->bindParam(9, $args->timestamp);

      $stm->execute();
      $db->close();
      
      return "Add to Calendar Buttons";
    }
  }
