<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/prod_style.css">
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

<body>
    <?php
    include_once "config.php";
    include_once "header.php" ?>

    <?php

    $id = "";
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
    }

    $query = "SELECT * FROM produit WHERE id = " . $id;
    $resultat = mysqli_query($conn, $query);

    // Vérifier s'il y a des résultats
    if (mysqli_num_rows($resultat) > 0) {
        // Parcourir les résultats et afficher les détails du produit
        $produit = mysqli_fetch_assoc($resultat);
    ?><img src="images/<?= $produit['Image'] ?>" class="new">
        <img src="images/<?= $produit['Image2'] ?>" class="new">
        <img src="images/<?= $produit['Image3'] ?>" class="new">
        <?php
        echo "Nom : " . $produit['Nom'] . "<br>";
        echo "Description : " . $produit['Description'] . "<br>";
        echo "Prix : " . $produit['Prix'] . "<br>";
        echo "" . $produit['Couleur'] . "<br>";
        ?>
        <label for="taille">Taille :</label>
        <select name="taille" id="taille">
            <option value="36">36</option>
            <option value="37">37</option>
            <option value="38">38</option>
            <!-- Ajoutez les autres tailles disponibles ici -->
        
            </select>
            <label for="quantité">Quantité :</label>
            <input type="number" id="chiffre" value=0>


            <button onclick="modifierChiffre('+')">+</button>
            <button onclick="modifierChiffre('-')">-</button>

            <script>
                
            </script>



            <a href="ajouter_panier.php?id=<?= $produit['id'] ?>" class="id_product" id="foo">Ajouter au panier</a>


            <script>
                var el = document.getElementById('foo');
                el.onclick = showFoo;

                function showFoo() {
                    document.cookie = "nb="+document.getElementById('chiffre').value;
                    return false;
                }
            </script>

            <?php
                print_r($_COOKIE["nb"]);
                ?>

        <?php
        // Afficher d'autres détails du produit selon vos besoins
    } else {
        echo "Produit non trouvé.";
    }
        ?>





</body>

</html>