<?php

    include './db.php';

    // TODO: validiraj podatke

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($connection, $sql);

    $user = mysqli_fetch_assoc($result);
    if($user){
        $_SESSION['loggedInUser'] = $user;
        header('location: ./contacts/index.php?msg=Dobrodosli');
        exit;
    }else{
        header('location: ./index.php?err=1');
    }
?>