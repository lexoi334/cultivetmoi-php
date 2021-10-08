<?php

include_once '../DB.php';
include_once '../helper/helper.php';

class GetProfile {

    private $db;
    private $token;

    public function __construct() {
        $this->db = new DB();
        $this->db->connec();
        $this->token = new Helper();
    }

    function checkToken() {
        $this->token->getBearerToken();
    }
    

    

}