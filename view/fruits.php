<?php

require_once '../getter/GetPlants.php';

$getAllFruits = new GetPlants();

var_dump($getAllFruits->getAllFruits());

?>