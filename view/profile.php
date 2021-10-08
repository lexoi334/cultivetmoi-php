<?php

    require_once '../getter/GetProfile.php';

    $help = new Helper();
    $getProfile = new GetProfile();

    $bearer = $help->getBearerToken();
    $decodedToken = $help->decodeJwt(($bearer));

    echo $getProfile->decodeToken($bearer, $decodedToken);

    
