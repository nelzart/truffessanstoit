<?php
require('./includes/connexion.php');
$dbh = dbConnect();

$id = $_GET['id'];
$sth = $dbh->prepare('SELECT * FROM animaux WHERE id = ?');
$sth->execute(array($id));
$animaux = $sth->fetchAll(PDO::FETCH_ASSOC);

foreach ($animaux as $animal) {
    $titlepage = "Modification de " . $animal['nom'];

    require('includes/head.php');
?>

    <div class="container">
        <div class="row">
            <div class="col xl8 offset-xl2 s12">
                <h1 style="text-align: center">Gestion de <?= $animal['nom'] ?></h1>

                <form class="z-depth-2" action="editprocess.php?id=<?=$animal['id']?>" method="POST" enctype="multipart/form-data">
                    <label class="right">
                        <input type="checkbox" name="adopte" 
                        <?php if ($animal['adopte'] == 1) {
                                echo "checked";
                               } ?>>
                        <span>est-il/elle <strong>adopté(e) ?</strong> </span>
                        </input>
                    </label>

                    <label for="nom" class="left" require></label>
                    <input type="text" placeholder="nom" name="nom" value="<?= $animal['nom'] ?>"><br>

                    <label for="type">Type
                        <select name="type" name="type" require>
                            <option value="chien" <?php if ($animal['type'] == 'chien') {
                                                        echo "selected";
                                                    } ?>>Chien</option>
                            <option value="chat" <?php if ($animal['type'] == 'chat') {
                                                        echo "selected";
                                                    } ?>>Chat</option>
                            <option value="nac" <?php if ($animal['type'] == 'nac') {
                                                    echo "selected";
                                                } ?>>NAC</option>
                        </select>
                    </label>
                    <!-- faire un IF -->
                    <label for="sexe">Genre
                        <select name="sexe" name="sexe" value="<?php echo $animal['sexe'] ?>" require>
                            <option value="male" <?php if ($animal['sexe'] == 'male') {
                                                    echo "selected";
                                                } ?>>Male</option>
                            <option value="femelle"<?php if ($animal['sexe'] == 'femelle') {
                                                    echo "selected";
                                                } ?>>Femelle</option>
                        </select>
                    </label>

                    <label for="birth" class="left">Date de Naissance</label>
                    <input type="text" name="birth" class="datepicker" value="<?=  $animal['birth'] ?>">
                    <br>

                    <label for="caractere" class="left">Caractère de l'animal <strong>(les champs ci-dessous sont optionnelles)</strong></label><br>
                    <?php
                     $caracteres = $animal['caractere'];
                     $caractere = explode(", ", $caracteres);
                    for($i=0; $i<6; $i++){
                        ?>
                        <input type="text" placeholder="caractère <?=$i+1?>" name="caractere<?=$i+1?>" class="col s12 m4"
                        <?php
                            if (isset($caractere[$i])){
                                echo "value=".$caractere[$i];
                            }
                        ?>>
                    <?php
                    }
                    ?>
                    <label class="col m6 s12">
                        <input type="checkbox" name="sterilise" 
                        <?php if ($animal['sterilise'] == 1) {
                                echo "checked";
                               } ?>>
                        <span>cocher s'il est <strong>Stérilisé</strong></span>
                        </input>
                    </label><br>

                    <label class="col m6 s12">
                        <input type="checkbox" name="identifie"
                        <?php if ($animal['identifie'] == 1) {
                                echo "checked";
                               } ?>>
                        <span>cocher s'il est <strong>identifié</strong></span>
                        </input>
                    </label><br>

                    <label class="col m6 s12">
                        <input type="checkbox" name="vaccine"
                        <?php if ($animal['vaccine'] == 1) {
                                echo "checked";
                               } ?>>
                        <span>cocher s'il est <strong>vacciné</strong></span>
                        </input>
                    </label>

                    <label class="col m6 s12">
                        <input type="checkbox" name="deparasite"
                        <?php if ($animal['deparasite'] == 1) {
                                echo "checked";
                               } ?>>
                        <span>cocher s'il est <strong>déparasité</strong></span>
                        </input>
                    </label> <br><br><br><br><br>


                    <!-- UPLOAD DES PHOTOS ! -->
                    <div for="photo1" class="file-field input-field">
                        <div class="btn">
                            <span>photo 1</span>
                            <input type="file" id="photo1" name="photo1" accept="image/png, image/jpg, image/jpeg">
                        </div>
                        <img class="hide" src="img/photos/<?=$animal['photo1']?>"/>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" value="<?= $animal['photo1'] ?>">
                        </div>
                    </div>
                    <div for="photo2" class="file-field input-field">
                        <div class="btn">
                            <span>photo 2</span>
                            <input type="file" id="photo2" name="photo2" accept="image/png, image/jpg, image/jpeg">
                        </div>
                        <img class="hide" src="img/photos/<?=$animal['photo2']?>"/>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" value="<?= $animal['photo2'] ?>">
                        </div>
                    </div>
                    <div for="photo3" class="file-field input-field">
                        <div class="btn">
                            <span>photo 3</span>
                            <input type="file" id="photo3" name="photo3" accept="image/png, image/jpg, image/jpeg">
                        </div>
                        <img class="hide" src="img/photos/<?=$animal['photo3']?>"/>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" value="<?= $animal['photo3'] ?>">
                        </div>
                    </div>

                    <label>
                        <input type="checkbox" name="pret"
                        <?php if ($animal['pret'] == 1) {
                                echo "checked";
                               } ?>>
                        <span>pret à rejoindre une famille ?</span>
                        </input>
                    </label>
                    <br>

                    <input class="btn right" type="submit" value="Send" name="ajouter"></input><br>
                </form>
            </div>
        </div>
    </div>

<?php
}



    
require('includes/footer.php');
