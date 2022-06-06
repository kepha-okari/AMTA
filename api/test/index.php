<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
include_once('../classes/VoteHandler.php');


$vote= new VoteHandler();

try {
    $result = [
        'status' => true, 
        'message description'=>'leaderboard summary and all contestants(candidates)',
        'data'=> [
        // 'summary' => $vote->getLeaderboard(),
        'candidates' => $vote->allCandidates()
        ]
    ];


    // $result = [
    //     'status' => true, 
    //     'message description'=>'leaderboard summary and all contestants(candidates)',
    //     'data'=> [
    //     'candidates' => $vote->allCandidates(),
    //     ]
    // ];

} catch (\Throwable $th) {
    throw $th;
}




echo json_encode($result); 