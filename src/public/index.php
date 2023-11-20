<?php

require_once __DIR__ . '/../App/Router.php';
require_once __DIR__ . '/../App/View.php';
require_once __DIR__ . '/../Controllers/Home.php';

Router::get('/', HomeController::class, 'index');