<?php
  //on démarre la session PHP
  session_start();
  // on vérifie que le formulaire a été envoyé
  if(!empty($_POST)){
  // on vérifie que les champs ont été  remplis
  if(isset($_POST["nom"],$_POST["description"]) && !empty($_POST["nom"]) && !empty($_POST["description"])){
    // le formulaire est complet 

 // on recupere les données en les protégeant
      $nom= strip_tags($_POST["nom"]);
      $descriptionn= strip_tags($_POST["description"]);
 //on enregistre en base de données 
// on commence par se connecter à la base de données 
 require_once "includes/connect.php";

 $sql= "INSERT INTO `service`(`nom`,`description`) VALUES(:nom , :descriptionn)";

 // on prepare la requete
 $query= $db ->prepare($sql);
 $query->bindValue(":nom",$nom , PDO::PARAM_STR);
 $query->bindValue(":descriptionn",$descriptionn , PDO::PARAM_STR);
 $query->execute();
 // on connectera l'utilsateur 
 //$id=$db->lastInsertId();
}
else{
    die("le formulaire est incompet");    
 }        
}
  

    ?>

     <!--end header-->

    <h1> Formulaire d'ajout de nouveaux services  </h1>
    <form class="form_conn"    method="post">
        <fieldset  class="fieldset_form_new_services">
            <div>
                <label for="nom">nom</label>
                <input type="text" name="nom_service"  id="service_name"> 
            </div> <br />
           
            <div>
                <label for="description">Description</label>
                <input type="text" name="description"  id="description">
            </div>
        </fieldset> <br />

        <button type="submit"> Enregistrer </button>
    </form>

</body>
</html>