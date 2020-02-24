<?php 
$titlepage = 'Adoption';

require('includes/head.php');
require('./includes/connexion.php');
$dbh = dbConnect();

?>

<header>		
        <link rel="stylesheet" type="text/css" href="css/set1.css" />
</header>

<section class="row">
    <div class="col xl8 offset-xl2 s12">
        <div class="container">
            <h6 class="col s12">
                <strong>Notre but est simple : trouver un toit à toutes ses petites truffes qui n’en ont pas, leur offrir le confort, la chaleur et l’amour d’un foyer pour la vie. <br><br>
                Vous souhaitez offrir une nouvelle vie à une de nos truffes ? <br>
                Vous êtes au bon endroit !</strong> <br>
                <br>
            </h6> <br>
        </div>  
    </div> 
</section> 

<section class="row">
    <div class="col xl8 offset-xl2 s12">
        <div class="container">
            <div id="myBtnContainer" class="menu2">
                <button id="all" class="btn">Tout</button>
                <button id="chien" class="btn">Chien</button>
                <button id="chat" class="btn">Chat</button>
                <button id="nac" class="btn">NAC</button>
            </div>
            
            <div class="animal col s12">
                <div class="grid">
                    <?php        
        
        $typeOfAnimal = "SELECT * FROM animaux WHERE id ORDER BY id DESC";
                
        $sth = $dbh->prepare($typeOfAnimal);
        $sth->execute();
        $animaux = $sth->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($animaux as $animal){                
            require('./fonctions/affichage.php');                
                
            echo    
            "<figure class='effect-sarah ".$animal['type']." '>"
                .$animal1.
                "<figcaption>
                    <h2><span>".$animal['nom']."</span></h2>
                    <p><strong>".$age."</strong> <br>
                    ".$animal['caractere']."</p>
                    <a href='view.php?id=".$animal['id']."'>View more</a>
                </figcaption>			
            </figure>";
                    
            }
        ?>
        
        </div>
    </div>


    <div class="col s12">
        
        <p class=" col l6 s12">
            <strong>Vous avez trouvez votre coup de coeur en photo ?</strong> Allez à sa rencontre ! <br>
            Contactez-nous sur les réseaux ou par mail pour nous parler de votre envie d'offrir un beau foyer à une petite truffes. <br>
            Nous organiserons une rencontre car c'est le plus important ! <br>
            
            <strong class="right">En savoir plus</strong>
            
            
            <p class="col l6 s12">
                <strong>Suivez-nous sur les réseaux</strong> <br>
                pour voir toutes nos petites truffes à l'adoption.
            Toutes nos truffes à l'adoption sont sur les réseaux sociaux <br>
            
            <div class="correction">
                <div id="facebook-logo"><a href="https://facebook.com/TruffesSansToit/"></a></div>
                <div id="instagram"><a href="https://instagram.com/truffes_sans_toit/"></a></div>
            </div>
        </p>

        <p class="col l12 s12"><br>
            Si le coup de coeur est confirmé, nous organiserons une pré-visite puis il faudra remplir le formulaire d'adoption. <br>       
        </p>
    </div>

    <div class="container" style="padding-bottom : 20px">
        <h6 class="col s12">
            Et nous vous souhaitons tout plein de bonheur avec votre petite truffe ! Merci <?= "<3" ?>
        </h6>    
    </div>

</section>


<?php require('includes/footer.php');