<?php 
require_once 'config.php'; // Connexion à la base de données 
?>



<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscritpion</title>
    <link rel="stylesheet" href="css/style_form.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>

<body>
    <div class="container" id="container"> <!-- Page complete (HTML)-->
        <div class="form-container sign-up-container">
            <form id="form" action="inscription_traitement.php" method="POST">  <!-- Formulaire d'inscription (HTML)-->
                <h1>Creer un compte</h1>

                <div class="input-control">
                    <input name="nom" id="nom" type="text" placeholder="Nom">
                    <div class="error"></div>
                </div>

                <div class="input-control">
                    <input name="prenom" id="prenom" type="text" placeholder="Prenom">
                    <div class="error"></div>
                </div>

                <div class="input-control">
                    <input name="email" id="email" type="text" placeholder="email">
                    <div class="error"></div>
                </div>
                        
                <div class="input-control">
                    <input name="password" id="password" type="password" placeholder="Mot de passe">
                    <div class="error"></div>
                </div>

                <div class="input-control">
                    <input name="password2" id="password2" type="password" placeholder="Confirmez Mot de passe">
                    <div class="error"></div>
                </div>

                <button type="submit">S'inscrire</button> <!-- Bouton d'inscription -->

            </form>
        </div>

        <div class="form-container login-container">
            <form id="form2" action="" method="POST"> <!-- Formulaire de connexion (HTML)-->
                <?php
                    if(isset($_POST['Validate'])){
                        if(!empty($_POST['email2']) && !empty($_POST['password3'])) {
                            $email = htmlspecialchars($_POST['email2']);
                            $password = htmlspecialchars($_POST['password3']);
                            $email = strtolower($email); // email transformé en minuscule
                            $select = mysqli_query($conn, "SELECT * FROM utilisateurs WHERE Email = '$email' ") ;
                            $row = mysqli_num_rows($select) ;//Compter le nombre de ligne ayant rapport a la requette SQL
                            $query = mysqli_query($conn, "SELECT pass, Prenom FROM utilisateurs WHERE Email = '$email'");
                            // Vérification que la requête a réussi
                            if (!$query) {
                                die("Requête échouée: " . mysqli_error($conn));
                            }
                            // Récupération du résultat sous forme de tableau associatif
                            $resultat = mysqli_fetch_assoc($query);
                            @$hash = $resultat['pass'];
                            // Stockage du mot de passe dans une variable
                            
                            if($row > 0){
                                if (password_verify($password, $hash)) {
                                    // Mot de passe valide, on redirige vers la page d'accueil
                                    $_SESSION['user'] = $resultat['Prenom'];
                                    header("Location: landing.php");
                                    // Stockage de l'email de l'utilisateur dans une variable de session
                                    
                            }else {//si non
                                    $erreur = "Adresse Mail ou Mots de passe incorrectes !";
                                }
                            }
                        }
                    }
                ?>

                <h1>Se connecter</h1>

                <?php 
                    if(isset($erreur)){// si la variable $erreur existe , on affiche le contenu ;
                        echo "<p class= 'Erreur'>".$erreur."</p>"  ;
                    }
                ?>

                <div class="input-control2">
                    <input name="email2" id="email2" type="text" placeholder="Email">
                    <div class="error2"></div>
                </div>

                <div class="input-control2">
                    <input name="password3" id="password3" type="password" placeholder="Mot de passe">
                    <div class="error2"></div>
                </div>

                <button type="submit" name='Validate'>Se connecter</button> <!-- Bouton de connexion -->
                
            </form>
        </div>
            
        <div class="overlay-container"> <!-- Overlay pour les liaisons entre les deux formulaires -->
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Déjà parmis nous ?</h1>
                    <button class="ghost" id="signUp">Se connecter</button> <!-- Bouton de switch vers formulaire d'inscription -->
                </div>
                    
                <div class="overlay-panel overlay-right">
                    <h1>Pas de compte ?</h1>
                    <button class="ghost" id="login">Créer un compte</button> <!-- Bouton de switch vers formulaire de connexion -->
                </div>
            </div>
		</div>
    </div> <!-- Fermeture Page complete (HTML)-->

    

    
    <script src="js/animation.js" charset="utf-8"></script>
    <script src="js/Verif.js"></script>
</body>
</html>

<header>
        <style scoped>
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                scroll-behavior: smooth;
                font-family: 'Jost', sans-serif;
                list-style: none;
                text-decoration: none;  
            }

            header{
                position: fixed;
                width: 100%;
                height: 120px;
                top: 0;
                right: 0;
                z-index: 1000;
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 20px 10%;
                transition: all .42s ease;
                background-color: #2b2b2b;
            }

            .logo img{
                max-width: 150px;
                height: auto;
            }
            .navmenu{
                display: flex;
            }
            .navmenu a{
                color: white;
                font-size: 16px;
                text-transform: capitalize;
                padding: 10px 20px;
                font-weight: 400;
                transition: all .42s ease;
            }
            .navmenu a:hover{
                border-bottom: 4px solid bisque;
                padding-bottom: 20px;
                transform: scale(1.1);
            }

            .nav-icon{
                display: flex;
                align-items: center;
            }
            .nav-icon i{
                margin-right: 20px;
                color: white;
                font-size: 25px;
                font-weight: 400;
                transition: all .42s ease
            }
            .nav-icon i:hover{
                transform: scale(1.1);
                color: bisque;
            }
            #menu-icon{
                font-size: 35px;
                color: #2c2c2c;
                z-index: 10001;
                cursor: pointer;
            }


        </style>
        <a href="accueil.php" class="logo"><img src="images/logo.png" alt=""></a>

        <ul class="navmenu">
            <li><a href="accueil.php">Accueil</a></li>
            <li><a href="Homme.php">Homme</a></li>
            <li><a href="Femme.php">Femme</a></li>
            <li><a href="Enfant.php">Enfant</a></li>
            <li><a href="Contact.php">Contact</a></li>
        </ul>

        <div class="nav-icon">
            <a href="#"><i class='bx bx-search'></i></a>
            <a href="form.php"><i class='bx bx-user' ></i></a>
            <a href="panier.php"><i class='bx bx-cart' ></i></a>
        </div>
    </header>
