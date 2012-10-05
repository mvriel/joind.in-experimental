<?php
namespace Joindin;

ini_set('display_errors', 'on');

// include dependencies
require '../Vendor/Slim/Slim.php';
require '../Vendor/TwigView.php';

// include controllers
require('../Controller/Application.php');
require('../Controller/Event.php');
require('../View/Filters.php');

// initialize Slim
$app = new \Slim(array(
    'mode' => 'development',
    'view' => new \TwigView()
));

// set Twig base folder, view folder and initialize Joindin filters
\TwigView::$twigDirectory = realpath(__DIR__ . '/../Vendor/Twig/lib/Twig');
$app->view()->setTemplatesDirectory('../View');
\Joindin\View\Filter\initialize($app->view()->getEnvironment());

// register routes
new Controller\Application($app);
new Controller\Event($app);

// execute application
$app->run();