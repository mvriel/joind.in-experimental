<?php
namespace Joindin;

// include dependencies
require '../Vendor/Slim/Slim.php';
require '../Vendor/TwigView.php';

// include controllers
require('../Controller/Event.php');

// initialize Slim
$app = new \Slim(array(
    'mode' => 'development',
    'view' => new \TwigView()
));

// set Twig base folder and view folder
\TwigView::$twigDirectory = realpath(__DIR__ . '/../Vendor/Twig/lib/Twig');
$app->view()->setTemplatesDirectory('../View');

// register routes
new Controller\Event($app);

// execute application
$app->run();