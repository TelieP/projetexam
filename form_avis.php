
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avis</title>
    <style>
         fieldset{
            justify-content: center;
            width: 25%;
            margin-left: 25%;
            border-radius: 25px;
            background-color: moccasin;
        }
    </style>
</head>
<body>
<h1> NOUVEAU AVIS </h1>
    <form  method="POST" action="" >
        <fieldset  >
            <div>
                <label for="pseudo">Pseudo*</label>
                <input type="text" name="pseudo"  id="pseudo" required >
            </div> </br>
            <label for="commentaire">Commentaire *</label>
                <input type="textarea" name="commentaire"  id="commentaire" required >
            </div> </br></br>
        </fieldset>
        <button type="submit"> Sauvegarder </button>
    </form>

<?php
$servername = "localhost";
$username = "root";
$password ="";

try{
    $bdd = new PDO("mysql:host=$servername;dbname=zoo_db", $username,$password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pseudo_user = strip_tags($_POST["pseudo"]);
    $commentaire = strip_tags($_POST["commentaire"]);


    $requete = $bdd->prepare("INSERT INTO  `avis`  (`pseudo`, `commentaire`)  VALUES(:pseudo_user, :commentaire)");
    $requete->bindValue(':pseudo_user', $_POST["pseudo"], PDO::PARAM_STR);
    $requete->bindValue(':commentaire', $_POST["commentaire"], PDO::PARAM_STR);
    $requete->execute();
    

}
catch(PDOException $e){
    echo "Erreur :" .$e->getMessage();
}
?>

</body>
</html>