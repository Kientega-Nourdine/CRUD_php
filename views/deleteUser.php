<?php
    // recuperation de l'id utilisateur 
    $user_id = $_GET['id'];
    include_once "../connectDb.php";
    // requete de suppression utilisateur
    $query = "DELETE FROM users WHERE user_id = $user_id";
    // verification de suppression et redirection
    if(mysqli_query($connectDb, $query)) {
        header('location:showUser.php?message=DeleteSuccess');
    } else {
        header('location:showUser.php?message=DeleteFail');
    }

?>