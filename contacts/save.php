<?php
    include '../db.php';
//    var_dump($_FILES);
//    exit;
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $loggedInUser = $_SESSION['loggedInUser'];
    $user_id = $loggedInUser['id'];

    if(empty($firstName) || strlen($firstName) < 2){
        header('location: ./index.php?error=5');
        exit;
    }
    if(empty($lastName) || strlen($lastName) < 2){
        header('location: ./index.php?error=6');
        exit;
    }
    if(empty($phone) || strlen($phone) < 2){
        header('location: ./index.php?error=7');
        exit;
    }
    if(empty($email) || strlen($email) < 2){
        header('location: ./index.php?error=8');
        exit;
    }

    $newName = '';
    if(isset($_FILES['profilePhoto'])){
        $profilePhoto = $_FILES['profilePhoto'];
        $tmpLocation = $profilePhoto['tmp_name'];
        $originalName = $profilePhoto['name'];
        $originalExtensionArr = explode('.', $originalName);
        $originalExtension = end($originalExtensionArr);

        $uploadDir = '../uploads/profile_photos/';
        $newName = uniqid().".".$originalExtension;

        copy($tmpLocation, $uploadDir.$newName);
    }
    

    $query = "INSERT INTO contacts (firstName, lastName, phone, email, user_id, profilePhotoPath) 
                VALUES 
                ('$firstName', '$lastName','$phone','$email', $user_id, '$newName')";
    $result = mysqli_query($connection, $query);

    // new contact ID
    $id = mysqli_insert_id($connection);

    if ($result) {
        // Ako je unos kontakta uspešan, proveravamo da li su izabrani hobiji
        if (isset($_POST['hobbies'])) {
            $selectedHobbies = $_POST['hobbies'];
            foreach ($selectedHobbies as $hobby_id) {
                $insertQuery = "INSERT INTO contact_has_hobby (contact_id, hobby_id) VALUES ($id, $hobby_id)";
                $result1 = mysqli_query($connection, $insertQuery);
            }
        }
    }
    header('location: ./index.php');
?>