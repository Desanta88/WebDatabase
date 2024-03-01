<html>
    <head>
        <title>Editor</title>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    </head>
    <body style="background-color:#f0f8ff">
        <table align="center" style="width:70%" class="table" >
        <tr style="text-align:center">
            <th>Id</th>
            <th>Name</th>
            <th>EstablishmentYear</th>
            <th>Sales</th>
            <th>Whereabouts</th>
        </tr>
            <?php

                $server="localhost";
                $username="programma";
                $password="12345";
                try{
                    $connection=new PDO("mysql:host=$server;dbname=speedrunning",$username,$password);
                    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $query="SELECT * FROM editor;";
                    $statement=$connection->prepare($query);
                    $statement->execute();
                    $data=$statement->fetchAll();

                    foreach($data as $row){
                        echo "<tr style='text-align:center'>";
                        echo "<td>".$row["Id"]."</td>";
                        echo "<td>".$row["Name"]."</td>";
                        echo "<td>".$row["EstablishmentYear"]."</td>";
                        echo "<td>".$row["Sales"]."</td>";
                        echo "<td>".$row["Whereabouts"]."</td>";
                        echo "</tr>";
                    }   
                }catch(PDOException $e){
                    echo "non è stato possibile stabilire la connessione con il database. ";
                }
        ?>
        </table>
        <br>
        Filter by Whereabouts and Establishment Year <br><br>
        <form action="/WebDatabase/FilteredPageEditor.php" method="get">
            <?php
                $server="localhost";
                $username="programma";
                $password="12345";
                $connection=new PDO("mysql:host=$server;dbname=speedrunning",$username,$password);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query="SELECT DISTINCT Whereabouts FROM editor;";
                $statement=$connection->prepare($query);
                $statement->execute();
                $data=$statement->fetchAll();

                echo "<select name=whereabouts>";
                foreach($data as $rows){
                    echo "<option>".$rows["Whereabouts"]."</option>";
                }
                echo "</select>";
            ?>
            <br><br>
            
            Input a year:<input type="number" name="establishmentyear">
            <br><br>
            <button type="b" class="btn btn-primary">Filter</button>
        </form>
        <form action="/WebDatabase/DeleteE.php" method="get">
            <?php
                $server="localhost";
                $username="programma";
                $password="12345";
                $connection=new PDO("mysql:host=$server;dbname=speedrunning",$username,$password);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query="SELECT e.Name FROM editor e";
                $statement=$connection->prepare($query);
                $statement->execute();
                $data=$statement->fetchAll();
                echo "Scegliere l'editore da cancellare:<br>";
                echo "<select name=EditorD>";
                foreach($data as $rows){
                    echo "<option>".$rows["Name"]."</option>";
                }
                echo "</select>";
            ?>
            <button class='btn btn-primary'>Cancella</button><br><br>
        </form>
        <form action="UpdateE.php" method="get">
            <?php
                $server="localhost";
                $username="programma";
                $password="12345";
                $connection=new PDO("mysql:host=$server;dbname=speedrunning",$username,$password);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query="SELECT e.Name FROM editor e";
                $statement=$connection->prepare($query);
                $statement->execute();
                $data=$statement->fetchAll();

                echo "Modifica di un'editor<br>";
                echo "<select name=EditorU>";
                foreach($data as $rows){
                    echo "<option>".$rows["Name"]."</option>";
                }
                echo "</select>     ";
                echo "<button type='b' class='btn btn-primary'>Modifica</button><br><br>";
            ?>
        </form>
        <a href="/WebDatabase/AddE.php"><button type='b' class='btn btn-primary'>Aggiungi un editore</button><br><br></a>
        
    </body>
</html>