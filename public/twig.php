<?php

require_once '../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('../TwigTemplates'); //шаблоны Twig
$twig = new \Twig\Environment($loader);

echo $twig->render('index.twig', ['name' => 'Админ']);