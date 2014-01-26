<?php

error_reporting(E_ALL);

require 'vendor/autoload.php';
require 'lib.php';
require 'init.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($name = _post('name')) {
        $action = ORM::forTable('action')->create();
        $action->name = $name;
        $action->setExpr('create_time', 'now()');
        $action->save();
        $ret = array(
            'code' => '0',
            'data' => $action->asArray()
        );
    }
} else {
    $action = ORM::forTable('action')->orderByDesc('id')->findOne();
    if ($action) {
        $ret = array(
            'code' => 0,
            'data' => $action->asArray(),
        );
    } else {
        $ret = array(
            'code' => 1,
            'msg' => 'no action'
        );
    }
}

include 'output.php';
