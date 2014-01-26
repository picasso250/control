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
    }

    if ($id = _post('delete')) {
        $notification = ORM::forTable('notification')->findOne($id);
        if ($notification) {
            $notification->is_delete = 1;
            $notification->save();
            $ret = array('code' => 0);
        } else {
            $ret = array(
                'code' => 1,
                'msg' => "no notification $id",
            );
        }
    }

    if (!isset($ret)) {
        $ret = array(
            'code' => 1,
            'msg' => "delete ? or add text?",
        );
    }
} else {
    $notifications = ORM::forTable('notification')
        ->where('is_delete', 0)
        ->orderByDesc('id')
        ->findArray();
    if ($notifications) {
        $ret = array(
            'code' => 0,
            'data' => $notifications,
        );
    } else {
        $ret = array(
            'code' => 1,
            'msg' => 'no notification'
        );
    }
}

include 'output.php';
