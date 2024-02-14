<?php
    $username=$_GET["username"];
    $password=$_GET["password"];
    $hash=sha1($password);
    $connection=new PDO("mysql:host=localhost;dbname=speedrunning","programma","12345");
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query='SELECT * FROM utenti WHERE utenti.Username=:type;';
    $statement=$connection->prepare($query);
    $statement->bindParam(':type', $username, PDO::PARAM_STR);
    $statement->execute();
    $data=$statement->fetchAll();
    if(empty($data)==true){
        $queryInsert='INSERT INTO utenti(Username,Password) VALUES(:type,:type2)';
        $statement=$connection->prepare($queryInsert);
        $statement->bindParam(':type', $username, PDO::PARAM_STR);
        $statement->bindParam(':type2', $hash, PDO::PARAM_STR);
        $statement->execute();
        header("location:/WebDatabase/index.html");
    }
    else
        echo "utente già registrato";
?>