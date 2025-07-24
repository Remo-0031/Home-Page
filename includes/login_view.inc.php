<?php

declare(strict_types=1);

function check_login_error(){ 
    if(isset($_SESSION['error_login'])){
        echo "<br>";
        foreach ($_SESSION["error_login"] as $err){
            echo "<p style='color: red;'>$err</p>";
        }
        unset($_SESSION["error_login"]);
    }else if (isset($_GET['login']) && $_GET['login'] === "success") {
        echo "<br>";
        echo "<p style='color: green;'>Login Success </p>";
    }
}