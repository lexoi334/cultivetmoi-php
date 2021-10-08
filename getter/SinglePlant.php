<?php

include_once '../DB.php';

class SinglePlant {
    private $db;

    //construct de l'instance de la BDD car à utiliser plusieurs fois possiblement
    public function __construct() {
        $this->db = new DB();
        $this->db->connec();
    }

    public function singlePlant() {
      $query = "SELECT * FROM plants as p INNER JOIN tip_plant as tp USING (plant_id) WHERE p.plant_id = \"" . $_GET['id'] . "\"";
      $stmt = $this->db->pdo->prepare($query);
      $stmt->execute();
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $data = $stmt->fetchAll();
      $data = json_encode($data);
      return $data;
    }
}