<?php

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $mysqli = require __DIR__. "/database.php";

    $sql = sprintf("SELECT * FROM userss
            WHERE email = '%s'",
            $mysqli->real_escape_string($_POST["email"]));

    $result = $mysqli->query($sql);
    session_start();

    $user = $result->fetch_assoc();

    if ($user) {
       if ( $_POST["password"] == $user["password"]){

        session_start();

        $_SESSION["user_id"] = $user["id"];

        header("Location: home.html");

       } 
    }

    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="log.css">

</head>
<body>
<header>
        <a class="reg" href="http://localhost/project/register.php">Register</a>
    </header>
    <div>
        <form class="login-container" id="logincon" action="" method="POST">
            <h1>Login</h1>
                <label for="email">Email</label>
                <input type="text"  id="email" name="email" autocomplete="off" required>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" autocomplete="off" required>
                <button >Login</button> 
     </form>
    </div>
</body>
</html>