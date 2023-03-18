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
    <title>ListeJeu Test</title>
    <style></style>

    
    <link rel="stylesheet" type="text/css" href="./styles/feuille1.css">
    <link rel="stylesheet" type="text/css" href="./styles/ToDoGame.css">


    <meta name="keywords" content="ToDo, Game">
    <meta name="author" content="AIRONE" >

</head>

<body>
    <?php
        include("./static/header.php");
    ?>

    <div class=main>
    <h3> Test</h3>
    <h6>switch</h6>
    <?php
    $sql_input="SELECT c_picture FROM console";
    $ans=readDB($mysqli,$sql_input);
    $k=$ans[0];

    $p=$k["c_picture"];

    echo "<img src=$p>";
    ?>


    <ul class="console">
        <li class=finished>
        <?php

        $sql_input="SELECT g_name,g_picture FROM posses INNER JOIN games USING (c_name,g_name) WHERE user_id=1 AND c_name=\"switch\" AND finished=2";
        $ans=readDB($mysqli,$sql_input);

    
        echo "<h3>"; 
        echo $ans[0]["g_name"];
        echo "</h3>";
        $k=$ans[0]["g_picture"];
        echo "<img src=$k>";
        
        ?>
        </li>
    

    </div class=main>

    <?php
        include("./static/footer.php");
    ?>

</body>