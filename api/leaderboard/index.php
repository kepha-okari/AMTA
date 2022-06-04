<?php
include_once('../classes/VoteHandler.php');


$vote= new VoteHandler();



// if(isset($_GET['category'])) {
//     $category = $_GET['category'];
//   }else {
//     return [ 'status' => false,  'status_message' => 'missing category' ];
// }

try {
    $result = [
        'status' => true, 
        'message description'=>'leaderboard summary and all contestants(candidates)',
        'data'=> [
        'summary' => $vote->getLeaderboard(),
        'candidates' => $vote->allCandidates()
        ]
    ];
} catch (\Throwable $th) {
    throw $th;
}


header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

echo json_encode($result); 