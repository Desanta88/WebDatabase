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
    $runner=$_GET["SpeedrunnerD"];
    $query="DELETE FROM speedrunner WHERE Username=:type";
    $statement=$connection->prepare($query);
    $statement->bindParam(":type",$runner,PDO::PARAM_STR);
    $statement->execute();
    header("location:/WebDatabase/Speedrunner.php");
?>
