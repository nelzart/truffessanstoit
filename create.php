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
            <label class="left">
                vérification mot de passe
            </label>
                <input required type="password" name="mdp_repeat">

                <br>
                               
                <input class="btn right" type="submit" value="Create" name="ajouter"></input><br>
            </form>        
        </div>
    </div>
</div>

<?php


if (
    isset($_POST['user']) &&
    isset($_POST['mdp']) &&
    isset($_POST['mdp_repeat']) &&
    !empty($_POST['user']) &&
    !empty($_POST['mdp']) &&
    !empty($_POST['mdp_repeat'])   
)  {
    //on vérifie que le mot de passe répété soit correct
    if ($_POST['mdp'] == $_POST['mdp_repeat']){
        $user = $_POST['user'];
        //on hache le mot de passe avant de le stocker en bdd
        $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

        //connexion a la db et recuperation du database handler de PDO
        $dbh = dbConnect();

        $sth = $dbh->prepare('INSERT INTO admin (user, mdp) VALUES (:user, :mdp)');
        $sth->execute(
            [
                ':user' => $user,
                ':mdp' => $mdp
            ]
        );
        //errorInfo permet de connaitre la nature de l'execution de notre requête
        //si tout s'est déroulé correctement ou pas
        $error_info = $sth->errorInfo(); //errorInfo renvoie un tableau à 3 cases
        //la premiere case contient le code SQLSTATE décrivant l'état de la requête, en une string sur 5 caractères
        //la seconde contient, si SQLSTATE décrit une erreur, le code d'erreur SQL, en int
        //la troisieme case contient, si SQLSTATE décrit une erreur, le message d'erreur SQL en string
        //le code SQLSTATE de "tout va bien" est "00000"
        if ($error_info[0] != "00000"){ //si tout ne va pas bien
            //on vérifie si le code d'erreur est celui de la contrainte d'unicité
            if ($error_info[1] == 1062){
                echo "Un utilisateur existe déjà avec ce pseudo";
            } else {
                //sinon on affiche un message générique
                echo "Une erreur est survenue, reessayez plus tard";
            }
        }
    }
}

require('includes/footer.php');