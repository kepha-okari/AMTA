<?php
include_once('Configs.php');

class DbConnection {

    private $host = Configs::HOST;
    private $username = Configs::USERNAME;
    private $password = Configs::PASSWORD;
    private $database = Configs::DATABASE;
    
    protected $connection;
    
    public function __construct() {

        if (!isset($this->connection)) {
            
            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
            
            if (!$this->connection) {

                echo 'Cannot connect to database server';
                
                exit;
                
            }            
        }    
        
        return $this->connection;
    }
    

    public function sendSMS( $message, $msisdn ) {
        
        $url = 'http://167.172.14.50:4002/v1/send-sms';
    
        $post_data = http_build_query([
            "apiClientID" => Configs::API_CLIENT_ID,
            "key" => Configs::KEY,
            "secret" => Configs::SECRET,
            "txtMessage" => $message,
            "MSISDN" => $msisdn,
            "serviceID" => Configs::SERVICE_ID
        ]);
    
        try {
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_POST, 1);
          curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded '));
          curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          $result = curl_exec($ch);
    
          $result = json_decode($result);
        
          return $result; 
    
        } catch (\Throwable $th) {
          throw $th;
        }
    }
    

    public function serviceSMS( $message, $msisdn, $linkID ) {
        
        $url = 'https://app.bongaplus.co.ke/api/send-sms-v1';
    
        $post_data = http_build_query([
            "apiClientID" => Configs::MO_API_CLIENT_ID,
            "key" => Configs::MO_KEY,
            "secret" => Configs::MO_SECRET,
            "txtMessage" => $message,
            "MSISDN" => $msisdn,
            "serviceID" => Configs::MO_SERVICE_ID,
            "linkID" => $linkID
        ]);
    
        try {
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_POST, 1);
          curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded '));
          curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          $result = curl_exec($ch);
    
          $result = json_decode($result);
        
          return $result; 
    
        } catch (\Throwable $th) {
          throw $th;
        }
    }


    public function getRequest($url) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $result = curl_exec($curl);
        if (!$result) {
            die("Connection Failure");
        }
        curl_close($curl);
        return json_decode($result);
    }


}
?>