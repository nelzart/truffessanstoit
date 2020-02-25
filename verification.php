<?php
   
    include('includes/connexion.php');

    $titlepage = "Inscription";
    include('includes/head.php'); 

?>

<div class="container">
    <div class="row">
        <div class="col xl8 offset-xl2 s12">
        <form action="" method="post" class="z-depth-2">
            <label for="user">
                Utilisateur
                <input required type="text" name="user">
            </label>
            <label for="mdp" class="left">
                Mot de passe
            </label>
                <input required type="password" name="mdp" >

                <br>
                               
                <input class="btn right" type="submit" value="se connecter" name="ajouter"></input><br>
            </form>        
        </div>
    </div>
</div>
<br>

<?php


if (
    isset($_POST['user']) &&
    isset($_POST['mdp']) &&
    !empty($_POST['user']) &&
    !empty($_POST['mdp'])
) {
    //on vérifie que le mot de passe répété soit correct
    $user = $_POST['user'];
    $mdp = $_POST['mdp'];
    
    $dbh = dbConnect();

    //on tente de récupérer l'utilisateur assigné à cet username
    $sth = $dbh->prepare('SELECT id, mdp FROM admin WHERE user = :user');
    $sth->execute(
        [
            ':user' => $user
        ]
    );
    //si on trouve un utilisateur, on stocke son mdp haché dans $data
    $data = $sth->fetch();
    if ($data && password_verify($mdp, $data['mdp'])) {
        //une fois la vérification de mot de passe validée
        //on stocke l'id de l'user dans la session
        $_SESSION['user_id'] = $data['id'];
        header('location: ./admin.php');
    } else {
        // header('location: ./verification.php');
        echo "
                <div class='row'>
                    <div class='col m8 offset-m5 s12'>
                        <p class='red-text text-darken-4'><strong>une erreur de saisie est survenue !</strong></p>
                    </div>
                </div>";
    }
}


require('includes/footer.php');