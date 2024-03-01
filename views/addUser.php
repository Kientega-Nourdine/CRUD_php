<?php
    // verification qu'il s'agit d'un nouvel ajout et que les informations sont bien definies
    if(isset($_POST['send'])) {
        if(isset($_POST['username']) && 
           isset($_POST['email']) && 
           $_POST['username'] !='' && 
           $_POST['email'] !='') {
            include_once "../connectdb.php";
            extract($_POST);
            $query = "INSERT INTO users(username, email) VALUES ('$username','$email')";
            if(mysqli_query($connectDb, $query)) {
                header("location:showUser.php?message=<div class'success'>AddSuccess</div>");
            } else {
                header('location:addUser.php?message=AddFail');
            }

        } else {
            header('location:addUser.php?message=EmptyFields');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add user</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <form action="" method="post">
        <h1>Ajouter un utilisateur</h1>
        <input type="text" name="username" placeholder="Username">
        <input type="email" name="email" placeholder="Email">
        <input type="submit" value="Ajouter" name="send">
        <a href="showUser.php" class="link back">Annuler</a>
    </form>
</body>
</html>