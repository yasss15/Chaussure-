<?php include_once('header.php'); ?>


<?php 
 session_start() ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- afficher le nombre de produit dans le panier -->
    
    <section class="products_list">
        <?php 
        //inclure la page de connexion
        include_once "config.php";
        //afficher la liste des produits
         $req = mysqli_query($conn, "SELECT * FROM produit WHERE  genre = 'Chaussure pour homme' ");
         while($row = mysqli_fetch_assoc($req)){ 
        ?>
        <form action="" class="product"> 
            <div class="image_product">
                <a href="product.php?id=<?php echo $row["id"];?>"><img src="images/<?=$row['Image']?>">
            </div>
            <div class="content">
                <h4 class="name"><?=$row['Nom']?></h4>
                <div class="sho">Chaussure pour homme</div>
                <h2 class="price"><?=$row['Prix']?> €</h2>
            </div>
        </form>

        <?php } ?>
       
    </section>
</body>
</html>

