<?php

function dbConnect()
{
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=truffessanstoit;charset=utf8',
            'truffessanstoit', 'bxGiw80vg9JCXuIu');
    } catch (Exception $e){
        die($e->getMessage());
    }

    return $dbh;
}

