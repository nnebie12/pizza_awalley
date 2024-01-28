<html >
<head>
    <title>Exo récup pizza mysql</title>
</head>
<body>

<h1>AWALLEY</h1>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #333333;
        margin: 0;
        padding: 0;
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
        padding: 15px;
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

    h1 {
        text-align: center;
        color: #fff ;
    }

    p {
        margin: 10px 0;
        color: #555;
    }

    strong {
        color: #000;
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
            echo '<h2>' . $row['NOMCLIE'] . '</h2>';
            echo '<h2>' . $row['PRENOMCLIE'] . '</h2>';
            echo '<h2>' . $row['ADRESSECLIE'] . '</h2>';
            echo '<h2>' . $row['VILLECLIE'] . '</h2>';
            echo '<h2>' . $row['CODEPOSTALECLIE'] . '</h2>';
            echo '<img src="images_clients/' . $row['NOMCLIE'] . '.jpg" alt="' . $row['NOMCLIE'] . '">';
            echo '<p><strong>Numéro du client:</strong> ' . $row['NROCLIE'] . '</p>';
            echo '<p><strong>Titre du client:</strong> ' . $row['TITRECLIE'] . '</p>';
            echo '</div>';
        }
        echo '</div>';
  // affichage de la variable $row
   /* echo "<pre>";
    print_r($row);
    echo "</pre>";
    echo "<pre>";
    var_dump($row);
    echo "</pre>";*/

    /*echo"<br>***************************************<br>";

    echo "client numero :".$row['NROCLIE'] . "<br>";
    echo "nom du client :".$row['NOMCLIE'] . "<br>";
    echo "prenom du client :".$row['PRENOMCLIE'] ."<br>";
    echo "adresse du client :".$row['ADRESSECLIE'] ."<br>";
    echo "ville du client :".$row['VILLECLIE'] ."<br>";
    echo "code postale du client :".$row['CODEPOSTALECLIE'] ."<br>";
    echo "titr du client :".$row['TITRECLIE'] ."<br>";

    echo("<img src='images_client/".$row['NOMCLIE'].".jpg'>");
    echo "nom du client:".$row['NOMCLIE'] ."jpg <br>";


    echo"<br>***************************************<br>";


}*/



?>
</body>
</html>