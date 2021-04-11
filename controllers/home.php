<?php
    /*
        The job of the controller is to 
        - gather contextual data (query string, sessions)
        - use that data to call up a Model which contains the logic that generates the data required for the view
        - put said data in a neat package and send it to the view for rendering
    */
    error_reporting(E_ALL | E_WARNING | E_NOTICE);
    ini_set('display_errors', 1);
    //

    // template engine
    require_once '../ste/loader.php';
    $env    = new SimpleTemplateEngine\Environment('../views', '.php');
    //

    // database access
    require_once '../config/Database.php';
    $db = new Database();
    //

    // page model
    require_once '../models/Home.php';
    $Home = new Home();
    //

    $pageTitle = $Home->getStuff();
    $ctamessage = "This is the Call to Action!";


    // setup view to render
    $viewName = 'home';

    // render view (passing arguments)
    die($env->render($viewName,['title'=>$pageTitle,'ctamessage'=>$ctamessage]));
