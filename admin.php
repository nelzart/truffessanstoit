<!-- pour la base de donnée
truffessanstoit
bxGiw80vg9JCXuIu

        ID
    CHIEN || CHAT || NAC => nouveau animaux de compagnie
                => liste de choix
    nom => string
    genre => M ou F
    naissance => date
        Sterilisée ? checkbox
        indentifié ? checkbox
        Vacciné ? checkbox
        Déparasité ? checkbox

        Pret a rejoindre la famille ? 
                        si non => ne pas afficher l'animal

    Caractere
        => 6 traits a rentrer max
    
    PHOTOS 
        => jusqu'a 3

    Adopté => si oui, retirer l'animal de la liste visible des visiteurs

POUR L'AFFICHAGE ADMIN

    LISTE DES ANIMAUX
        => Fonction modifier
        => Fonction supprimer -->
<?php

$titlepage = "Gestion";
require('includes/head.php');

    if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
        header('location: ./verification.php');
        die;
    }
?>
<div class="container">
    <div class="row">
        <div class="col xl8 offset-xl2 s12">
            <h1 style="text-align: center">Gestion des animaux</h1>

            <form class="z-depth-2" action="submitprocess.php" method="POST" enctype="multipart/form-data">
                
                <label for="nom" class="left" require>Nom de l'animal</label>
                <input type="text" placeholder="nom" name="nom"><br>

                <label for="type">Type
                    <select name="type" name="type" require>
                        <option value="chien">Chien</option>
                        <option value="chat">Chat</option>
                        <option value="nac">NAC</option>
                    </select>
                </label>

                <label for="sexe">Genre
                    <select name="sexe" name="sexe" require>
                        <option value="male">Male</option>
                        <option value="femelle">Femelle</option>
                    </select>
                </label>

                <label for="birth" class="left">Date de Naissance</label>
                    <input type="text" name="birth" class="datepicker">
                <br>

                <label for="caractere" class="left">Caractère de l'animal <strong>(les champs ci-dessous sont optionnelles)</strong></label><br>
                <input type="text" placeholder="caractère 1" name="caractere1" class="col s12 m4">
                <input type="text" placeholder="caractère 2" name="caractere2" class="col s12 m4">
                <input type="text" placeholder="caractère 3" name="caractere3" class="col s12 m4">
                <input type="text" placeholder="caractère 4" name="caractere4" class="col s12 m4">
                <input type="text" placeholder="caractère 5" name="caractere5" class="col s12 m4">
                <input type="text" placeholder="caractère 6" name="caractere6" class="col s12 m4"> 
               
                <label class="col m6 s12">
                    <input type="checkbox" name="sterilise">
                    <span>cocher s'il est <strong>Stérilisé</strong></span>
                    </input>  
                </label><br>
               
                <label class="col m6 s12">
                    <input type="checkbox" name="identifie">
                    <span>cocher s'il est <strong>identifié</strong></span>
                    </input>  
                </label><br>
               
                <label class="col m6 s12">
                    <input type="checkbox" name="vaccine">
                    <span>cocher s'il est <strong>vacciné</strong></span>   
                    </input>  
                </label>              
                
                <label class="col m6 s12">
                    <input type="checkbox" name="deparasite">
                    <span>cocher s'il est <strong>déparasité</strong></span>
                    </input>  
                </label>    <br><br><br><br><br>           
            

                <!-- UPLOAD DES PHOTOS ! -->
                <div for="photo1" class="file-field input-field">
                    <div class="btn">
                        <span>photo 1</span>
                        <input type="file" id="photo1" name="photo1" 
                        accept="image/png, image/jpg, image/jpeg">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>       
                <div for="photo2" class="file-field input-field">
                    <div class="btn">
                        <span>photo 2</span>
                        <input type="file" id="photo2" name="photo2" 
                        accept="image/png, image/jpg, image/jpeg">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>       
                <div for="photo3" class="file-field input-field">
                    <div class="btn">
                        <span>photo 3</span>
                        <input type="file" id="photo3" name="photo3" 
                        accept="image/png, image/jpg, image/jpeg">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>       

                <label>
                    <input type="checkbox" name="pret">
                    <span>pret à rejoindre une famille ?</span>
                    </input>  
                </label><br>
                               
                <input class="btn right" type="submit" value="Send" name="ajouter"></input><br>
            </form>        
        </div>
    </div>
</div>

<section class="row">
    <div class="container">
    <div class="col l8 offset-l2 s12">
            <p>
                <ul class="aide_mission z-depth-2">
                <?php

            // Connexion a la BDD
                require('./includes/connexion.php');

                $dbh = dbConnect();

                $sth = $dbh->prepare('SELECT * FROM animaux WHERE id ORDER BY id DESC');
                $sth->execute();
                $animaux = $sth->fetchAll(PDO::FETCH_ASSOC);

                
                foreach($animaux as $animal){
                    
                    require('./fonctions/affichage.php');

                    echo "<li><strong>" .$animal['nom'] ." </strong><strong class='right' style='color:cornflowerblue;'> "
                     .$animal['pret'] . " </strong> <br>" .$animal['type'] . "  " .$animal['sexe'] ." " .$age . "
                    
                    <strong class='right'>
                        <a href='modification.php?id=".$animal['id']."' style='color:rgb(42, 182, 0);'>modifier </a>
                        <a href='./fonctions/suppr.php?id=".$animal['id']."' style='color:red;'>supprimer</a> 
                    </strong><br>" 
                    .$animal['sterilise'] . "   " .$animal['identifie'] . "   " .$animal['vaccine'] . "   " .$animal['deparasite'] . " 
                    
                    <br> <strong>caractère :</strong> " .$animal['caractere']. "<br> 
                    <div class='admin'>
                        " .$animal1. "
                        " .$animal2. "
                        " .$animal3. "
                    </div></li>";

                }
                    ?>
                </ul>
            </p>
        </div>  
    </div>
</section>


<?php

    require('includes/footer.php');