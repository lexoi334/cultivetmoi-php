<?php

include_once '../DB.php';


class GetOwn {
    private $db;

    //construct de l'instance de la BDD car à utiliser plusieurs fois possiblement
    public function __construct() {
        $this->db = new DB();
        $this->db->connec();
    }

    public function getList($decode) {
        $query = "SELECT * FROM plants as p LEFT JOIN own as o ON o.plant_id = p.plant_id WHERE user_id = " . $decode['id'];
        $stmt = $this->db->pdo->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data = $stmt->fetchAll();
        $data = json_encode($data);
        echo $data;
    }

}