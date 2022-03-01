<?php
    $username = _$POST['username'];
    $password = _$POST['password'];

    //Database connection
    $con = new mysqli('localhost', 'root', '', 'signup');
    if($con->connect_error) {
        die("Failed to Connect : ".$con->connect_error);
    }else {
        $stmt = $con->prepare("SELECT * from register where username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0) {
            $data = $stmt_result->fetch_assoc();
            if($data['password'] === $password) {
                echo "<h2>Login Succesfully</h2>";
            }else{
                echo "<h2>Invalid Email or Password</h2>";
            }
        }else{
            echo "<h2>Invalid Email or Password</h2>";
        }
    }