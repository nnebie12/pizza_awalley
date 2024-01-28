<head>
    <title>Exo récup livreur mysql</title>
</head>
<body>

<form class="navbar">
    <div class="search-container">
        <input type="text" class="search-button" placeholder="Search" name="search">
        <button type="submit" class="create btn btn-info">Recherche</button>
    </div>
    <div class='container-button'><br>
        <a class='create btn btn-info' href='list_clients.php'>Clients </a>
        <a class='create btn btn-info' href='index.php'>Accueil </a>
    </div>

</form>

<h1>AWALLEY</h1>
<style>

    img {
        width: 300px;
        height: 300px;
        border-radius: 8px;
    }

    body {
        font-family: Arial, sans-serif;
        margin: 20px;
        padding: 20px;
        background-color: #333333;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    h1 {
        text-align: center;
        color: #fff;
    }

    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        margin-bottom: 20px;
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

    .create {
        text-decoration: none;
        color: #fff;
        padding: 10px 15px;
        border-radius: 5px;
        background-color: #007bff;
        margin-left: 10px;
        transition: background-color 0.3s ease;
    }

    .container-button {
        display: flex;
        margin-left: auto;
    }

    .create:hover {
        background-color: #0056b3;
    }

    .livreur-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
    }

    .livreur-card {
        border: 1px solid #ddd;
        border-radius: 8px;
        margin: 10px;
        padding: 15px;
        width: 150%;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        display: flex;
    }

    .livreur-card a {
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

    .livreur-card a:hover {
        background-color: #5bc0de;
    }

    .livreur-card img {
        margin-right: 10px;
    }

    .livreur-info {
        flex: 1;
    }

    nav {
        text-align: left;
        margin-bottom: 20px;
    }

    nav a {
        text-decoration: none;
        color: #333;
        padding: 10px;
        margin: 0 10px;
        border-radius: 5px;
        background-color: #ddd;
        transition: background-color 0.3s ease;
    }

    nav a:hover {
        background-color: #bbb;
    }

    .livreur-card-buttons {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
    }

    .livreur-card-buttons a {
        width: 30%;
        margin: 10px;
    }



</style>

<?php

//connect to mysql
$servername = "localhost";
$username = "root";

try {
    $conn_mysqli = new mysqli($servername, $username, "root", "pizzainnoDB");
} catch (Exception $e) {
    die("probleme d'application , veuillez contacter votre administrateur : ");
}

$sql_livreur = "SELECT * FROM livreur";
$result = $conn_mysqli->query($sql_livreur);
echo '<div class="livreur-container">';

while ($row = $result->fetch_assoc()) {
    echo '<div class="livreur-card">';
    echo '<img src="images_livreurs/' . $row['NROLIVR'] . '.jpg" alt="' . $row['NROLIVR'] . '">';
    echo '<div class="livreur-info">';
    echo '<h2>' . $row['NOMLIVR'] . ' ' . $row['PRENOMLIVR'] . '</h2>';
    echo '<p><strong>Numéro du Livreur:</strong> ' . $row['NROLIVR'] . '</p>';
    echo '<p><strong>Date d\'embauche:</strong> ' . $row['DATEEMBAUCHELIVR'] . '</p>';
    echo '<div class="livreur-card-buttons">';
    echo("<a class=' btn-info'href='commander.php' >Commander</a> ");
    echo("<a class='btn-info' href='udapte.php'>Modifier </a>");
    echo("<a class='btn-info' href='delete.php'>Supprimer </a>");
    echo '</div>';
    echo '</div>';
    echo '</div>';
}

echo '</div>';

?>
</body>
</html>