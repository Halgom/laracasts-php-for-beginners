<?php

use Core\App;
use Core\Container;
use Core\Database;

$container = new Container();

$container->bind('Core\Database', function() {
  $config = require base_path('config.php');
  $databaseConfig = $config['database']['config'];
  $databaseUsername = $config['database']['username'];
  $databasePassword = $config['database']['password'];

  return new Database($databaseConfig, $databaseUsername, $databasePassword);
});

App::setContainer($container);
