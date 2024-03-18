<?php

    include 'config.php';

    session_start();

    if(isset($_POST['submit'])){

        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = md5($_POST['password']);
        $cpass = md5($_POST['cpassword']);
        $user_type = $_POST['user_type'];
        
        $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0){
           
            $row = mysqli_fetch_array($result);

            if($row['user_type'] == 'admin')
            {
                $_SESSION['admin_name'] = $row['name'];
                header('location:admin_page.php');

            }elseif($row['user_type'] == 'user')
            {
                $_SESSION['user_name'] = $row['name'];
                header('location:user_pge.php');
                
            }
        } else{
            $error[] = 'incorrect email or password!';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="form-container">
        <form action="" method="post">
            <h3>Login Now</h3>
            <?php
                if(isset($error)){
                    foreach($error as $error){
                        echo '<p>'.$error.'</p>';
                    }
                }
            ?>
            <input type="email" name="email" required placeholder="enter your email">
            <input type="password" name="password" required placeholder="enter your password">
            <button type="sumbit" name="submit">Login Now</button>
            <p>Don't have an account?<a href="register_form.php">Register Now</a></p>
        </form>
    </div>

</body>

</html>