<?php

require '../vendor/autoload.php';
use Firebase\JWT\JWT;

class Helper {

  public function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    

    function createJwt ($id, $username, $password, $email) {
        $payload = array('iat' => time(), 'exp' => time() + (60*60), 'id' => $id, 'username' => $username, 'password' => $password, 'email' => $email) ;
        $jwt = JWT::encode($payload, 'L3R0YJ3Nk!n5') ;
        return $jwt ;
      }
    
      function refreshUserJWT ($jwt) {
        $decoded = $this->decodeJwt($jwt) ;
        $payload = array('iat' => time(), 'exp' => time() + (60*60), 'id' => $decoded['id'], 'username' => $decoded['username'], 'password' => $decoded['password'], 'email' => $decoded['email']) ;
        $newJwt = JWT::encode($payload, 'L3R0YJ3Nk!n5') ;
        return $newJwt ;
      }
    
    function decodeJwt ($jwt) {
      $decodedJwt = JWT::decode($jwt, 'L3R0YJ3Nk!n5', array('HS256')) ;
      return (array) $decodedJwt ;
    }

  /**
  * get access token from header
  **/
  function getBearerToken() {
    $headers = $this->getAuthorizationHeader();
    // HEADER: Get the access token from the header
    if (!empty($headers)) {
        if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {
            return $matches[1];
        }
    }
    return null;
  }

  /** 
  * Get header Authorization
  **/
  function getAuthorizationHeader(){
    $headers = null;
    if (isset($_SERVER['Authorization'])) {
        $headers = trim($_SERVER["Authorization"]);
    }
    else if (isset($_SERVER['HTTP_AUTHORIZATION'])) { //Nginx or fast CGI
        $headers = trim($_SERVER["HTTP_AUTHORIZATION"]);
    } elseif (function_exists('apache_request_headers')) {
        $requestHeaders = apache_request_headers();
        // Server-side fix for bug in old Android versions (a nice side-effect of this fix means we don't care about capitalization for Authorization)
        $requestHeaders = array_combine(array_map('ucwords', array_keys($requestHeaders)), array_values($requestHeaders));
        //print_r($requestHeaders);
        if (isset($requestHeaders['Authorization'])) {
            $headers = trim($requestHeaders['Authorization']);
        }
    }
    return $headers;
  }
}