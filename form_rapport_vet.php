<?php require 'inc/header.php'; ?>
<!--contenu du site-->
<?php 
if(!empty($_POST)){

    $errors = array();

    if(empty($_POST['animal'])){
    
        $errors['animal'] = "Champs animal non rempli";
        
    }
    if(empty($_POST['role'])){
    
        $errors['role'] = "Champs role non rempli";
        
    }

    if(empty($_POST['date'])){
    
        $errors['date'] = "Date non rempli";
        
    }

    if(empty($_POST['detail'])){
    
        $errors['detail'] = "Champ detai non  rempli";
        }

    if(empty($errors)){
            // On se connecte à base de données
             require_once 'bd.php';
    // on  recupere les donnees grace a un requete prepare
    $req = $pdo->prepare("INSERT INTO `rapport_veterinaire` SET  date = ? , detail = ?");
    $req->execute([$_POST['date'], $_POST['detail']]);
  
          die('Rapport  enregistré avec succès');
  
      }
   //var_dump($errors);
   debug($errors);
    
}
// fin du traitement du if ( c-a-d le formaulaire a ete bien traite)   
?>
    <h1 class="h1_habitat"> AJOUT D'UN RAPPORT  VETERINAIRE </h1>
    <form class="form_ajout_vet"    method="post">
        <fieldset  class="fieldset_ajout_vet">
        <div>
                <label for="">Animal</label>
                <input type="text" name="animal">
            </div> </br>
            <div>
                <label for="">Utilisateur</label>
                <input type="text" name="role">
            </div> </br>
            <div>
                <label for="">Date</label>
                <input type="date" name="date"  id="date">
            </div> </br>
            <div>
                <label for="">Detail</label>
                <input type="text"  name="detail" id="detail">
            </div>
            </br>
        </fieldset> </br></br>
        <button type="submit" style="border-radius: 8px;" style="background-color: mocassin";> Soumettre </button> </br></br>
    </form>

<?php  require 'inc/footer.php' ; ?>