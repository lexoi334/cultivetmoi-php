<?php

include_once '../DB.php';

class Search {
    private $db;

    //construct de l'instance de la BDD car à utiliser plusieurs fois possiblement
    public function __construct() {
        $this->db = new DB();
        $this->db->connec();
    }

    public function searchPlant() {
      if(isset($_GET['type']) && !empty($_GET['type'])) {
        $whereClause = "AND plant_type=\"".$_GET['type']."\"";
      } else $whereClause = '';
      $query = "SELECT * FROM plants WHERE plant_name LIKE \"" . $_GET['s'] . "%\"".$whereClause;
      $stmt = $this->db->pdo->prepare($query);
      $stmt->execute();
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $data = $stmt->fetchAll();
      //var_dump($data);
      $data = json_encode($data);
      return $data;
    }
}