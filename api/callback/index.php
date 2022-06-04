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
    $candidate = $casting[1];

    $result = $vote->castVote($msisdn, $shortcode, $candidate);
    $result = [ 'status' => true,  'status_message' => 'vote has been received' ];
    echo json_encode($result); 

}else {

  $result = [ 'status' => false,  'status_message' => 'missing message' ];
  echo json_encode($result); 
}








// print_r($vote->getLeaderboard(1));



// $avoid = ['token', 'api_key'];
// $datastring = '';
// foreach ($_GET as $key => $val) {
//     if(!in_array($key, $avoid)){
//         $datastring.=$key;
//     }
// }

// echo $datastring;

