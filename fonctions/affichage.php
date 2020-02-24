<?php
    

    // sterilisé ? Si oui, affcher, si non, ne rien afficher
    if ($animal['sterilise'] == 1 ){
            $animal['sterilise'] = "stérilisé";
            if ($animal['sexe'] == "femelle") {
            $animal['sterilise'] = "stérilisée";
        }
    } else {
            $animal['sterilise'] = "";
    }

    // identifié ? Si oui, affcher, si non, ne rien afficher
    if ($animal['identifie'] == 1 ){
        $animal['identifie'] = "identifié";
        if ($animal['sexe'] == "femelle") {
            $animal['identifie'] = "identifiée";
        }
    } else {
        $animal['identifie'] = "";
    }

    // vacciné ? Si oui, affcher, si non, ne rien afficher
    if ($animal['vaccine'] == 1 ){
        $animal['vaccine'] = "vacciné";
        if ($animal['sexe'] == "femelle") {
            $animal['vaccine'] = "vaccinée";
        }
    } else {
        $animal['vaccine'] = "";
    }

    // déparasité ? Si oui, affcher, si non, ne rien afficher
    if ($animal['deparasite'] == 1 ){
        $animal['deparasite'] = "déparasité";
        if ($animal['sexe'] == "femelle") {
            $animal['deparasite'] = "déparasitée";
        }
    } else {
        $animal['deparasite'] = "";
    }
    
    // Si photo, afficher celle-ci, sinon ne rien afficher
        if ($animal['photo1'] == NULL ){
            $animal1 = "";
        } else {
            $animal1 = "<img src='img/photos/" .$animal['photo1']. "'></img>" ;
        }
        if ($animal['photo2'] == NULL ){
            $animal2 = "";
        } else {
            $animal2 = "<img src='img/photos/" .$animal['photo2']. "'></img>" ;
        }
        if ($animal['photo3'] == NULL ){
            $animal3 = "";
        } else {
            $animal3 = "<img src='img/photos/" .$animal['photo3']. "'></img>" ;
        }
    
    

    // pret a rejondre une famille ? Si oui, affcher, si non, ne rien afficher
    
    if ($animal['pret'] == 1 ){
        $animal['pret'] = "pret à l'adoption";
        if ($animal['sexe'] == "femelle") {
            $animal['pret'] = "prête à l'adoption";
        }} else {
        $animal['pret'] = "pas pret à l'adoption";
        if ($animal['sexe'] == "femelle") {
            $animal['pret'] = "pas prete à l'adoption";
        }
    }
    if ($animal['adopte'] == 1 ){
        $animal['pret'] = "adopté";
        if ($animal['sexe'] == "femelle") {
            $animal['pret'] = "adoptée";
    }}

    // Calcule de l'age de l'animal
        $birth = $animal['birth'];    
        $birthday = new DateTime($birth);
        $diff = $birthday->diff(new DateTime());
        $months = $diff->format('%m') + 12 * $diff->format('%y');

    // transformation de l'age en STRING
        if ($months > 11){
            $age = floor($months/12) . " an(s)";
        } else {
            $age = $months . " mois";
        }

