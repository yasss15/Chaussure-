<?php include_once('footer.php');?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Nya</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>
<body>
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
            body{
                background-image: url("FondD.jpg");
                background-size: cover;
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
            }

            header:hover{
                background-color: #FA5B24;
                opacity: 1;
                transition: all .42s ease;
            }

            .logo img{
                max-width: 90px;
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
                border-bottom: 4px solid black;
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
                color: black;
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

</body>

</html>

    