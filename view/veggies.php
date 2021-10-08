<?php

require_once '../getter/GetPlants.php';

$getAllVeggies = new GetPlants();

var_dump($getAllVeggies->getAllVeggies());

?>