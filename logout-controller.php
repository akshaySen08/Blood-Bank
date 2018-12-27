<?php 
    session_start();
    if(isset($_SESSION) && !empty($_SESSION)){
        // remove all session variables
        session_unset(); 
        // destroy the session 
        session_destroy();
    }

    if(empty($_SESSION)){
        $response = array('status'=>1, 'content'=>'You are successfully logged out.'); 
    }else {
        $response = array('status'=>0, 'content'=>'You are <b>NOT</b> successfully logged out.');
    }
    echo json_encode($response);
?>