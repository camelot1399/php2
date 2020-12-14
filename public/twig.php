<?php

require_once '../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('../TwigTemplates');
$twig = new \Twig\Environment($loader, array(
    'debug' => true,
));
echo $twig->render('index.twig', ['name' => 'Админ']);