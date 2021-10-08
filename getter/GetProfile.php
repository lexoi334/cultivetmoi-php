<?php

include_once '../DB.php';
include_once '../helper/helper.php';

class GetProfile {

    private $db;

    public function __construct() {
        $this->db = new DB();
        $this->db->connec();
    }

    function decodeToken($bearer, $decodedToken) {
        if( $bearer ) {
            if($decodedToken) {
                $query = "SELECT * FROM users WHERE user_id = " . $decodedToken['id'];
                $stmt = $this->db->pdo->prepare($query);
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $data = $stmt->fetchAll();
                echo json_encode($data);
            } else http_response_code(401);
        } else http_response_code(401);
    }

    

}