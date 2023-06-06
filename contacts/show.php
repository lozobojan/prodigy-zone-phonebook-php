<?php
include '../db.php';

if(isset($_GET['id'])){
    $idToEdit = $_GET['id'];
}else{
    header('location: ./index.php');
}

//trazimo red u tabeli kontakata koji zelimo da mijenjamo
$query = "SELECT * FROM contacts WHERE id = $idToEdit";
$result = mysqli_query($connection, $query);
$contact = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhoneBook PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
<?php include('../navbar.php'); ?>
<div class="container">
    <h3 class="text-center mt-3">Detalji kontakta</h3>

    <div class="row">
        <div class="col-3">
            <?php
                $uploadDir = '../uploads/profile_photos/';
                if(!empty($contact['profilePhotoPath'])){
                    $profilePhotoPath = $uploadDir.$contact['profilePhotoPath'];
                }else{
                    $profilePhotoPath = $uploadDir."placeholder.jpeg";
                }

                echo "<img class='img-fluid' src='$profilePhotoPath' />";
            ?>
        </div>
        <div class="col-6">
            <p>Ime: <?=$contact['firstName']?></p>
            <p>Prezime: <?=$contact['lastName']?></p>
            <p>Broj telefon: <?=$contact['phone']?></p>
            <p>E-mail adresa: <?=$contact['email']?></p>
        </div>
    </div>
</div>
</body>
</html>
