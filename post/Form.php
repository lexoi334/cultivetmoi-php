<?php

include_once '../DB.php';
include_once '../helper/helper.php';

class Form {
    private $db;
    private $user;
    private $helper;
    //construct de l'instance de la BDD car à utiliser plusieurs fois possiblement
    public function __construct($user) {
        $this->db = new DB();
        $this->db->connec();
        $this->user = $user;
        $this->helper = new Helper();
    }
    
    public function inscription() {
        if($this->verifLog($this->user['user'])){
            echo 'pseudo déjà utilisé !';
        } else {
            $userName = $this->helper->test_input($this->user['user']);
            $mdp = $this->hashPass($this->helper->test_input($this->user['mdp']));
            $mail = $this->helper->test_input($this->user['mail']);
            $sql = "INSERT INTO users (user_pseudo, user_password, user_email) VALUES ('$userName', '$mdp', '$mail')";
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->execute();
            echo 'Enregistrement réussi !';
        }
            
    }


    public function hashPass($mdp)
    {
        $hash = password_hash($mdp, PASSWORD_DEFAULT);
        return $hash;
    }

    public function verifLog($userName)
    {
        // $userName = $this->user['user'];    
        $query = "SELECT user_pseudo FROM users WHERE user_pseudo = '$userName'";
        //var_dump($this->user['user']);
        $stmt = $this->db->pdo->prepare($query);
        //$stmt->bindParam(':login', $userName);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data = $stmt->fetchAll();
        json_encode($data);
        return $data;
        
    }

}