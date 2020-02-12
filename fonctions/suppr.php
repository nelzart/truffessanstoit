<?php 
require('connexion.php');

$dbh = dbConnect();

$id=$_GET['id'];
$sth = $dbh->prepare("DELETE FROM `animaux` WHERE animaux.id='$id'");

header('location: ./admin.php');