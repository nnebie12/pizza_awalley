<?php
$servername = "localhost:8889";
$username = "root";

try {
    $conn_mysqli = new mysqli($servername, $username, "root", "pizzainnoDB");
} catch (Exception $e) {
    die("Problème d'application, veuillez contacter votre administrateur : " . $e->getMessage());
}

$message = ""; // Variable pour stocker le message de succès ou d'erreur

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'update_pizza':
            $pizza_id = $_POST['pizza_id'];
            $design_pizza = $_POST['design_pizza'];
            $tarif_pizza = $_POST['tarif_pizza'];

            $sql_update_pizza = "UPDATE pizza SET DESIGNPIZZ = '$design_pizza', TARIFPIZZ = '$tarif_pizza' WHERE NROPIZZ = $pizza_id";

            if ($conn_mysqli->query($sql_update_pizza) === TRUE) {
                $message = "Pizza modifiée avec succès!";
            } else {
                $message = "Erreur lors de la modification de la pizza : " . $conn_mysqli->error;
            }
            break;

        case 'update_client':
            $table_name = $_POST['client'];
            $client_id = $_POST['NROCLIE'];
            $name_client = $_POST['NOMCLIE'];
            $prenom_client = $_POST['PRENOMCLIE'];

            $sql_update_client = "UPDATE client SET NOMCLIE = '$name_client', PRENOMCLIE = '$prenom_client' WHERE NROCLIE = $client_id";
            // Ajoutez le code pour la modification d'un client ici
            break;

        case 'update_livreur':
            $table_name = $_POST['livreur'];
            $livreur_id = $_POST['NROLIVR'];
            $name_livreur = $_POST['NOMLIVR'];
            $prenom_livreur = $_POST['PRENOMLIVR'];
            $datedembauche_livreur = $_POST['DATEEMBAUCHELIVR'];

            $sql_update_livreur = "UPDATE livreur SET NOMLIVR = '$name_livreur', PRENOMLIVR = '$prenom_livreur', DATEEMBAUCHELIVR = $datedembauche_livreur, WHERE NROLIVR = $livreur_id";
            // Ajoutez le code pour la modification d'un livreur ici
            break;

    }
}

// Récupérez l'ID et le type d'entité depuis l'URL
if (isset($_GET['id']) && isset($_GET['type'])) {
    $entity_id = $_GET['id'];
    $entity_type = $_GET['type'];



    switch ($entity_type) {
        case 'pizza':
            $pizza_id = 'pizza_id';
            $design_pizza = 'design_pizza';
            $tarif_pizza = $_POST['tarif_pizza'];
            break;
        case 'client':
            $table_name = 'client';
            $client_id = 'NROCLIE';
            $name_client = 'NOMCLIE';
            $prenom_client = 'PRENOMCLIE'; // Juste pour l'exemple, ajustez en fonction de votre structure de table
            break;
        case 'livreur':
            $table_name = 'livreur';
            $livreur_id = 'NROLIVR';
            $name_livreur = 'NOMLIVR';
            $prenom_livreur = 'PRENOMLIVR';
            $datedembauche_livreur = ['DATEEMBAUCHELIVR'];// Juste pour l'exemple, ajustez en fonction de votre structure de table
            break;
        default:
            // Gestion d'une valeur de type d'entité incorrecte
            break;
    }

    // Requête de sélection générique
    $sql_select_entity = "SELECT * FROM $table_name WHERE $id_column = $entity_id";
    $result = $conn_mysqli->query($sql_select_entity);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        // Gestion du cas où l'entité n'est pas trouvée
    }
} else {
    // Gestion du cas où les paramètres ne sont pas présents dans l'URL
}

$conn_mysqli->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Entité</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #fff;
        }

        .close-btn {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close-btn:hover,
        .close-btn:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-content h1 {
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
        }

        input {
            margin-bottom: 16px;
            padding: 8px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<h1>AWALLEY</h1>

<div id="modal" class="modal">
    <div class="modal-content">
        <span onclick="closeModal()" style="float: right; cursor: pointer;">&times;</span>
        <h1>Modifier <?php echo ucfirst($entity_type); ?></h1>
        <?php echo $message; // Affichez le message ici ?>

        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="action" value="update_entity">
            <input type="hidden" name="entity_id" value="<?php echo $row['ID']; ?>">

            <!-- Ajoutez un champ caché pour stocker le type d'entité -->
            <input type="hidden" name="entity_type" value="<?php echo $entity_type; ?>">

            <label for="entity_name">Nom de l'Entité:</label>
            <input type="text" name="entity_name" value="<?php echo $row['NOM']; ?>" required><br>

            <label for="entity_price">Prix de l'Entité (en euros):</label>
            <input type="number" name="entity_price" value="<?php echo $row['PRIX']; ?>" required><br>

            <input type="submit" value="Enregistrer les modifications">
        </form>
    </div>
</div>

<script>
    // Fonction pour ouvrir la modal
    function openModal() {
        document.getElementById('modal').style.display = "block";
    }

    // Fonction pour fermer la modal
    function closeModal() {
        document.getElementById('modal').style.display = "none";
    }

    // Ouvrir automatiquement la modal lors du chargement de la page
    window.onload = openModal;
</script>

</body>
</html>