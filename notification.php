<?php

error_reporting(E_ALL);

require 'vendor/autoload.php';
require 'lib.php';
require 'init.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($text = _post('text')) {
        $notification = ORM::forTable('notification')->create();
        $notification->notification_text = $text;
        $notification->setExpr('create_time', 'now()');
        $notification->save();
        $ret = array(
            'code' => '0',
            'data' => $notification->asArray()
        );
    } else {
        $ret = array(
            'code' => 1,
            'msg' => 'no text',
        );
    }
} else {
    $notification = ORM::forTable('notification')->orderByDesc('id')->findOne();
    if ($notification) {
        $ret = array(
            'code' => 0,
            'data' => $notification->asArray(),
        );
    } else {
        $ret = array(
            'code' => 1,
            'msg' => 'no notification'
        );
    }
}

include 'output.php';
