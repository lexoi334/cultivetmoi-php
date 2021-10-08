<?php

    require_once '../getter/GetProfile.php';
    require_once '../post/AddPlant.php';

    $help = new Helper();
    $getProfile = new GetProfile();

    $plant = json_decode(file_get_contents("php://input"), TRUE);
    $add = new AddPlant($plant);


    $bearer = $help->getBearerToken();
    $decode = $help->decodeJwt($bearer);

    $add->addFav($plant, $decode);


