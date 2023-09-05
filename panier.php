<?php include_once('header.php'); ?>

<?php
session_start();
include_once "config.php";

//supprimer les produits
//si la variable del existe
if (isset($_GET['del'])) {
    $id_del = $_GET['del'];
    //suppression
    unset($_SESSION['panier'][$id_del]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <link rel="stylesheet" href="style.css">
</head>

<script>
    function modifierChiffre(operation) {
        var champChiffre = document.getElementById('chiffre');
        var valeurChiffre = parseInt(champChiffre.value); // Récupère la valeur actuelle du champ de saisie

        if (operation === '+') {
            valeurChiffre += 1; // Incrémente le chiffre de 1
        } else if (operation === '-') {
            valeurChiffre -= 1; // Décrémente le chiffre de 1
        }

        champChiffre.value = valeurChiffre; // Met à jour la nouvelle valeur dans le champ de saisie
    }
</script>

<body class="panier">
    <section>
        <table>
            <tr>
                <th></th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Action</th>
            </tr>
            <?php
            $total = 0;
            // liste des produits
            //récupérer les clés du tableau session
            $ids = array_keys($_SESSION['panier']);
            //s'il n'y a aucune clé dans le tableau
            if (empty($ids)) {
                echo "Votre panier est vide";
            } else {
                //si oui 
                $products = mysqli_query($conn, "SELECT * FROM produit WHERE id IN (" . implode(',', $ids) . ")");

                //lise des produit avec une boucle foreach
                foreach ($products as $product) :
                    //calculer le total ( prix unitaire * quantité) 
                    //et aditionner chaque résutats a chaque tour de boucle
                    $total = $total + $product['Prix'] * $_SESSION['panier'][$product['id']];
            ?>
                    <tr>
                        <td><img src="images/<?= $product['Image'] ?>"></td>
                        <td><?= $product['Nom'] ?></td>
                        <td><?= $product['Prix'] ?> €</td>
                        <td><?= $_SESSION['panier'][$product['id']] // Quantité
                            ?>
                            <input type="number" id="chiffre" value="0">


                            <button onclick="modifierChiffre('+')">+</button>
                            <button onclick="modifierChiffre('-')">-</button>

                        </td>
                        <td><a href="panier.php?del=<?= $product['id'] ?>"><i class='bx bxs-trash'></i></a></td>
                    </tr>

            <?php endforeach;
            } ?>

            <tr class="total">
                <th>Total : <?= $total ?> €</th>
            </tr>
        </table>
    </section>
</body>

</html>