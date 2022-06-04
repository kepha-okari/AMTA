<?php
// include_once('classes/DbConnection.php');
include_once('DbConnection.php');
 
class VoteHandler extends DbConnection{

    public function __construct(){

        parent::__construct();
    }

    public function castVote($msisdn, $shortcode, $candidate_id){
        try {

            $sql = "INSERT INTO votes (msisdn, shortcode, candidate_id) VALUE('$msisdn', '$shortcode', '$candidate_id')";
            $query = $this->connection->query($sql);

            $this->upvoteCandidate($candidate_id, $msisdn);
            
        } catch (\Exception $e) {
            throw $e;
        }
    }


    public function upvoteCandidate($candidate_id, $msisdn){
        try {

            $sql = "UPDATE candidates SET  votes=votes+1 WHERE id ='$candidate_id'";
            $query = $this->connection->query($sql);

            $vote = $this->sendAppreciation($candidate_id);
            
            $msg = 'Your vote for '.ucfirst($vote[0]['name']).' in the '.ucfirst($vote[0]['category']).' category has been cast. Thank you for taking part.';
            self::sendSMS($msg, $msisdn);
        } catch (\Exception $e) {
            throw $e;
        }
    }


    public function sendAppreciation($candidate_id){
        try {

            $query ="SELECT c.name, ct.name AS category 
                FROM candidates c  LEFT JOIN categories ct ON c.category_id=ct.id 
                WHERE c.id='$candidate_id';
            ";
            return $this->all_rows($query);
           
        } catch (\Exception $e) {
            throw $e;
        }
    }



    public function getLeaderboard(){
        try {

            $query ="SELECT *
                FROM candidates c  LEFT JOIN categories ct ON c.category_id=ct.id 
                WHERE c.category_id='$candidate_id';
            ";

            $query = "
                SELECT 
                    cnd.id AS candidate_id, 
                    cnd.name AS candidate_name, 
                    cnd.votes AS votes, cnd.id, 
                    cat.name as category, 
                    cat.id AS category_id
                FROM candidates cnd
                INNER JOIN
                (
                    SELECT `category_id`, MAX(votes) AS max_votes
                    FROM candidates
                    GROUP BY `category_id`
                ) t2
                    ON cnd.`category_id` = t2.`category_id` AND cnd.votes = t2.max_votes
                LEFT JOIN categories cat ON cat.id=cnd.category_id;
            ";
            return $this->all_rows($query);
           
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function categories(){
        try {

            $query ="SELECT * FROM  categories ";
            
            return $this->all_rows($query);
           
        } catch (\Exception $e) {
            throw $e;
        }
    }


    public function allCandidates(){
        try {

            $query ="SELECT * FROM  candidates";
            return $this->all_rows($query);
           
        } catch (\Exception $e) {
            throw $e;
        }
    }


    public function details($sql){

        $query = $this->connection->query($sql);
        
        $row = $query->fetch_array();
            
        return $row;       
    }

    public function all_rows($sql){

        $query = $this->connection->query($sql);
        
        $rows = $query->fetch_all(MYSQLI_ASSOC);
            
        return $rows;       
    }
    
    
    public function escape_string($value){
        
        return $this->connection->real_escape_string($value);
    }



    public function sendSMS( $message, $msisdn ) {
        
        $url = 'http://167.172.14.50:4002/v1/send-sms';
    
        $post_data = http_build_query([
            "apiClientID" => 566,
            "key" => 'HUuZxgpnOGPTIYF',
            "secret" => 'nyailJsfK5r1UPkreVa9xSQH1PDICQ',
            "txtMessage" => $message,
            "MSISDN" => $msisdn,
            "serviceID" => 1
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


}


// $t = new VoteHandler();
// // print_r($t->castVote('254707630747', 23776, 2));
// // print_r($t->upvoteCandidate(1));
// $vote = $t->getLeaderboard(1);
// print_r($vote);
// // 