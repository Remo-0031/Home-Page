<?php

declare(strict_types=1);

function signup_inputs() {

    if(isset($_SESSION['signup_Data']['username']) && !isset($_SESSION['error_signup']['duplicate_username'])){
        echo '<input type="text" name="username" placeholder="Username" value="' .$_SESSION['signup_Data']['username'] .'">';
    }else {
        echo '<input type="text" name="username" placeholder="Username">';
    }

    echo '<input type="password" name="pwd" placeholder="Password">';

    if(isset($_SESSION['signup_Data']['email']) && !isset($_SESSION['error_signup']['invalid_email']) && !isset($_SESSION['error_signup']['duplicate_email'])){
        echo '<input type="text" name="email" placeholder="EMail" value="'.$_SESSION['signup_Data']['email'].'">';
    }else{
        echo '<input type="text" name="email" placeholder="EMail">';
    }
}

function check_signup_error(){
    if(isset($_SESSION['error_signup'])){
        $error = $_SESSION['error_signup'];

        echo "<br>";
        foreach ($error as $err){
            echo "<p style='color: red;'>$err</p>";
        }

        unset($_SESSION['error_signup']);
    }else if(isset($_GET['signup']) && $_GET['signup']==="sucess"){
        echo "<br>";
        echo "<p style='color=green;'>SIgnup Success!!</p>";
    }
}  