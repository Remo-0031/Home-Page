<?php

if($_SERVER['REQUEST_METHOD'] === "POST"){
    $username = $_POST['username'];
    $password = $_POST['pwd'];
    $email  = $_POST['email'];

    try {
        
        require_once 'dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';

        //ERROR HANDLERS
        $error = [];

        if(isInputEmptry($username, $password, $email)){
            $error["empty_input"] = 'Fill in all the fields';
            //Check if all the field that was POSTed was filled out meaning no empty values
        }

        if(isValidEmail($email)){
            $error["invalid_email"] = 'Not a valid email entered';
            //check if the email entered is a valid email format 
        }  
        if(isUsernameTaken($pdo, $username)){
            $error["duplicate_username"] = 'Username already taken';
            //Do somethign when username is already taken
        }

        if(isEmailRegistered($pdo,$email)){
            $error["duplicate_email"] = 'Email already registered';
            //Do something when email is already regired
        }

        require_once 'config_session.inc.php';

        if($error){
            $_SESSION['error_signup'] = $error;

            $signupData = [
                'username' => $username,
                'email' => $email
            ];
            $_SESSION['signup_Data'] = $signupData;

            header("Location: ../index.php");
        }else {
            createUser($pdo,$username,$password,$email);

            header("Location: ../index.php?signup=sucess");
        }

        $pdo = null;
        $stmt = null;

    } catch (PDOException $e) { 
        die("Query Error : ". $e->getMessage());
    }
}else {
    header("Location: ../index.php");
    die();
}