<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>

<body>
    <div class="link_container">
        <a href="addUser.php" class="link">Ajouter un utilisateur</a>
    </div>

    <?php
        if(isset($_GET['message'])) {
            $message = $_GET['message'];
            echo $message;
        }
        ?>

    <main>
    <!-- Table -->
    <table>
        <thead>
            <?php  
            // inclusion de la page de connexion 
            include_once "../connectdb.php";
            // requete pour la liste des utilisateurs
            $query = "SELECT * FROM users";
            $result = mysqli_query($connectDb, $query);
            // verification de la longueur des numeros du tableau
            if(mysqli_num_rows($result) > 0) {
            // affichage des utilisateurs
            ?>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Modifier</th>
                <th>Suprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                while($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?=$row["username"]?></td>
                <td><?=$row["email"]?></td>
                <td class="image"><a href="modifyUser.php?id=<?=$row["user_id"]?>">
                    <svg class="write" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M15.7279 9.57629L14.3137 8.16207L5 17.4758V18.89H6.41421L15.7279 9.57629ZM17.1421 8.16207L18.5563 6.74786L17.1421 5.33365L15.7279 6.74786L17.1421 8.16207ZM7.24264 20.89H3V16.6474L16.435 3.21233C16.8256 2.8218 17.4587 2.8218 17.8492 3.21233L20.6777 6.04075C21.0682 6.43128 21.0682 7.06444 20.6777 7.45497L7.24264 20.89Z"></path></svg>
                </a></td>
                <td class="image"><a href="deleteUser.php?id=<?=$row["user_id"]?>">
                    <svg class="remove" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z"></path></svg>
                </a></td>
            </tr>
            <?php
            }
        } else {
            echo "<p class='message'> 0 utilisateur present </p>";
        }
        ?>
        </tbody>
    </table>
</main>
</body>
</html>