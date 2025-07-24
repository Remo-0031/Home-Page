<?php

declare(strict_types=1);


function get_username(object $pdo, string $username){
    $query = "SELECT username FROM users WHERE username = :username";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username",$username);
    $stmt->execute();
     
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_email(object $pdo, string $email){
    $query = "SELECT email FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email",$email);
    $stmt->execute();

    $results = $stmt->fetch(PDO::FETCH_ASSOC);
    return $results;
}

function setUser(object $pdo, string $username, string $pwd, string $email){
    $query = "INSERT into users (username,pwd,email) VALUES (:username,:pwd,:email);";
    $stmt = $pdo->prepare($query);
    
    $hashedPWD = password_hash($pwd,PASSWORD_BCRYPT,['cost'=>12]);


    $stmt->bindParam(":username",$username);
    $stmt->bindParam(":pwd",$hashedPWD);
    $stmt->bindParam(":email",$email);

    $stmt->execute();

}