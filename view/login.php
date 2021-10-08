<?php

require_once '../getter/LogForm.php';

$data = json_decode(file_get_contents("php://input"), TRUE);
$userLog = $data['data'];

$formLogin = new LogForm($userLog);

$formLogin->hashVerif();

?>