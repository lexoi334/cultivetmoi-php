<?php 

include_once '../DB.php';
include_once '../helper/helper.php';

class LogForm {

    private $db;
    private $jwtHelper;
    private $userLog;
    
    //construct de l'instance de la BDD car à utiliser plusieurs fois possiblement
    public function __construct($userLog) {
        $this->jwtHelper = new Helper();
        $this->db = new DB();
        $this->db->connec();
        $this->userLog = $userLog;
    }

    public function hashVerif()
    {
        /**
         * 1. Recoit un MDP
         * 2. Vérifie si le MDP du user === MDP dans la BDD
         * si OK > CONNECTÉ sinon, pas connecté redirection login.php
         */

        $db = new DB();
        $db->connec();
        $userPass = $this->userLog['mdp'];
        $userLogin = $this->userLog['user'];
        $sql = "SELECT * FROM users WHERE user_pseudo = '$userLogin'";
        $stmt = $db->pdo->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data = $stmt->fetch();
        $isCorrect = password_verify($userPass, $data['user_password']);
        if (!$isCorrect) {
            $result = null;
        } else {
            if ($isCorrect) {
                $result = $this->jwtHelper->createJwt($data['user_id'], $data['user_pseudo'], $data['user_password'], $data['user_email']);
                // var_dump($this->jwtHelper->createJwt($data['user_id'], $data['user_pseudo'], $data['user_password'], $data['user_email']));
                //to do : remplacer le booleen par un jwt que l'user garde sur sa marchine aves page auth
                // passer une var en store qui laisse aller sur les pages protégées
            }
        }
        $result = json_encode(array("response"=>$result));
        echo $result;
    }
}