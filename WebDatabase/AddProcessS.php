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
    $query="INSERT INTO speedrunner (Username,Nationality,Gender,TotalSpeedruns) VALUES(:type,:type2,:type3,:type4)";
    $statement=$connection->prepare($query);
    $statement->bindParam(":type",$user,PDO::PARAM_STR);
    $statement->bindParam(":type2",$nationality,PDO::PARAM_STR);
    $statement->bindParam(":type3",$gender,PDO::PARAM_STR);
    $statement->bindParam(":type4",$totalSpeedruns,PDO::PARAM_STR);
    $statement->execute();
    header("location:/WebDatabase/Speedrunner.php");
?>