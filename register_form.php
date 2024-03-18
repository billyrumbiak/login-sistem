<?php

    include 'config.php';

    if(isset($_POST['submit'])){

        $nama = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = md5($_POST['password']);
        $cpass = md5($_POST['cpassword']);
        $user_type = $_POST['user_type'];
        
        $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";
        
        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0){
            $error[] = 'User already Exist!';
        }else{

            if($pass != $cpass){
                $error[] = 'password not matched!';
            }else{
                $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
                mysqli_query($conn, $insert);
                header('location:login_form.php');
            }

        }

    }

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>

    <form action="" method="post">

        <div class="container">
            <h3 class="text-center">Register Now</h3>
            <?php
                if(isset($error)){
                    foreach($error as $error){
                        echo '<p>'.$error.'</p>';
                    }
                }
            ?>
            <div class="col-2 mb-3">
                <label for="name" class="form-label">Masukkan Nama</label>
                <input type="text" name="name" id="name" class="form-control text-center" required>
            </div>

            <div class="col-2 mb-3">
                <label for="email" class="form-label">Masukkan Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="col-2 mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <div class="col-2 mb-3">
                <label for="password" class="form-label">Konfirmasi Password</label>
                <input type="password" name="cpassword" class="form-control" required>
            </div>

            <div class="col-2">
                <select name="user_type" class="form-select">
                    <option selected>Pilih</option>
                    <option value="user">user</option>
                    <option value="admin">admin</option>
                </select>

                <button type="sumbit" name="submit" class="mt-3 btn btn-primary">Register Now</button>
            </div>

            <p class="mt-3">Already have an account?<a href="login_form.php">Login Now</a></p>
        </div>

    </form>

</body>

</html>