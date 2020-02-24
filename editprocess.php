<?php
// Connexion a la BDD
require('./includes/connexion.php');


// Verification du champ "nom de l'animal". 
// S'il est bien rentré avec des lettres, Et s'il a bien une majuscule a son début, SINON, en mettre une.
if (
    isset($_POST['nom'])
    && isset($_POST['type'])
    && isset($_POST['sexe'])
    && isset($_POST['birth'])
) {
    // /Déclaration des premières variables vérifiée
    $id = $_GET['id'];
    $nom = $_POST['nom'];
    $type = $_POST['type'];
    $sexe = $_POST['sexe'];
    $birth = $_POST['birth'];

    // verification des données rentrées
    if (
        is_string($nom)
        && is_string($type)
        && is_string($sexe)
        && is_string($birth)
    ){ 
        // verification des champs caracteres pour n'en faire qu'une seule entrée
        // créaction d'un tableau avec une boucle parcourant les 6 champs caracteres
        $caractere = [];
        for ($i = 1; $i <= 6; $i++) {
            // verification des champs caracteres grace à l'incrémentation.
            if (isset($_POST['caractere' . $i])) {
                if (!empty($_POST['caractere'.$i])){
                    $caractere[] = $_POST['caractere' . $i];
                }
            }
        }
    

    // Initialisation des Checkboxes
    $sterilise = 0;
    $identifie = 0;
    $vaccine = 0;
    $deparasite = 0;
    $pret = 0;
    $adopte = 0;

    // Verification des Checkboxes
    if (isset($_POST['sterilise'])) {
        $sterilise = 1;
    };
    if (isset($_POST['identifie'])) {
        $identifie = 1;
    };
    if (isset($_POST['vaccine'])) {
        $vaccine = 1;
    };
    if (isset($_POST['deparasite'])) {
        $deparasite = 1;
    };
    if (isset($_POST['pret'])) {
        $pret = 1;
    };
    if (isset($_POST['adopte'])) {
        $adopte = 1;
    };
    
    // Verification des photos
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        // creation d'un tableau pour la gestion des photos
        $photos = [] ;   
        for ($i = 1; $i <= 3; $i++) {
            if (isset($_FILES["photo".$i]) 
            && $_FILES["photo".$i]["error"] == 0) {
                if (!empty($_FILES['photo'.$i])){
                    $formatVerif = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png");
                    $nomFichier = $_FILES["photo".$i]["name"];
                    $typeFichier = $_FILES["photo".$i]["type"];
                    
                    // Vérifie l'extension du fichier
                    $ext = pathinfo($nomFichier, PATHINFO_EXTENSION);
                    if (!array_key_exists($ext, $formatVerif)) 
                    die("Erreur : Veuillez sélectionner un format de fichier valide.");
                    $nom_aleatoire = md5(uniqid()) . "." . $ext;
                    $photos[] = $nom_aleatoire;
                    // Vérifie le type MIME du fichier
                    if (in_array($typeFichier, $formatVerif)) {
                        // Vérifie si le fichier existe avant de le télécharger.
                        if (file_exists("img/photos/" . $nom_aleatoire)) {
                            die("une erreur est survenue réessayez plus tard");
                        } else {
                            move_uploaded_file($_FILES["photo".$i]["tmp_name"], "img/photos/" . $nom_aleatoire );
                            echo "Votre fichier a été téléchargé avec succès.";
                        }
                    } else {
                        echo "Erreur: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer.";
                    }
                }
            }
        }
        $photo1 = isset($photos[0]) ? $photos[0] : null;
        $photo2 = isset($photos[1]) ? $photos[1] : null;
        $photo3 = isset($photos[2]) ? $photos[2] : null;

    }
    var_dump($sterilise);
}
$dbh = dbConnect();

$sth = $dbh->prepare("UPDATE animaux SET nom = :nom, type = :type, sexe = :sexe, birth = :birth, sterilise = :sterilise, identifie = :identifie, vaccine = :vaccine, deparasite = :deparasite, pret = :pret, adopte = :adopte, caractere = :caractere, photo1 = :photo1, photo2 = :photo2, photo3 = :photo3 WHERE id = :id");

$sth->execute(
    [
        ":nom" => $nom,
        ":type" => $type,
        ":sexe" => $sexe,
        ":birth" => $birth,
        ":sterilise" => $sterilise,
        ":identifie" => $identifie,
        ":vaccine" => $vaccine,
        ":deparasite" => $deparasite,
        ":pret" => $pret,
        ":adopte" => $adopte,
        ":caractere" => join(", ", $caractere ),
        ":photo1" => $photo1,
        ":photo2" => $photo2,
        ":photo3" => $photo3,
        ":id" => $id,
        ]
    );
    header('location: ./admin.php');
        var_dump($sth->errorInfo());
}