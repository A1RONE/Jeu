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
            if (isset($_POST["console"])) {
                $console=$_POST["console"];
                $sql_input="SELECT g_name FROM games WHERE c_name=\"$console\"";
                $ans=readDB($mysqli,$sql_input);
                $sql_input="SELECT COUNT(*) AS c FROM games WHERE c_name=\"$console\"";
                $ans2=readDB($mysqli,$sql_input);
                $sql_input="SELECT user_id,username FROM users";
                $users=readDB($mysqli,$sql_input);
                $sql_input="SELECT COUNT(*) AS c FROM users";
                $usersN=readDB($mysqli,$sql_input);
        ?>

        <form method="POST">
            <?php
            echo "<input type=hidden name=\"console_v2\" value=".$_POST["console"].">";
            ?>
            <label for="user" type="text">User</label>
            <br>
            <select id="user" name="user">
                <?php
                    for ($i=0;$i<$usersN[0]["c"];$i++){
                        echo"<option value=".$users[$i]["user_id"].">";
                        echo$users[$i]["username"];
                        echo"</option>";
                    }
                ?>
            
            </select>
            <br><br>
            <label for="game" type="text">Game</label><br>
            <select id="game" name="game">
                <?php
                    for ($i=0;$i<$ans2[0]["c"];$i++){
                        echo"<option value".$ans[$i]["g_name"].">";
                        echo$ans[$i]["g_name"];
                        echo"</option>";
                    }
                ?>
            </select>
            <br><br>
            <label for="finished" type="text">Finished?</label><br>
            <select id="finished" name="finished">
                <option value="0">NO</option>
                <option value="1">STORY ONLY</option>
                <option value="2">YES</option>
            </select>
            <br><br>

            <input id="submit" type="submit" value="submit">

        </form>

        




        <?php
            }else{ 
        ?>




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
            <input id="submit" type="submit" value="submit">

        </form>
        <?php
            }
            if (isset($_POST["console_v2"]) && isset($_POST["user"]) && isset($_POST["game"]) && isset($_POST["finished"])) {
                $sql_input="INSERT INTO posses (c_name,g_name,user_id,finished) VALUES (\"".$_POST["console_v2"]."\",\"".$_POST["game"]."\",".$_POST["user"].",".$_POST["finished"].")";
                writeDB($mysqli, $sql_input);
            }
        ?>
        

        

    </div class=main>

<?php
    include("./static/footer.php");
?>

</body>
</html>