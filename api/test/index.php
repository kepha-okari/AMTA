<?php

session_start();

function appFilter($ext){

    switch ($ext) {
        
        case '200':
            # DRIECT TRAFFIC TO A DIFFERENT APP 
            echo "CON Welcome 200 \n1.".$_GET['message']."\n2.".$_GET['service_code']."\n3.".$_GET['session_id'];
            break;
        
        case '300':

            # DRIECT TRAFFIC TO A DIFFERENT APP
            echo "CON Welcome 300\n1.".$_GET['message']."\n2.".$_GET['service_code']."\n3.".$_GET['session_id'];
            break;
            
        default:
            echo "CON Welcome\n1.".$_GET['message']."\n2.".$_GET['service_code']."\n3.".$_GET['session_id'];
            break;
    }

}


try {
    

    if($_GET) {

        if( $_SESSION['session_id'] == $_GET['session_id'] ){

            echo "CON The session id is same\nProcess the input";
 
        } else {

            $_SESSION['session_id'] = $_GET['session_id'];
            appFilter($_GET['message']);
        }

    } else {

        echo "END Bye!";

    }


} catch (\Throwable $th) {

    throw $th;

}



