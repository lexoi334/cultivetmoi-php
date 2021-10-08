<?php

include_once '../DB.php';


class GetPlants {
    private $db;

    //construct de l'instance de la BDD car à utiliser plusieurs fois possiblement
    public function __construct() {
        $this->db = new DB();
        $this->db->connec();
    }

    public function getAllPlants() {
        $query = 'SELECT * FROM plants';
        $stmt = $this->db->pdo->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data = $stmt->fetchAll();
        $data = json_encode($data);
        return $data;
    }

    public function getAllVeggies() {
        $query = 'SELECT * FROM plants WHERE plant_type = "Legume"';
        $stmt = $this->db->pdo->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data = $stmt->fetchAll();
        $data = json_encode($data);
        return $data;
    }

    public function getAllFruits() {
        $query = 'SELECT * FROM plants WHERE plant_type = "Fruit"';
        $stmt = $this->db->pdo->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data = $stmt->fetchAll();
        $data = json_encode($data);
        return $data;
    }

    public function getAllHerbs() {
        $query = 'SELECT * FROM plants WHERE plant_type = "Aromate"';
        $stmt = $this->db->pdo->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data = $stmt->fetchAll();
        $data = json_encode($data);
        return $data;
    }

}

