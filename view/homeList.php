<?php

    require_once '../getter/GetOwn.php';
    require_once '../helper/helper.php';

    $add = new GetOwn();
    $help = new Helper();


    $bearer = $help->getBearerToken();
    $decode = $help->decodeJwt($bearer);


    $add->getList($decode);
