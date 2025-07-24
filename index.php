<?php 

require_once 'includes/config_session.inc.php';
require_once 'includes/signup_view.inc.php';
require_once 'includes/login_view.inc.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    <style>
          body {
            background: #1c1b1bff;
            color: #e0e0e0;
            padding: 40px;
            display: flex;
            justify-content: center;
        }
        .wrapper {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        h3 {
            margin-bottom: 10px;
            color: #222;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="password"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        button {
            padding: 10px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        button:hover {
            background: #45a049;
        }

        .error {
            color: red;
            font-size: 0.9em;
            margin-bottom: 10px;
        }
        </style>
</head>
<body>
    <div class="wrapper">
        <h3>Login</h3>
        <br>
        <form action="includes/login.inc.php" method="post">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="pwd" placeholder="Password">
            <button>Login</button>
        </form>
        <br>

        <?php 
            check_login_error();
        ?>

        <h3>SigUP</h3>
        <br>
        <form action="includes/signup.inc.php" method="post">
            <?php 
                signup_inputs();
            ?>
            <button>Signup</button>
        </form>
        <br>

        <?php 
        
        check_signup_error();
        
        ?>
    </div>
</body>
</html>