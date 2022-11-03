<?php

header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . '/db.php';

require_once __DIR__ . '/functions.php';

$uri = $_SERVER['REQUEST_URI'];

$httpVerb = $_SERVER['REQUEST_METHOD'];


if ($httpVerb === 'POST') {
  require_once __DIR__ . '/controllers/post.controller.php';
}


if ($httpVerb === 'GET') {
  require_once __DIR__ . '/controllers/get.controller.php';
}

if ($httpVerb === 'PUT') {
  require_once __DIR__ . '/controllers/put.controller.php';
}


if ($httpVerb === 'DELETE') {
  require_once __DIR__ . '/controllers/delete.controller.php';
}
