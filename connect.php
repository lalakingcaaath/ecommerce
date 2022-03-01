<?php
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    //Database connection
    $conn = new mysqli('localhost', 'root', '', 'signup');
    if ($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("INSERT into register(username, password, email) values (?, ?, ?)");
        $stmt->bind_param("sis", $username, $password, $email);
        $stmt->execute();
        echo "You have been registered.";
        $stmt->close();
        $conn->close();
    }