<?php
  error_reporting(E_ALL | E_WARNING | E_NOTICE);
  ini_set('display_errors', 1);

  class Home {
    public function __construct() {
      //
    }

    public function getStuff(){
      return "Here's your stuff";
    }
  }
