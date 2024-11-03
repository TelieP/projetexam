<?php require 'inc/header.php'; ?>

<?php  
//on verifie si le formulaire a été envoyé
if(!empty($_POST)){
//on vérifie que tous les champs requis sont remplis
    if(isset($_POST["username"], $_POST["password"]) 
    && !empty($_POST["username"]  && !empty($_POST["password"])) 
     ){

        //on vérifie que l'utilisateur existe en base de données 
        //on se connecte à la base de donées
        require_once 'bd.php';
        $req= "SELECT * FROM `utilisateur` WHERE `username` = :username ";

        $query = $pdo->prepare($req);

        $query-> bindValue(":username",  $_POST["username"], PDO::PARAM_STR);

        $query->execute();

        $user = $query->fetch();

        if(!$user){
            die("l'utilisateur n'existent pas");
        }
        var_dump($user);
    //     // on a un user existant , on peut vérifier son mot de passe
    //     if(!password_verify($_POST["password"], $user["username"])){
    //         die("mot de passe n'existe pas");
    //     }
    //    //ici l'utilisateur et le mot de passe sont corrects
    //    // on va pouvoir connecter l'utilisateur
    //    //on demarre la session php avec le session-start
    //    session_start();

       //on va stocker dans $_SESSION les infos de l'utilisateur
       $_SESSION["user"] = [
            "id" => $user["id"],
            "pseudo" => $user["username"]
       ];
       var_dump($_SESSION);
     }

}

?>





<h1 align="center">Se connecter</h1>
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
        </fieldset></br></br>
        <button type="submit" class="btn btn-primary"> Se connecter </button>
    </form>
</section>





<?php  require 'inc/footer.php' ; ?>