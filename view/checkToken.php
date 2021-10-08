<?php

require_once '../helper/helper.php';
require_once '../DB.php';

$db = new DB();
$help = new Helper();

$db->connec();
$token = $help->getBearerToken();

try {
    echo json_encode($help->decodeJwt($token));
} catch(Exception $e) {
    echo json_encode(array('expired' => $e->getMessage()));
}