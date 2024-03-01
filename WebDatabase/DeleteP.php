<?php
    $server="localhost";
    $username="programma";
    $password="12345";
    $connection=new PDO("mysql:host=$server;dbname=speedrunning",$username,$password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $choosenPerson=explode("-",$_GET["PersonD"]);
    $name=$choosenPerson[0];
    $surname=$choosenPerson[1];
    $runner=$choosenPerson[2];
    $query="DELETE FROM person WHERE Name=:type AND Surname=:type2 AND IdSpeedrunner=(SELECT Id FROM speedrunner WHERE Username=:type3 )";
    $statement=$connection->prepare($query);
    $statement->bindParam(":type",$name,PDO::PARAM_STR);
    $statement->bindParam(":type2",$surname,PDO::PARAM_STR);
    $statement->bindParam(":type3",$runner,PDO::PARAM_STR);
    $statement->execute();
    header("location:/WebDatabase/Person.php");
?>
