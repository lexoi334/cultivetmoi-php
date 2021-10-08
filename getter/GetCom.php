<?php

include_once '../DB.php';


class GetCom {
    private $db;

    //construct de l'instance de la BDD car à utiliser plusieurs fois possiblement
    public function __construct() {
        $this->db = new DB();
        $this->db->connec();
    }
    
    public function getAllComm() {
        $idPlant = $_GET['id'];
        $query = "SELECT * FROM post_plant WHERE plant_id = '$idPlant'";
        // var_dump($query);
        $stmt = $this->db->pdo->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data = $stmt->fetchAll();
        echo json_encode($data);
    }

}