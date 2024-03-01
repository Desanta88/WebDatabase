<?php
    $newName=$_GET["name"];
    $newSurname=$_GET["surname"];
    $newAge=$_GET["age"];
    $newEmail=$_GET["email"];
    $newRunner=$_GET["speedrunner"];
    $server="localhost";
    $username="programma";
    $password="12345";
    $connection=new PDO("mysql:host=$server;dbname=speedrunning",$username,$password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query1="INSERT INTO person (Name,Surname,Age,Email,IdSpeedrunner) VALUES(:type,:type2,:type3,:type4,(SELECT Id FROM speedrunner WHERE Username=:type5))";
    $statement=$connection->prepare($query1);
    $statement->bindParam(":type",$newName,PDO::PARAM_STR);
    $statement->bindParam(":type2",$newSurname,PDO::PARAM_STR);
    $statement->bindParam(":type3",$newAge,PDO::PARAM_STR);
    $statement->bindParam(":type4",$newEmail,PDO::PARAM_STR);
    $statement->bindParam(":type5",$newRunner,PDO::PARAM_STR);
    $statement->execute();
    header("location:/WebDatabase/Person.php");
?>