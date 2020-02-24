<?php 
require('../includes/connexion.php');

$dbh = dbConnect();

$id = $_GET['id'];

$sth = $dbh->prepare('DELETE FROM animaux WHERE id = ?');
$sth->execute([$id]);

header('location: ../admin.php');