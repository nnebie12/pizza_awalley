<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création d'entité</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        button {
            display: none;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            max-width: 600px;
            margin: auto;
        }

        span {
            float: right;
            font-size: 20px;
            font-weight: bold;
            cursor: pointer;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            cursor: pointer;
        }

        .entity-section {
            display: none;
        }

    </style>

    <script>
        function openModal() {
            document.getElementById('entityModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('entityModal').style.display = 'none';
        }

        function updateForm() {
            const entityType = document.getElementById('entityType').value;

            // Masquer toutes les sections du formulaire
            const entitySections = document.getElementsByClassName('entity-section');
            for (let i = 0; i < entitySections.length; i++) {
                entitySections[i].classList.remove('active-section');
            }

            // Affichage de la section correspondant au type d'entité sélectionné
            const activeSection = document.getElementById(entityType + 'Section');
            activeSection.classList.add('active-section');
        }

        // Appelle de la fonction openModal automatiquement lors du chargement de la page
        window.onload = function () {
            openModal();
        };
    </script>
</head>
<body>

<h1>Bienvenue sur le site</h1>

<!-- Modal pour la création d'entité -->
<div id="entityModal" class="modal">
    <div class="modal-content">
        <span onclick="closeModal()">&times;</span>
        <h2>Création d'une entité</h2>

        <!-- Formulaire de création d'entité -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="updateForm()">
            <!-- Ajout de liste déroulante pour sélectionner le type d'entité -->
            <label for="entityType">Sélectionnez le type d'entité :</label>
            <select id="entityType" name="entityType" onchange="updateForm()">
                <option value="pizza">Pizza</option>
                <option value="livreur">Livreur</option>
                <option value="client">Client</option>
            </select><br>

            <!-- Section pour la création de pizzas -->
            <div id="pizzaSection" class="entity-section">
                <!--les champs spécifiques aux pizzas ici -->
                <label for="nomPizza">Nom de la pizza:</label>
                <input type="text" name="nomPizza" required><br>

                <label for="prixPizza">Prix de la pizza:</label>
                <input type="number" name="prixPizza" required><br>

                <label for="name">Ingrédients:</label>
                <input type="text" name="NOMINGR" required><br>

                <!-- Sélection d'ingrédients pour les pizzas -->
                <label for="ingredients">Ingrédients (au plus 2) :</label>
                <select name="ingredients[]" multiple size="2">
                    <?php
                    // Connexion à la base de données
                    $servername = "localhost:8889";
                    $username = "root";
                    $password = "root";
                    $dbname = "pizzainnoDB";

                    $conn_mysqli = new mysqli($servername, $username, $password, $dbname);

                    if ($conn_mysqli->connect_error) {
                        die("Connection failed: " . $conn_mysqli->connect_error);
                    }

                    $result = $conn_mysqli->query("SELECT * FROM Ingredient");

                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['NOMINGR'] . "'>" . $row['NOMINGR'] . "</option>";
                    }

                    $conn_mysqli->close();
                    ?>
                </select>
            </div>

            <!-- Section pour la création de livreurs -->
            <div id="livreurSection" class="entity-section">
                <!-- les champs spécifiques aux livreurs ici -->
                <label for="nomLivreur">Nom du livreur:</label>
                <input type="text" name="nomLivreur" required><br>

                <label for="prenomLivreur">Prénom du livreur:</label>
                <input type="text" name="prenomLivreur" required><br>

                <label for="livreurNumber">Numéro du livreur:</label>
                <input type="text" name="livreurNumber" required><br>

                <label for="hireDate">Date d'embauche:</label>
                <input type="text" name="hireDate" required><br>
            </div>

            <!-- Section pour la création de clients -->
            <div id="clientSection" class="entity-section">
                <!-- les champs spécifiques aux clients ici -->
                <label for="nomClient">Nom du client:</label>
                <input type="text" name="nomClient" required><br>

                <label for="prenomClient">Prénom du client:</label>
                <input type="text" name="prenomClient" required><br>

                <label for="clientAddress">Adresse du client:</label>
                <input type="text" name="clientAddress" required><br>

                <label for="clientPhoneNumber">Numéro de téléphone du client:</label>
                <input type="text" name="clientPhoneNumber" required><br>
            </div>

            <!-- bouton de soumission -->
            <input type="submit" value="Créer entité">
        </form>
    </div>
</div>

<?php
// traitement PHP après la soumission du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des valeurs du formulaire
    $nomPizza = $_POST['nomPizza'];
    $prixPizza = $_POST['prixPizza'];
    $ingredients = isset($_POST['ingredients']) ? $_POST['ingredients'] : array();


    // affichage des données pour le débogage
    echo "<h3>Résultats du traitement PHP :</h3>";
    echo "Nom de la pizza: " . $nomPizza . "<br>";
    echo "Prix de la pizza: " . $prixPizza . "<br>";
    echo "Ingrédients: " . implode(", ", $ingredients) . "<br>";
}
?>

</body>
</html>
