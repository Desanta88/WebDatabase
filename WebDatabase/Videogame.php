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
                $query="SELECT * FROM videogame;";

                $statement=$connection->prepare($query);
                $statement->execute();
                $data=$statement->fetchAll();

                foreach($data as $row){
                    echo "<tr style='text-align:center'>";
                    echo "<td>".$row["Id"]."</td>";
                    echo "<td>".$row["Title"]."</td>";
                    echo "<td>".$row["Publisher"]."</td>";
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
                $query="SELECT DISTINCT editor.Name,videogame.Title FROM videogame JOIN editor ON videogame.Publisher=editor.Id;";
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
            Input a year:<input type="text" name="year"><br><br>
            <button type="b" class="btn btn-primary">Filter</button>
        </form><br><br><br>
        <form action="/WebDatabase/Delete.php" method="get">
            <?php
                echo "Scegliere il gioco da cancellare:<br>";
                echo "<select name=VideogameD>";
                foreach($data as $rows){
                    echo "<option>".$rows["Title"]."</option>";
                }
                echo "</select>";
            ?>
            <button class='btn btn-primary'>Cancella</button><br><br>
        </form>
        <form action="AddUpdate.php" method="get">
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
                echo "<button type='b' class='btn btn-primary'>Aggiungi un videogioco</button><br><br>";
            ?>
        </form>

    </body>
</html>