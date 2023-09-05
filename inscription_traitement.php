<?php
require_once 'config.php';  // Connexion à la base de données


// Récupération des données du formulaire et vérification que les valeurs existent bien
if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password2'])) {

  $nom = htmlspecialchars($_POST['nom']);
  $prenom = htmlspecialchars($_POST['prenom']);
  $email = htmlspecialchars($_POST['email']);
  $password = htmlspecialchars($_POST['password']);
  $password2 = htmlspecialchars($_POST['password2']);

  // On vérifie si l'utilisateur existe déjà pour éviter une réinscription
  $check =  "SELECT * FROM `utilisateurs` WHERE Email = ?";
  $stmt = mysqli_prepare($conn, $check);
  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_array($result);

  if($row == null) {
    // On hash le mot de passe avec Bcrypt, via un coût de 12

    $cost = [
      'cost' => 12,
    ];
    $passwordhash = password_hash($password, PASSWORD_BCRYPT,$cost);

    $insert = "INSERT INTO utilisateurs (ID, Nom , Prenom, Email , Pass) VALUES (null, '".$nom."','".$prenom."','".$email."','".$passwordhash."')";
    if (mysqli_query($conn, $insert)) {
      echo "Compte enregistré avec succès. Veuillez desormais vous connecter. Redirection dans 3 secondes...";
      // Ajouter un délai de 2 secondes avant la redirection vers session.php
      header("refresh:4;url=form.php");
    } else {
      echo "Erreur : " . $query . "<br>" . mysqli_error($conn);
    }
  } else {
    echo "Un compte avec cette adresse email existe déjà. Veuillez vous connecter ou utiliser une adresse email différente. Redirection dans 3 secondes...";
    header("refresh:6;url=form.php");
  }
}
?>
