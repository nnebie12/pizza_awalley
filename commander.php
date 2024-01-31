<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $success_message = "Votre commande a été enregistrée avec succès!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commander une Pizza</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        h1 {
            text-align: center;
            color: #343a40;
        }

        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #343a40;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        .modal-dialog {
            max-width: 500px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Commander une Pizza</h1>
    <?php
    if (isset($success_message)) {
        echo '<div class="alert alert-success" role="alert">' . $success_message . '</div>';
    } else {
        // Affichage du formulaire
        ?>
        <button class="btn btn-success" data-toggle="modal" data-target="#commandModal">Commander une Pizza</button>

        <!-- Modal -->
        <div class="modal fade" id="commandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Commander une Pizza</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="form-group">
                                <label for="pizzaType">Type de Pizza:</label>
                                <input type="text" class="form-control" name="pizzaType" required>
                            </div>
                            <div class="form-group">
                                <label for="nom">Nom:</label>
                                <input type="text" class="form-control" name="nom" required>
                            </div>
                            <div class="form-group">
                                <label for="prenom">Prénom:</label>
                                <input type="text" class="form-control" name="prenom" required>
                            </div>
                            <div class="form-group">
                                <label for="numero">Numéro:</label>
                                <input type="text" class="form-control" name="numero" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" name="email" required>
                            </div>

                            <button type="submit" class="btn btn-success">Valider la commande</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

</body>
</html>