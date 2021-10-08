<?php

include_once '../DB.php';

class DeleteFav {
    private $db;

    public function __construct() {
        $this->db = new DB();
        $this->db->connec();
    }

    public function deletePlant () {
        
        $query = "DELETE FROM own WHERE plant_id = '" . $_GET['id'] . "'";
        // var_dump($query);
        $stmt = $this->db->pdo->prepare($query);
        $stmt->execute();
        echo 'Plante favorie supprimée !';
    }
}