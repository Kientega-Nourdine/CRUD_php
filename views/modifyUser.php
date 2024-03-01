<?php
    $user_id = $_GET['id'];
    // Verifier si y'a une requete post(send) vers modifyUser et faire les verifications 
    if(isset($_POST['send'])) {
        if(isset($_POST['username']) &&
          isset($_POST['email']) && 
          $_POST['username'] != "" &&  
          $_POST['email'] != "") {
            extract($_POST);
            // requete de modification des donnees
            $query = "UPDATE users SET username='$username', email='$email' WHERE user_id=$user_id";
            // inclusion de la connexion a la base de donnee
            include_once "../connectDb.php";
            if(mysqli_query($connectDb, $query)) {
                header('location:showUser.php?message=ModifySuccess');
            } else {
                header('location:modifyUser.php?message=ModifyFail');
            }
        } else {
            header('location:modifyUser.php?message=EmptyFields');
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify user</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <?php
    // requete de d'affichage des donnees de l'utilisateur a mettre a jour
    $query = "SELECT * FROM users WHERE user_id = $user_id";
    // inclusion de la connexion a la base de donnee
    include_once "../connectDb.php";
    $resut = mysqli_query($connectDb, $query);
    ?>
    <form action="" method="post">
        <h1>Modifier un utilisateur</h1>
        <?php
            while($data = mysqli_fetch_assoc($resut)) {
        ?>
        <input type="text" name="username" placeholder="Username" value="<?=$data['username']?>">
        <input type="email" name="email" placeholder="Email" value="<?=$data['email']?>">
        <input type="submit" value="Modifier" name="send">
        <a href="showUser.php" class="link back">Annuler</a>
    </form>

    <?php
    }
    ?>
</body>
</html>