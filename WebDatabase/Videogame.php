<?php
    session_start();
    if(isset($_SESSION['User'])==false){
        header("location:/WebDatabase/index.html");
    }
?>
<html>
    <head >
        <title>Videogame</title>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    </head>
    <body style="background-color:#f0f8ff">
        <table align="center" style="width:70%" class="table">
            <tr style="text-align:center">
                <th>Id</th>
                <th>Title</th>
                <th>Publisher</th>
                <th>PublishingYear</th>
                <th>TimesSpeedrunned</th>
            </tr>
            <?php
                $server="localhost";
                $username="programma";
                $password="12345";
                $connection=new PDO("mysql:host=$server;dbname=speedrunning",$username,$password);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query="SELECT v.Id,v.Title,e.Name,v.PublishingYear,v.TimesSpeedrunned FROM videogame v JOIN editor e ON v.Publisher=e.Id;";

                $statement=$connection->prepare($query);
                $statement->execute();
                $data=$statement->fetchAll();

                foreach($data as $row){
                    echo "<tr style='text-align:center'>";
                    echo "<td>".$row["Id"]."</td>";
                    echo "<td>".$row["Title"]."</td>";
                    echo "<td>".$row["Name"]."</td>";
                    echo "<td>".$row["PublishingYear"]."</td>";
                    echo "<td>".$row["TimesSpeedrunned"]."</td>";
                    echo "</tr>";
                }
            ?>
        </table>
        <br><br><br><br>
        Filter by the publisher and publishing year
        <form action="/WebDatabase/FilteredPageVideogame.php" method="get">
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

                echo "<select name=company>";
                foreach($data as $rows){
                    echo "<option>".$rows["Name"]."</option>";
                }
                echo "</select>";
            ?>
            <br><br>
            Input a year:<input type="number" name="year"><br><br>
            <button type="b" class="btn btn-primary">Filter</button>
        </form><br><br><br>
        <form action="/WebDatabase/DeleteV.php" method="get">
            <?php
                $server="localhost";
                $username="programma";
                $password="12345";
                $connection=new PDO("mysql:host=$server;dbname=speedrunning",$username,$password);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query="SELECT Title FROM videogame";
                $statement=$connection->prepare($query);
                $statement->execute();
                $data=$statement->fetchAll();
                echo "Scegliere il gioco da cancellare:<br>";
                echo "<select name=VideogameD>";
                foreach($data as $rows){
                    echo "<option>".$rows["Title"]."</option>";
                }
                echo "</select>";
            ?>
            <button class='btn btn-primary'>Cancella</button><br><br>
        </form>
        <form action="UpdateV.php" method="get">
            <?php
                $server="localhost";
                $username="programma";
                $password="12345";
                $connection=new PDO("mysql:host=$server;dbname=speedrunning",$username,$password);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query="SELECT DISTINCT videogame.Title FROM videogame;";
                $statement=$connection->prepare($query);
                $statement->execute();
                $data=$statement->fetchAll();

                echo "Modifica di un gioco<br>";
                echo "<select name=VideogameU>";
                foreach($data as $rows){
                    echo "<option>".$rows["Title"]."</option>";
                }
                echo "</select>     ";
                echo "<button type='b' class='btn btn-primary'>Modifica</button><br><br>";
            ?>
        </form>
        <a href="/WebDatabase/AddV.php"><button name='ciao' type='b' class='btn btn-primary'>Aggiungi un videogioco</button><br><br></a>
    </body>
</html>