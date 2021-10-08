<?php

include_once '../DB.php';
include_once '../helper/helper.php';

class Comment {
    private $db;
    private $com;
    private $helper;

    //construct de l'instance de la BDD car à utiliser plusieurs fois possiblement
    public function __construct($com) {
        $this->db = new DB();
        $this->db->connec();
        $this->com = $com;
        $this->helper = new Helper();
    }

    public function addComment($com, $decode) {
        $comContent = $this->helper->test_input($this->com['com']);
        $idPlant = $this->com['id'];
        // var_dump($comContent);
        $sql = "INSERT INTO post_plant (content, plant_id, user_id) VALUES ('$comContent', '$idPlant', '" . $decode['id'] . "')";
        // var_dump($sql);
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->execute();
        echo 'Enregistrement réussi !';
    }

    // public function getAllComm() {
    //     $idPlantComm = $this->data['id'];
    //     var_dump($idPlantComm);
    //     $query = "SELECT * FROM post_plant WHERE plant_id = '$idPlantComm'";
    //     $stmt = $this->db->pdo->prepare($query);
    //     $stmt->execute();
    //     $stmt->setFetchMode(PDO::FETCH_ASSOC);
    //     $data = $stmt->fetchAll();
    //     echo json_encode($data);
    // }

}