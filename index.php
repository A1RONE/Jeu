<?php
//affichage des erreurs côté PHP et côté MYSQLI
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
//Import du site - A completer
//require_once("./includes/constantes.php");      //constantes du site
require_once("./php/functions-DB.php");
$mysqli=connectionDB();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="fr">


<head>
    <meta charset="utf-8" />
    <title>ListeJeu</title>
    <style></style>

    <link rel="stylesheet" type="text/css" href="./styles/ToDoGame.css">
    <link rel="stylesheet" type="text/css" href="./styles/feuille1.css">


    <meta name="keywords" content="ToDo, Game">
    <meta name="author" content="AIRONE" >

</head>

<body>
    <?php
        include("./static/header.php");
    ?>

    <div class=main>

    <h3> Index</h3>
    <a href="UnfinishedGame.html">tout</a>
    <a href="test.php">test</a>
    
    </div class=main>

    <?php
        include("./static/footer.php");
    ?>

</body>