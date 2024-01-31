<html >
<head>
    <title>Exo récup pizza mysql</title>
</head>
<body>
<form class="navbar">
    <div class="search-container">
        <input type="text" class="search-button" placeholder="Search" name="search">
        <button type="submit" class="create btn btn-info">Recherche</button>
    </div>
    <div class='container-button'><br>
        <a class='create btn btn-info' href='list_livreurs.php'>Livreurs </a>
        <a class='create btn btn-info' href='index.php'>Accueil </a>
    </div>

</form>


<h1>AWALLEY</h1>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #333333;
        padding: 0;
        color: #fff;
    }

    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        margin-bottom: 25px;
    }

    .search-container {
        display: flex;
        align-items: center;
    }

    .search-button {
        padding: 10px;
        border: none;
        border-radius: 5px;
    }

    .container-button {
        display: flex;
        margin-left: auto;
    }

    .create {
        text-decoration: none;
        color: #fff;
        padding: 10px;
        margin: 0 10px;
        border-radius: 5px;
        background-color: #4CAF50;
        transition: background-color 0.3s ease;
    }

    .create:hover {
        background-color: #31b0d5;
    }

    h1 {
        text-align: center;
        color: #fff;
    }

    .client-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        margin: 20px;
    }

    .client-card {
        border: 1px solid #ccc;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin: 10px;
        padding: 35px;
        width: 250px;
        background-color: #fff;
    }

    .client-card img {
        max-width: 100%;
        height: auto;
        border-radius: 4px;
        margin-top: 10px;
    }

    h2 {
        color: #333;
        font-size: 15px;
    }

    p {
        margin: 10px 0;
        color: #555;
    }

    strong {
        color: #000;
    }

    .livreur-card-buttons {
        display: flex;
        justify-content: space-around;
        margin-top: 8px;
    }

    .livreur-card-buttons a {
        text-decoration: none;
        color: #fff;
        padding: 3px 5px;
        margin: 5px;
        border-radius: 5px;
        background-color: #4CAF50;
        transition: background-color 0.3s ease;
    }

    .livreur-card-buttons a:hover {
        background-color: #31b0d5;
    }

</style>


<?php


//connect to mysql
$servername = "localhost";
$username = "root";


// msqli est seulement pour mysql
try {


    $conn_mysqli = new mysqli($servername, $username, "root", "pizzainnoDB");
} catch (Exception $e) {
    die("probleme d'application , veullez contacter votre administrateur : ");

}

// je suis connecté à la base de données
//echo "Connected successfully";

// je fais une requete sql
$sql_client_all = "SELECT * FROM client";


// j'execute la requete
$result = $conn_mysqli->query($sql_client_all);
echo '<div class="client-container">';

// je recupere les données en faisant un boucle
while ($row = $result->fetch_assoc()) {

    echo '<div class="client-card">';
            echo '<h2>' . $row['NOMCLIE'] . $row['PRENOMCLIE'] . '</h2>';
            echo '<h2>' . $row['ADRESSECLIE'] . '</h2>';
            echo '<h2>' . $row['VILLECLIE'] . '</h2>';
            echo '<h2>' . $row['CODEPOSTALECLIE'] . '</h2>';
            echo '<img src="images_clients/' . $row['NROCLIE'] . '.jpg" alt="' . $row['NROCLIE'] . '">';
            echo '<p><strong>Numéro du client:</strong> ' . $row['NROCLIE'] . '</p>';
            echo '<p><strong>Titre du client:</strong> ' . $row['TITRECLIE'] . '</p>';
            echo '<div class="livreur-card-buttons">';
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