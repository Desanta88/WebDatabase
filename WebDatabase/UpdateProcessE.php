<?php
    $name=$_GET["name"];
    $ey=$_GET["establishmentyear"];
    $sales=$_GET["sales"];
    $whereabouts=$_GET["whereabouts"];
    $server="localhost";
    $username="programma";
    $password="12345";
    $connection=new PDO("mysql:host=$server;dbname=speedrunning",$username,$password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $editor=$_GET["EditorU"];
    $query="UPDATE editor SET Name=:type,EstablishmentYear=:type2,Sales=:type3,Whereabouts=:type4 WHERE Name=:type5";
    $statement=$connection->prepare($query);
    $statement->bindParam(":type",$name,PDO::PARAM_STR);
    $statement->bindParam(":type2",$ey,PDO::PARAM_STR);
    $statement->bindParam(":type3",$sales,PDO::PARAM_STR);
    $statement->bindParam(":type4",$whereabouts,PDO::PARAM_STR);
    $statement->bindParam(":type5",$editor,PDO::PARAM_STR);
    $statement->execute();
    header("location:/WebDatabase/Editor.php");
?>
