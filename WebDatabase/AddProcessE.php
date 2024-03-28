<?php
    session_start();
    if(isset($_SESSION['User'])==false){
        header("location:/WebDatabase/index.html");
    }
?>
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
    $query="INSERT INTO editor (Name,EstablishmentYear,Sales,Whereabouts) VALUES(:type,:type2,:type3,:type4)";
    $statement=$connection->prepare($query);
    $statement->bindParam(":type",$name,PDO::PARAM_STR);
    $statement->bindParam(":type2",$ey,PDO::PARAM_STR);
    $statement->bindParam(":type3",$sales,PDO::PARAM_STR);
    $statement->bindParam(":type4",$whereabouts,PDO::PARAM_STR);
    $statement->execute();
    header("location:/WebDatabase/Editor.php");
?>