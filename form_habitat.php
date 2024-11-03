<?php require 'inc/header.php'; ?>
<!--contenu du site-->
<?php 
if(!empty($_POST)){

    $errors = array();
    if(empty($_POST['nom'])){
    
        $errors['nom'] = "Nom de l'habitat non rempli";
        
    }

    if(empty($_POST['description'])){
    
        $errors['description'] = "Champ description non  rempli";
        }

        if(empty($_POST['commentaire_habitat'])){
    
            $errors['commentaire_habitat'] = "Champ commentaire non  rempli";
            }

    if(empty($errors)){
            // On se connecte à base de données
             require_once 'bd.php';
    // on  recupere les donnees grace a un requete prepare
    $req = $pdo->prepare("INSERT INTO `habitat` SET  nom = ? , description = ?  , commentaire_habitat = ? ");
    $req->execute([$_POST['nom'], $_POST['description'], $_POST['commentaire_habitat']]);
  
          die('Habitat enregistré avec succès');
  
      }
   //var_dump($errors);
   debug($errors);
    
}
// fin du traitement du if ( c-a-d le formaulaire a ete bien traite)   
?>
    <h1 class="h1_habitat"> AJOUT NOUVEL HABITAT </h1>
    <form class="form_ajout_habitat"    method="post">
        <fieldset  class="fieldset_ajout_habitat">
            <div>
                <label for="">Nom</label>
                <input type="text" name="nom"  id="nom">
            </div> </br></br>
            <div>
                <label for="">Description</label>
                <input type="text"  name="description" id="description">
            </div>
            </br></br>
            <div>
                <label for="">Comentaire</label>
                <input type="textarea"  name="commentaire_habitat" id="commentaire_habitat">
            </div>
        </fieldset> </br></br>
        <button type="submit" style="border-radius: 8px;" style="background-color: mocassin";> Soumettre </button> </br></br>
    </form>

<?php  require 'inc/footer.php' ; ?>