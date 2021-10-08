<?php

require_once '../post/Form.php';

$data = json_decode(file_get_contents("php://input"), TRUE);
$user = $data['data'];

$formInscription = new Form($user);

$formInscription->inscription();

?>