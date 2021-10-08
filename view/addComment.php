<?php

    require_once '../getter/GetProfile.php';
    require_once '../post/Comment.php';

    $help = new Helper();
    $getProfile = new GetProfile();

    $com = json_decode(file_get_contents("php://input"), TRUE);
    $add = new Comment($com);


    $bearer = $help->getBearerToken();
    $decode = $help->decodeJwt($bearer);
    

    $add->addComment($com, $decode);


