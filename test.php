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
    $sql_input="SELECT g_name,g_picture FROM posses INNER JOIN games USING (c_name,g_name) WHERE user_id=1 AND c_name=\"switch\" AND finished=2 ORDER BY g_name";
    $ans=readDB($mysqli,$sql_input);
    $ans2=readDB($mysqli,"SELECT COUNT(*) AS c FROM posses INNER JOIN games USING (c_name,g_name) WHERE user_id=1 AND c_name=\"switch\" AND finished=2 ORDER BY g_name;")[0]["c"];
    print_r($ans);
    echo "<br>$ans2";
    ?>

    
    </ul>
    <br>
    <ul class="console">
        <?php
        
            for ($i=0; $i<$ans2; $i++){
                echo "<li class=finished>";
                echo "<h3>"; 
                echo $ans[$i]["g_name"];
                echo "</h3>";
                echo "<img src="; 
                echo $ans[$i]["g_picture"];
                echo ">";
            }
        ?>
    </li>
    </ul>

    </div class=main>

    <?php
        include("./static/footer.php");
    ?>

</body>