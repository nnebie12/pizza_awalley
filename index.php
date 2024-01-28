<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<form class="navbar">
    <div class="search-container">
        <input type="text" class="search-button" placeholder="Search" name="search">
        <button type="submit" class="create btn btn-info">Recherche</button>
    </div>
        <div class='container-button'><br>
            <a class='create btn btn-info' href='creat.php'>Créer </a>
            <a class='create btn btn-info' href='list_clients.php'>Clients </a>
            <a class='create btn btn-info' href='./livreur/list_livreurs.php'>Livreurs </a>
        </div>

</form>

<h1>AWALLEY</h1>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #333333;
    }

    .navbar {
        background-color: #333;
        overflow: hidden;
        padding: 10px;
        display: flex;
        justify-content: space-between;
    }

    .search-container {
        display: flex;
        align-items: center;
        margin-right: 20px;
    }

    .search-button {
        padding: 10px;
        border: none;
        border-radius: 5px;
        width: 90%;
    }

    .create {
        text-decoration: none;
        color: #fff;
        padding: 10px;
        background-color: #4CAF50;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .container-button {
        display: flex;
    }

    .container-button a {
        margin-right: 10px;
    }

    .pizza-card a {
        text-decoration: none;
        color: #fff;
        padding: 5px;
        background-color: #4CAF50;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 30%;
        margin-right: 55px;

    }

    .pizza-card a:hover {
        background-color: #5bc0de;
    }

    h1 {
        text-align: center;
        color: #fff;
    }

    .pizza-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .pizza-card {
        border: 1px solid #ddd;
        padding: 30px;
        margin: 15px;
        width: 280px;
        text-align: center;
        background-color: #fff;
        border-radius: 5px;
    }

    .pizza-card img {
        max-width: 100%;
        height: auto;
    }

    .pizza-card-buttons {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
    }

    .pizza-card-buttons a {
        width: 30%;
        margin: 10px;
    }


</style>






<?php

//connect to mysql
$servername = "localhost:8889";
$username = "root";

//mysqli_report(MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ALL);
// msqli est seulement pour mysql
try {


    $conn_mysqli = new mysqli($servername, $username, "root", "pizzainnoDB");
} catch (Exception $e) {
    die("probleme d'application , veullez contacter votre administrateur : ");

}

// je suis connecté à la base de données
//echo "Connected successfully";

// je fais une requete sql
$sql_pizza_all = "SELECT * FROM pizza";


// j'execute la requete
$result = $conn_mysqli->query($sql_pizza_all);
echo '<div class="pizza-container">';


// je recupere les données en faisant un boucle
while ($row = $result->fetch_assoc()) {
    echo '<div class="pizza-card">';
    echo '<h2>' . $row['DESIGNPIZZ'] . '</h2>';
    echo '<img src="images_pizza/' . $row['NROPIZZ'] . '.jpg" alt="' . $row['NROPIZZ'] . '">';
    echo '<p><strong>Numéro de Pizza:</strong> ' . $row['NROPIZZ'] . '</p>';
    echo '<p><strong>Prix:</strong> ' . $row['TARIFPIZZ'] . ' euros</p>';
    echo '<div class="pizza-card-buttons">';
    echo("<a class=' btn-info'href='commander.php' >Commander</a> ");
    echo("<a class='btn-info' href='udapte.php'>Modifier </a>");
    echo("<a class='btn-info' href='delete.php'>Supprimer </a>");
    echo '</div>';
    echo '</div>';
}
echo '</div>';


?>
</body>
</html>










