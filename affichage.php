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
        $user_id=1;
        if (isset($_POST["console"])){
            for ($i=2;$i>=0;$i-=1){
                $sql_input="SELECT g_name,g_picture FROM posses INNER JOIN games USING (c_name,g_name) WHERE user_id=".$_POST["user"]." AND c_name=\"".$_POST["console"]."\" AND finished=".$i." ORDER BY g_name";
                $ans=readDB($mysqli,$sql_input);
                $sql_input="SELECT COUNT(*) AS c FROM posses INNER JOIN games USING (c_name,g_name) WHERE user_id=".$_POST["user"]." AND c_name=\"".$_POST["console"]."\" AND finished=".$i." ORDER BY g_name";
                $ansN=readDB($mysqli,$sql_input)[0]["c"];
                $state="game";
                
                if ($i==2){
                    $state="finished";
                }elseif($i==1){
                    $state="game";
                }else{
                    $state="unfinished";
                }
                
                echo "<ul class=\"console\">";
                for ($j=0;$j<$ansN;$j++){
                    echo "<li class=\"".$state."\"><h3>".$ans[$j]["g_name"]."</h3><img src=".$ans[$j]["g_picture"].">";
                }

                echo"</li></ul><br>";

            }

        }else{
            $sql_input="SELECT c_name FROM console";
            $ans=readDB($mysqli,$sql_input);
            $sql_input="SELECT COUNT(*) AS c FROM console";
            $ans2=readDB($mysqli,$sql_input);
    ?>
    <form method="POST">
        <select id="user" name="user">
            <option value="1">AIRONE</option>
            <option value="2">Lucilink</option>
            <option value="3">Hoek</option>
        </select>
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
    ?>






    </div class=main>

<?php
    include("./static/footer.php");
?>

</body>
</html>