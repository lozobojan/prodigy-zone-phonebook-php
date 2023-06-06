<?php

    include '../db.php';

    $idToDelete = $_GET['id'];

    //trazimo red u tabeli kontakata koji zelimo da mijenjamo
    $query = "SELECT * FROM contacts WHERE id = $idToDelete";
    $result = mysqli_query($connection, $query);
    $contact = mysqli_fetch_assoc($result);
    $profilePhotoPath = $contact['profilePhotoPath'];

    if(!empty($profilePhotoPath)){
        $uploadDir = '../uploads/profile_photos/';
        // brisanje sa fajl sistema servera
        unlink($uploadDir.$profilePhotoPath);
    }

    // prvo brisemio sve veze sa hobijima
    $query = "DELETE FROM contact_has_hobby WHERE contact_id = $idToDelete";
    $res = mysqli_query($connection, $query);

    // pravimo upit za brisanje reda iz tabele kontkata
    $query = "DELETE FROM contacts WHERE id = $idToDelete";
    $res = mysqli_query($connection, $query);

    header('location: ./index.php?msg=Uspješno brisanje!');
?>