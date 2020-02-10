<?php 
$titlepage = "Contact";

require('includes/head.php');
?>

<div class="container">
    <div class="row">
        <div class="col xl8 offset-xl2 l10 offset-l1 s12">
            <form class="z-depth-2" action="submitprocess.php" method="POST" enctype="multipart/form-data">
                <div class="input-field">
                    <input id="email" type="email" class="validate">
                    <label for="email">Email</label>
                </div>
                <div class="input-field">
                    <textarea id="textarea1" class="materialize-textarea"></textarea>
                    <label for="textarea1">Votre message</label>
                </div>
                <input class="btn right" type="submit" value="envoyer" name="ajouter"></input><br>
            </form>
        </div>
    </div>
</div>


<?php require('includes/footer.php');