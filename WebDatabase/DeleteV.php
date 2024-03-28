<?php
    session_start();
    if(isset($_SESSION['User'])==false){
        header("location:/WebDatabase/index.html");
    }
?>
<?php
    $server="localhost";
    $username="programma";
    $password="12345";
    $connection=new PDO("mysql:host=$server;dbname=speedrunning",$username,$password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $game=$_GET["VideogameD"];
    $query="DELETE FROM videogame WHERE Title=:type";
    $statement=$connection->prepare($query);
    $statement->bindParam(":type",$game,PDO::PARAM_STR);
    $statement->execute();
    header("location:/WebDatabase/Videogame.php");
?>
