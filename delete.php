<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Supprimer une Entité</title>

    <style>
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

        .delete-btn {
            background-color: #ff0000;
            color: white;
        }

        .delete-btn:hover {
            background-color: #cc0000;
        }
    </style>
</head>
<body>

<div id="modal" class="modal">
    <div class="modal-content">
        <span onclick="closeModal()" style="float: right; cursor: pointer;">&times;</span>
        <h1>Supprimer Entité</h1>
        <?php echo $message; // Affichez le message ici ?>

        <!-- Formulaire de suppression -->
        <form action="" method="post">
            <input type="hidden" name="action" value="delete_<?php echo $table_name; ?>">
            <input type="hidden" name="<?php echo $table_name; ?>_id" value="<?php echo $entity_id; ?>">

            <p>Êtes-vous sûr de vouloir supprimer cette <?php echo $table_name; ?>?</p>

            <input type="submit" class="delete-btn" value="Supprimer <?php echo $table_name; ?>">
        </form>
    </div>
</div>

<script>
    function openModal() {
        document.getElementById('modal').style.display = "block";
    }

    function closeModal() {
        document.getElementById('modal').style.display = "none";
    }

    // Ouvrir automatiquement la modal lors du chargement de la page
    window.onload = openModal;
</script>

</body>
</html>
