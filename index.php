<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhoneBook PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h3 class="text-center mt-3">PhonebookAPP</h3>

    <div class="row mt-5">

        <?php

            if(isset($_GET['err']) && $_GET['err'] == 1){
                echo "<p class='my-3 text-center text-danger'>Neispravna kombinacija lozinke i korisničkog imena</p>";
            }

        ?>

        <div class="col-6 offset-3">
            <form action="./login.php" method="POST">

                <label for="username">Korisničko ime</label>
                <input type="text" id="username" class="form-control" name="username">

                <label for="password">Lozinka</label>
                <input type="password" id="password" class="form-control" name="password">

                <button class="btn btn-success w-100 mt-3" id="saveBtn">PRIJAVA</button>
            </form>
        </div>
    </div>
</div>
<script src="./cities.js"></script>
</body>
</html>