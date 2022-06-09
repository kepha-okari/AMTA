<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
include_once('../classes/VoteHandler.php');


if(isset($_GET['message'])) {
    $message = $_GET['message'];


    $vote= new VoteHandler();



    $msisdn = $_GET['MSISDN'];
    $message = $_GET['message'];
    $shortcode = $_GET['shortcode'];

    $casting = explode("-", $message);

    if(count($casting)>=2) {
      $candidate_id = $casting[1];
    } else {
      $candidate_id = $vote->extractCandidateID($message);
    }  


    if( $vote->candidateExist($candidate_id) ){

        $result = $vote->castVote($msisdn, $shortcode, $candidate_id);
        $result = [ 'status' => true,  'status_message' => 'vote has been received', 'candidate id' => (int)$candidate_id, 'vote' => $result ];
        echo json_encode($result); 

    } else {
        $msg = 'Opps! you have submited vote '.$message.' which is an invalid vote format. Kindly verify and try again.';
        $vote->sendSMS($msg, $msisdn);
        $result = [ 'status' => false,  'status_message' => $msg ];
        echo json_encode($result); 
    }

}else {

  $result = [ 'status' => false,  'status_message' => 'missing message' ];
  echo json_encode($result); 
}








