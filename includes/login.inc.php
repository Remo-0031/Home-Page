<?php

if($_SERVER['REQUEST_METHOD'] === "POST"){
    $username = $_POST['username'];
    $password = $_POST['pwd'];

    try{

        require_once 'dbh.inc.php';
        require_once 'login_contr.inc.php';
        require_once 'login_model.inc.php';

        $error = []; // This array is responsible for storing all error found when the user attempted to log into the website

        //The several if statement below are going to be used to check the error that when the user try to log into the system 
        if(is_input_empty($username,$password)){
            $error[] = "Fill in all the field!";
        }

        $userDetail = get_user($pdo,$username);

        if(is_username_wrong($userDetail)){
            $error[] = "Username does not Exist!";
        }
        if(!is_username_wrong($userDetail) && is_password_wrong($password,$userDetail['pwd'])){
            $error[] = "Password does not match!";
        }

        require_once 'config_session.inc.php';


        if($error){
            $_SESSION['error_login'] = $error;

            header("Location: ../index.php");
            die();
        }

        $newSessionID = session_create_id();
        $sessionID = $newSessionID . "_" . $userDetail[0];//Index 0 is the user ID 
        session_id($sessionID);

        $_SESSION['user_id'] = $userDetail['id'];
        $_SESSION['user_username'] = htmlspecialchars($userDetail['username']);

        $_SESSION['last_regeneration'] = time();

        header('Location: ../index.php?login=success');
        $pdo = null;
        $stmt = null;

        die();  
    }catch(PDOException $e){
        die("Query error: ". $e->getMessage()); 
    }
}else { 
    header("Location: ../index.php");
    die();
}