<?php 
    // mysqli_connect(host, username, password, dbname, port, socket)
    $connection = mysqli_connect('127.0.0.1', 'root', '', 'phonebook_db');

    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
?>