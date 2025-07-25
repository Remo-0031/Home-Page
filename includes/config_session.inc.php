<?php

ini_set('session.use_only_cookies',1);
ini_set('session.use_strict_mode', 1);

session_set_cookie_params([
    'lifetime' => 1800,
    'domain' => 'localhost',
    'path' => '/',
    'secure' => true,
    'httponly' => true
]);

session_start();


if(isset($_SESSION['user_id'])){
    if (!isset($_SESSION['last_regeneration'])) {
        regenerateID_logged();
    }else {
        $interval = 60 * 30;
        if(time() - $_SESSION['last_regeneration'] >= $interval){
            regenerateID_logged();
        }
    }
}else{
    if (!isset($_SESSION['last_regeneration'])) {
        regenerateID();
    }else {
        $interval = 60 * 30;
        if(time() - $_SESSION['last_regeneration'] >= $interval){
            regenerateID();
        }
    }
}

function regenerateID_logged(){
    $newSessionID = session_create_id();
    $sessionID = $newSessionID . "_" . $_SESSION['user_id'];//Index 0 is the user ID 
    session_id($sessionID);

    $_SESSION['last_regeneration'] = time();
}

function regenerateID(){
    session_regenerate_id(true);
    $_SESSION['last_regeneration'] = time();
}