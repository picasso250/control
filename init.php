<?php

$config = require 'config.php';
if (isset($_SERVER['HTTP_APPNAME'])) {
    $config = array_merge(
        $config,
        require 'config.server.php'
    );
}

ORM::configure(
    'mysql:host='.$config['db']['host'].
    ';port='.$config['db']['port'].
    ';dbname='.$config['db']['dbname']);
ORM::configure('username', $config['db']['username']);
ORM::configure('password', $config['db']['password']);
ORM::configure('driver_options', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
