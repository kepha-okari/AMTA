<?php
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


    public function candidateExist($candidate_id){
        try {

            $query ="SELECT * FROM candidates WHERE id='$candidate_id';";
            $result = $this->all_rows($query);
            return count($result)>0 ? true : false;
           
        } catch (\Exception $e) {
            throw $e;
        }
    }



    public function getLeaderboard(){
        try {

            // $query = "
            //     SELECT 
            //         cnd.id AS candidate_id, 
            //         cnd.name AS candidate_name, 
            //         cnd.votes AS votes, cnd.id, 
            //         cat.name as category, 
            //         cat.id AS category_id
            //     FROM candidates cnd
            //     INNER JOIN
            //     (
            //         SELECT `category_id`, MAX(votes) AS max_votes
            //         FROM candidates
            //         GROUP BY `category_id`
            //     ) t2
            //         ON cnd.`category_id` = t2.`category_id` AND cnd.votes = t2.max_votes
            //     LEFT JOIN categories cat ON cat.id=cnd.category_id;
            // ";
            // // $query ="SELECT * FROM  categories;";
            // return $this->all_rows($query);  

            return $this->getRequest('http://localhost/amta/admin/app/backend/web/index.php?r=api/candidates');
 
            
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function categories(){
        try {

            $query ="SELECT * FROM  categories;";
            
            return $this->all_rows($query);
           
        } catch (\Exception $e) {
            throw $e;
        }
    }


    public function allCandidates(){
        try {

            $query ="SELECT * FROM  candidates;";
            
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

    public function concat($chain, $link){

        $result = $chain .=$link;
        return $result;
        
    }

    public function extractCandidateID($string){
    
        $candidate = '';
        $alpha_numeric = str_split($string,1);
        foreach ($alpha_numeric as $character) {
            if(is_numeric($character)){
                $candidate = $this->concat($candidate, $character);
            }
        }

        return (int)$candidate;

    }



}


// header('Access-Control-Allow-Origin: *');
// header('Content-type: application/json');

$t = new VoteHandler();
print_r($vote = $t->candidateExist(1112));

// $result = [
//     'status' => true, 
//     'message description'=>'leaderboard summary and all contestants(candidates)',
//     'data'=> [
//     // 'summary' => $vote->getLeaderboard(),
//     'candidates' => $t->allCandidates()
//     ]
// ];
// echo json_encode($result); 
