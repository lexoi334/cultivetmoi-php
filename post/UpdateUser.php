<?php

include_once '../DB.php';

class UpdateUser {
    private $db;
    //construct de l'instance de la BDD car à utiliser plusieurs fois possiblement
    public function __construct() {
        $this->db = new DB();
        $this->db->connec();
    }
    
    function updateLastname ($decode) {
            $query = "UPDATE users SET user_lastname = '" . $_GET['lastname'] . "' WHERE user_id = '" . $decode['id'] . "'";
            var_dump($query);
            $stmt = $this->db->pdo->prepare($query);
            $stmt->execute();
            echo 'true';
    }

    function updatefirstname ($decode) {
        $query = "UPDATE users SET user_firstname = '" . $_GET['firstname'] . "' WHERE user_id = '" . $decode['id'] . "'";
        var_dump($query);
        $stmt = $this->db->pdo->prepare($query);
        $stmt->execute();
        echo 'true';
    }

    function updateEmail ($decode) {
        $query = "UPDATE users SET user_email = '" . $_GET['email'] . "' WHERE user_id = '" . $decode['id'] . "'";
        var_dump($query);
        $stmt = $this->db->pdo->prepare($query);
        $stmt->execute();
        echo 'true';
    }
        
}