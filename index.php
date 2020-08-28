<?php

$dir_root = $_SERVER['DOCUMENT_ROOT'];

include ($dir_root . '/app/App.php');

$app = new App();

$app->run();