
<?php
    session_start();
    if(isset($_SESSION['User'])==false){
        header("location:/WebDatabase/index.html");
    }
?>
<html>
    <head>
        <title>Speedrunner</title>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    </head>
    <body style="background-color:#f0f8ff">
        <table align="center" style="width:70%" class="table" >
        <tr style="text-align:center">
            <th>Id</th>
            <th>Username</th>
            <th>Nationality</th>
            <th>Gender</th>
            <th>TotalSpeedRuns</th>
        </tr>
            <?php

                $server="localhost";
                $username="programma";
                $password="12345";
                try{
                    $connection=new PDO("mysql:host=$server;dbname=speedrunning",$username,$password);
                    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $query="SELECT * FROM speedrunner;";
                    $statement=$connection->prepare($query);
                    $statement->execute();
                    $data=$statement->fetchAll();

                    foreach($data as $row){
                        echo "<tr style='text-align:center'>";
                        echo "<td>".$row["Id"]."</td>";
                        echo "<td>".$row["Username"]."</td>";
                        echo "<td>".$row["Nationality"]."</td>";
                        echo "<td>".$row["Gender"]."</td>";
                        echo "<td>".$row["TotalSpeedRuns"]."</td>";
                        echo "</tr>";
                    }   
                }catch(PDOException $e){
                    echo "non è stato possibile stabilire la connessione con il database. ";
                }
        ?>
        </table>
        <br>
        Filter by nationality and gender <br><br>
        <form action="/WebDatabase/FilteredPageSpeedrunner.php" method="get">
            <?php
                $server="localhost";
                $username="programma";
                $password="12345";
                $connection=new PDO("mysql:host=$server;dbname=speedrunning",$username,$password);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query="SELECT DISTINCT speedrunner.Nationality FROM speedrunner;";
                $statement=$connection->prepare($query);
                $statement->execute();
                $data=$statement->fetchAll();

                echo "<select name=nation>";
                foreach($data as $rows){
                    echo "<option>".$rows["Nationality"]."</option>";
                }
                echo "</select>";


            ?>
            <br><br>
            <input type="radio" name="gender" id="Male" value="Male">
            <label for="Male">Male</label><br>
            <input type="radio" name="gender" id="Female" value="Female">
            <label for="Female">Female</label>
            <br><br>
            <button type="b" class="btn btn-primary">Filter</button>
        </form>
        <form action="/WebDatabase/DeleteS.php" method="get">
            <?php
                $server="localhost";
                $username="programma";
                $password="12345";
                $connection=new PDO("mysql:host=$server;dbname=speedrunning",$username,$password);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query="SELECT Username FROM speedrunner";
                $statement=$connection->prepare($query);
                $statement->execute();
                $data=$statement->fetchAll();
                echo "Scegliere lo speedrunner da cancellare:<br>";
                echo "<select name=SpeedrunnerD>";
                foreach($data as $rows){
                    echo "<option>".$rows["Username"]."</option>";
                }
                echo "</select>";
            ?>
            <button class='btn btn-primary'>Cancella</button><br><br>
        </form>
        <form action="UpdateS.php" method="get">
            <?php
                $server="localhost";
                $username="programma";
                $password="12345";
                $connection=new PDO("mysql:host=$server;dbname=speedrunning",$username,$password);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query="SELECT Username FROM speedrunner";
                $statement=$connection->prepare($query);
                $statement->execute();
                $data=$statement->fetchAll();

                echo "Modifica di uno speedrunner<br>";
                echo "<select name=SpeedrunnerU>";
                foreach($data as $rows){
                    echo "<option>".$rows["Username"]."</option>";
                }
                echo "</select>     ";
                echo "<button type='b' class='btn btn-primary'>Modifica</button><br><br>";
            ?>
        </form>
        <a href="/WebDatabase/AddS.php"><button type='b' class='btn btn-primary'>Aggiungi uno speedrunner</button><br><br></a>
        
    </body>
</html>