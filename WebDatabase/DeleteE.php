<?php
    session_start();
    if(isset($_SESSION['User'])==false){
        header("location:/WebDatabase/index.html");
    }
?>
<?php
    $server="localhost";
    $username="programma";
    $password="12345";
    $connection=new PDO("mysql:host=$server;dbname=speedrunning",$username,$password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $editor=$_GET["EditorD"];
    $query="DELETE FROM editor WHERE Name=:type";
    $statement=$connection->prepare($query);
    $statement->bindParam(":type",$editor,PDO::PARAM_STR);
    $statement->execute();
    header("location:/WebDatabase/Editor.php");
?>