<?php 

    require_once '../helper/helper.php';
    require_once '../post/UpdateUser.php';


    $help = new Helper();
    $update = new UpdateUser();


    // $getProfile = new GetProfile();


    $bearer = $help->getBearerToken();
    var_dump($bearer);
    $decode = $help->decodeJwt($bearer);

    $update->updateLastname($decode);