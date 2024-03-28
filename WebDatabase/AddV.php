<?php
    session_start();
    if(isset($_SESSION['User'])==false){
        header("location:/WebDatabase/index.html");
    }
?>
<html>
    <head>
        <title>Page</title>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    </head>
    <body style="background-color:#f0f8ff">
        <form action="/WebDatabase/AddProcessV.php" method="get">
            <div>
            </div>
            Title:<input type="text" name="title"><br><br>
            <?php
                $server="localhost";
                $username="programma";
                $password="12345";
                $connection=new PDO("mysql:host=$server;dbname=speedrunning",$username,$password);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query="SELECT editor.Name FROM editor";
                $statement=$connection->prepare($query);
                $statement->execute();
                $data=$statement->fetchAll();
                echo "Editor:<select name=company>";
                foreach($data as $rows){
                    echo "<option>".$rows["Name"]."</option>";
                }
                echo "</select><br><br>";
            ?>
            Publishing Year:<input type="text" name="publishingyear"><br><br>
            Times Speedrunned<input type="text" name="timesspeedrunned"><br><br>
            <button type='b' class='btn btn-primary'>Aggiungi</button>
            
        </form>
    </body>
</html>