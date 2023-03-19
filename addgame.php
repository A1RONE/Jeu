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

        <?php
            $sql_input="SELECT c_name FROM console";
            $ans=readDB($mysqli,$sql_input);
            $sql_input="SELECT COUNT(*) AS c FROM console";
            $ans2=readDB($mysqli,$sql_input);

        ?>


        <form method="POST">
            <label for="console" type="text">Console</label>
            <br>
            <select id="console" name="console">
                <?php
                    for ($i=0;$i<$ans2[0]["c"];$i++){
                        echo"<option value".$ans[$i]["c_name"].">";
                        echo$ans[$i]["c_name"];
                        echo"</option>";
                    }
                ?>
            </select>
            <br>
            <br>
            <label for="name" type="text">Name</label>
            <br>
            <input id="name" type="text" name="name">
            <br>
            <br>
            <label for="img" type="text">Picture</label>
            <br>
            <input id="img" type="text" name="img">
            <br><br>
            <input id="submit" type="submit" value="submit">
        </form>


        <?php
            if (isset($_POST["name"]) && isset($_POST["img"])){
            echo 'console :'.$_POST['console'].'<br>';
            echo 'Nom :'.$_POST["name"].'<br>';
            echo '<img src='.$_POST["img"].'><br>';
            $sql_input="INSERT INTO games (c_name,g_name,g_picture) VALUES (\"".$_POST['console']."\",\"".$_POST["name"]."\",\"".$_POST["img"]."\")";
            echo $sql_input;
            
                writeDB($mysqli, $sql_input);
            }
        ?>
    </div class=main>

    <?php
        include("./static/footer.php");
    ?>

</body>
</html>