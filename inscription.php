<?php require 'inc/header.php'; ?>

<?php  

if(!empty($_POST)){


    $errors= array();
 if(empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])){

    $errors["username"] ="votre nomd d'utilisateur est incorrect ( il doit etre alphanumérique)";
 }
  

  if(empty($_POST['password'])){
     $errors["password"] = "mot de passe non renseigné";
  }

  if(empty($_POST['nom'])){
    $errors["nom"] = "veullez renseigner votre nom";
 }
 if(empty($_POST['prenom'])){
    $errors["prenom"] = "Veuillez renseigner votre prenom";
 }

   if(empty($errors)){
 // On se connecte à base de données
  require_once 'bd.php';

  // on peut maintenant faire notre requete pour inscrire nos utilisateurs
  // pour cela on va utiliser les requetes preparées

  $req = $pdo->prepare("INSERT INTO `utilisateur` SET  username = ? , password = ? , nom = ? , prenom = ?");
  $password = password_hash($_POST['password'],PASSWORD_ARGON2ID);
  $req->execute([$_POST['username'], $password , $_POST['nom'], $_POST['prenom']]);

        die('Bienvenue'.'     '.$_POST['nom']);
 // on connecte l'utilisateur qui vient de créer son compte
  

    }
 //var_dump($errors);
 debug($errors);

// fin du traitement du if ( c-a-d le formaulaire a ete bien traite)   
}





?>





<h1 align="center">S'inscrire</h1>
<section class="container-fluid"  align ="center">
<form   method="POST" action="" class="formulaire" >
        <fieldset> 
            <div>
                <label for="">Nom utilisateur *</label>
                <input type="text" name="username"  id="username">
            </div> </br>
            <label for="">Mot de passe *</label>
                <input type="password" name="password" >
            </div> </br></br>
            <div>
                <label for="nom">Nom *</label>
                <input type="text" name="nom"  id="nom">
            </div> </br>
            <div>
                <label for="prenom">Prenom *</label>
                <input type="text" name="prenom"  id="prenom" >
            </div> </br>
            <div>
        </fieldset></br></br>
        <button type="submit" class="btn btn-primary"> S'inscrire </button>
    </form>
</section>





<?php  require 'inc/footer.php' ; ?>