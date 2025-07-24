<?php

declare(strict_types=1);

function isInputEmptry(string $username,string $password,string $email) {
    if (empty($username) || empty($password) || empty($email)){
        return true;
    }else {
        return false;
    }
}

function isValidEmail(string $email): bool{
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }else {
        return false;
    }
}

function isUsernameTaken(object $pdo,string $username){
    if(get_username($pdo, $username)){
        return true;
    }else {
        return false;
    }
}

function isEmailRegistered(object $pdo,string $email){
    if(get_email($pdo,$email)){
        return true;
    }else{
        return false;
    }
}

function createUser(object $pdo,string $username,string $pwd,string $email){
    setUser($pdo,$username,$pwd,$email);
}