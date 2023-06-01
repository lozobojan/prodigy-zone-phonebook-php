<?php

    if(!isset($_SESSION['loggedInUser'])){
        header('location: ../index.php');
        exit;
    }

?>