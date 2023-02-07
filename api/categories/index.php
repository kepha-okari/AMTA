<?php
include_once('../classes/VoteHandler.php');


$vote= new VoteHandler();



// if(isset($_GET['category'])) {
//     $category = $_GET['category'];
//   }else {
//     return [ 'status' => false,  'status_messvotes' => 'missing category' ];
// }

try {
    $result = ['status' => true, 'message description'=>'result for all categories ','data'=>$vote->categories()];
} catch (\Throwable $th) {
    throw $th;
}


header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

echo json_encode($result); 

