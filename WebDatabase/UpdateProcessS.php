<?php
    session_start();
    if(isset($_SESSION['User'])==false){
        header("location:/WebDatabase/index.html");
    }
?>
<?php
    $user=$_GET["username"];
    $nationality=$_GET["nationality"];
    $gender=$_GET["gender"];
    $totalSpeedruns=$_GET["totalspeedruns"];
    $server="localhost";
    $username="programma";
    $password="12345";
    $connection=new PDO("mysql:host=$server;dbname=speedrunning",$username,$password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $runner=$_GET["SpeedrunnerU"];
    $query="UPDATE speedrunner SET Username=:type,Nationality=:type2,Gender=:type3,TotalSpeedruns=:type4 WHERE Username=:type5";
    $statement=$connection->prepare($query);
    $statement->bindParam(":type",$user,PDO::PARAM_STR);
    $statement->bindParam(":type2",$nationality,PDO::PARAM_STR);
    $statement->bindParam(":type3",$gender,PDO::PARAM_STR);
    $statement->bindParam(":type4",$totalSpeedruns,PDO::PARAM_STR);
    $statement->bindParam(":type5",$runner,PDO::PARAM_STR);
    $statement->execute();
    header("location:/WebDatabase/Speedrunner.php");
?>
