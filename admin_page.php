<?php

include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
    header('location:login_form.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="content">
            <h3>Hi, <span>Admin</span></h3>
            <h1>Welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
            <p>This is an Admin Page</p>
            <a href="login_form.php">Login</a>
            <a href="register_form.php">Register</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>

</body>

</html>