<?php
require('./includes/connexion.php');
$dbh = dbConnect();
if (!$_GET['id']) {
    header('location: ./adoption.php');
}

$id = $_GET['id'];
$sth = $dbh->prepare('SELECT * FROM animaux WHERE id = ?');
$sth->execute(array($id));
$animaux = $sth->fetchAll(PDO::FETCH_ASSOC);

foreach ($animaux as $animal) {
    $titlepage = $animal['nom'];
    require('./fonctions/affichage.php');

    require('includes/head.php');
?>
 <div class="container">
        <div class="row">
            <div class="col xl8 offset-xl2 s12">
                <div class="content z-depth-2">
                    <img class="couv" src="img/photos/<?= $animal['photo1'] ?>"></img>
                    <span class="textContent"> 
                        <h4><strong><?= $animal['nom'] ?></strong></h4>
                        <h5><?= $age ?></h5>
                        <p><?="<strong>" . $animal['nom']. "</strong> est ".  $animal['caractere'] ?>. <br>
                        <h6>côté santé</h6></p>
                        <ul class="medic"> 
                            <li><?= $animal['sterilise'] ?></li>
                            <li><?= $animal['deparasite'] ?></li>
                            <li><?= $animal['vaccine'] ?></li>
                            <li><?= $animal['identifie'] ?></li>                    
                        </ul>

                        <p>pour adopter notre petite truffe, vous pouvez nous contacter directement en remplissant ce formulaire. </p>
                    </span>
                </div>



            
        </div>
    </div>
</div>

<?php 
}
require('includes/footer.php');