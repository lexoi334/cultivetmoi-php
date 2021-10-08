<?php

include_once '../DB.php';

class AddPlant {
    private $db;
    private $plant;
    //construct de l'instance de la BDD car à utiliser plusieurs fois possiblement
    public function __construct($plant) {
        $this->db = new DB();
        $this->db->connec();
        $this->plant = $plant;
    }
    
    function addFav ($plant, $decode) {
        if ($this->verifPlant($this->plant['plant'])){
            echo 'false';
        } else {
            $query = "INSERT INTO own (plant_id, user_id) VALUES ('" . $this->plant['plant'] . "', '" . $decode['id'] . "')";
            $stmt = $this->db->pdo->prepare($query);
            $stmt->execute();
            echo 'true'; 
        }
        
    }

    public function verifPlant($plant)
    {
        // $userName = $this->user['user'];    
        $query = "SELECT * FROM own WHERE plant_id = '" . $this->plant['plant'] . "'";
        // var_dump($query);
        $stmt = $this->db->pdo->prepare($query);
        //$stmt->bindParam(':login', $userName);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data = $stmt->fetchAll();
        json_encode($data);
        return $data;
        
    }
}