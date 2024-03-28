<?php
    session_start();
    if(isset($_SESSION['User'])==false){
        header("location:/WebDatabase/index.html");
    }
?>
<?php
    $runner=$_GET["speedrunner"];
    $game=$_GET["videogame"];
    $date=$_GET["date"];
    $time=$_GET["time"];
    $leaderboardNumber=$_GET["leaderboardnumber"];
    $platform=$_GET["platform"];
    $server="localhost";
    $username="programma";
    $password="12345";
    $connection=new PDO("mysql:host=$server;dbname=speedrunning",$username,$password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $queryS="INSERT INTO speedrun (Speedrunner,Videogame,Date,Time,LeaderboardNumber,Platform) VALUES((SELECT Id FROM speedrunner WHERE Username=:type),(SELECT Id FROM videogame WHERE Title=:type2),:type3,:type4,:type5,:type6)";
    $statement=$connection->prepare($queryS);
    $statement->bindParam(":type",$runner,PDO::PARAM_STR);
    $statement->bindParam(":type2",$game,PDO::PARAM_STR);
    $statement->bindParam(":type3",$date,PDO::PARAM_STR);
    $statement->bindParam(":type4",$time,PDO::PARAM_STR);
    $statement->bindParam(":type5",$leaderboardNumber,PDO::PARAM_STR);
    $statement->bindParam(":type6",$platform,PDO::PARAM_STR);
    $statement->execute();
    header("location:/WebDatabase/Speedrun.php");
?>