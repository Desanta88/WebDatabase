<?php
    $title=$_GET["title"];
    $publisher=$_GET["publisher"];
    $publishingY=$_GET["publishingyear"];
    $timesSpeedrunned=$_GET["timesspeedrunned"];
    $server="localhost";
    $username="programma";
    $password="12345";
    $connection=new PDO("mysql:host=$server;dbname=speedrunning",$username,$password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query2="SELECT e.Id FROM editor e WHERE e.Name=:type";
    $data=$statement->fetchAll();
    $query1="INSERT INTO videogame v (v.Title,v.Publisher,v.PublishingYear,v.TimesSpeedrunned) VALUES(:type,:type2,:type3,:type4)";
    $statement=$connection->prepare($query2);
    $statement->bindParam(":type",$_GET["company"],PDO::PARAM_STR);
    $statement->execute();
    $statement=$connection->prepare($query1);
    $statement->bindParam(":type",$title,PDO::PARAM_STR);
    $statement->bindParam(":type2",$data,PDO::PARAM_STR);
    $statement->bindParam(":type3",$publishingY,PDO::PARAM_STR);
    $statement->bindParam(":type4",$timesSpeedrunned,PDO::PARAM_STR);
    $statement->execute();
    header("location:/WebDatabase/Videogame.php");
?>