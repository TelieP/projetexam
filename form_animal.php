<?php require 'inc/header.php'; ?>
<!--contenu du site-->
<?php 
if(!empty($_POST)){

    $errors = array();
    if(empty($_POST['prenom'])){
    
        $errors['prenom'] = "Nom de l'animal non rempli";
        
    }

    if(empty($_POST['etat'])){
    
        $errors['etat'] = "Champ ete non  rempli";
        }

    if(empty($errors)){
            // On se connecte à base de données
             require_once 'bd.php';
    // on  recupere les donnees grace a un requete prepare
    $req = $pdo->prepare("INSERT INTO `animal` SET  prenom = ? , etat= ? ");
    $req->execute([$_POST['prenom'], $_POST['etat']]);
  
          die('Animal enregistré');
  
      }
   //var_dump($errors);
   debug($errors);
    
}
// fin du traitement du if ( c-a-d le formaulaire a ete bien traite)   
?>
    <h1 class="h1_inscription"> AJOUT NOUVEL ANIMAL </h1>
    <form class="form_ajout_animal"    method="post">
        <fieldset  class="fieldset_ajout_animal">
            <div>
                <label for="">Prénom</label>
                <input type="text" name="prenom"  id="prenom">
            </div> </br></br>
            <div>
                <label for="etat">Etat</label>
                <input type="text"  name="etat" id="etat">
            </div>
        </fieldset> </br></br>
        <button type="submit"> Soumettre </button> </br></br>
        <button type="submit"> Liste des animaux  </button>
    </form>

<?php  require 'inc/footer.php' ; ?>