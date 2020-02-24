<?php
    //on inclus nos fonctions de db
    //include permet d'inclure un morceau de page
    //require est un équivalent d'include qui indique la nécessité de la page a inclure
    //require_once indique que la page n'a besoin d'être inclue qu'une fois
    include('includes/connexion.php');
    // au chargement de la page on entame la session
    $titlepage = "Inscription";
    include('includes/head.php'); 
    //on vérifie que l'utilisateur ne soit pas déjà connecté
    if (isset($_SESSION['user_id'])){
        //on redirige l'utilisateur si c'est le cas
        header('Location: index.php');
    }
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
    if ($data = $sth->fetch()) {
        if (password_verify($mdp, $data['mdp'])){
            //une fois la vérification de mot de passe validée 
            //on stocke l'id de l'user dans la session
            $_SESSION['user_id'] = $data['id'];
            header('location: ./admin.php');
        } else {
            // header('location: ./verification.php');
            echo "une erreur de saisie est survenue";
        }
    }
}


require('includes/footer.php');