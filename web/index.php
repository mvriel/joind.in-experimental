<?php
require '../vendor/Slim/Slim.php';
require '../vendor/TwigView.php';

TwigView::$twigDirectory = realpath(__DIR__.'/../vendor/Twig/lib/Twig');

$app = new Slim(array(
    'mode' => 'development',
    'view' => new TwigView()
));

$app->view()->setTemplatesDirectory('../templates');
$app->get('/', function () use ($app) {
    echo $app->render('events/hot.twig.html');
});

$app->run();