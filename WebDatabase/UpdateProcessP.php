<?php
    $newName=$_GET["name"];
    $newSurname=$_GET["surname"];
    $newAge=$_GET["age"];
    $newEmail=$_GET["email"];
    $newRunner=$_GET["speedrunner"];
    $choosenPerson=explode("-",$_GET["PersonU"]);
    $name=$choosenPerson[0];
    $surname=$choosenPerson[1];
    $runner=$choosenPerson[2];
    $server="localhost";
    $username="programma";
    $password="12345";
    $connection=new PDO("mysql:host=$server;dbname=speedrunning",$username,$password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $game=$_GET["VideogameU"];
    $query="UPDATE person p SET p.Name=:type,p.Surname=:type2,p.Age=:type3,p.Email=:type4,p.IdSpeedrunner=(SELECT Id FROM speedrunner WHERE Username=:type5) WHERE p.Name=:type6 AND p.Surname=:type7 AND p.IdSpeedrunner=(SELECT Id FROM speedrunner WHERE Username=:type8)";
    $statement=$connection->prepare($query);
    $statement->bindParam(":type",$newName,PDO::PARAM_STR);
    $statement->bindParam(":type2",$newSurname,PDO::PARAM_STR);
    $statement->bindParam(":type3",$newAge,PDO::PARAM_STR);
    $statement->bindParam(":type4",$newEmail,PDO::PARAM_STR);
    $statement->bindParam(":type5",$newRunner,PDO::PARAM_STR);
    $statement->bindParam(":type6",$name,PDO::PARAM_STR);
    $statement->bindParam(":type7",$surname,PDO::PARAM_STR);
    $statement->bindParam(":type8",$runner,PDO::PARAM_STR);
    $statement->execute();
    header("location:/WebDatabase/Person.php");
?>