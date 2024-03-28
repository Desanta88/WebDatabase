<?php
    session_start();
    if(isset($_SESSION['User'])==false){
        header("location:/WebDatabase/index.html");
    }
?>
<?php
    $title=$_GET["title"];
    $publishingY=$_GET["publishingyear"];
    $timesSpeedrunned=$_GET["timesspeedrunned"];
    $server="localhost";
    $username="programma";
    $password="12345";
    $connection=new PDO("mysql:host=$server;dbname=speedrunning",$username,$password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query2="SELECT e.Id FROM editor e WHERE e.Name=:type6";
    $statement=$connection->prepare($query2);
    $query1="INSERT INTO videogame (Title,Publisher,PublishingYear,TimesSpeedrunned) VALUES(:type,:type2,:type3,:type4)";
    $statement->bindParam(":type6",$_GET["company"],PDO::PARAM_STR);
    $statement->execute();
    $data=$statement->fetchAll();
    $statement=$connection->prepare($query1);
    $EditorId;
    foreach($data as $row){
        $EditorId=$row["Id"];
    }
    $statement->bindParam(":type",$title,PDO::PARAM_STR);
    $statement->bindParam(":type2",$EditorId,PDO::PARAM_STR);
    $statement->bindParam(":type3",$publishingY,PDO::PARAM_STR);
    $statement->bindParam(":type4",$timesSpeedrunned,PDO::PARAM_STR);
    $statement->execute();
    header("location:/WebDatabase/Videogame.php");
?>