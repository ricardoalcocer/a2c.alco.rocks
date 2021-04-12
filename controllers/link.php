<?php
    error_reporting(E_ALL | E_WARNING | E_NOTICE);
    ini_set('display_errors', 1);
    
    require_once '../ste/loader.php';
    $env    = new SimpleTemplateEngine\Environment('../views', '.php');
    
    require_once '../models/Links.php';
    $Links = new Links();
    
    $pageTitle = "Your buttons are ready";
    
    $viewName = 'confirm';

    $hash = $_GET["id"];

    die($env->render($viewName,['title'=>$pageTitle, 'hash'=>$hash]));
