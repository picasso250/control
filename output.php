<?php

echo json_encode($ret);

if (isset($_REQUEST['__DEBUG__'])) {
    echo "<pre>\n";
    echo "input ";
    print_r($_REQUEST);
    echo "output ";
    print_r($ret);
}
