# php_mvc_starter

If you want to use PHP for a website or API, don't use a HUGE framework for a simple task.  This architecture helps me build super fast websites and APIs - hope it helps you too.

## Background
This is a barebones website template written in plain-vainilla PHP.  It offers the capability of managing routes at the `.htaccess` level and a powerful yet simple Templating engine to keep the business logic well separated from the view layer.

## Project Lifecycle

- User requests the home of the website
- index.php replies redirecting to /home
- /home is picked up by .htaccess and gets redirected to /controlles/home.php
- the controller 
    - grabs any payload, executes it's logic through its data model stored in /models/home.php
    - instantiates the templating engine
    - creates data that gets passed over to the view
- the view
    - the view at /views/home.php extends views/mainlayout.php
    - mainlayout is the entire layout of the page, from **open-html** to **close-html**
    - this file has pre-defined spots where data will get inserted
    - the view at /views/home.php gets the data sent by the controller and starts assembling it as HTML
    - HTML is assigned to "blocks" which are then replaced on the mainlayout template

## Install
1. Clone the repo : `git clone git@github.com:ricardoalcocer/php_mvc_starter.git`
2. Copy project to a web folder on your web server
3. Point your browser to the root of this folder

## Usage
I've tried to comment the code to make it easy to follow.  Let me know if there's something unclear (leave an issue)
This project "https://github.com/ddycai/simple-template-engine", a simple, plain-vainilla PHP Templating engine.  Refer to its readme for more details.

## Maintainers
[Ricardo Alcocer](https://github.com/ricardoalcocer)

## License
MIT - alco.mit-license.org