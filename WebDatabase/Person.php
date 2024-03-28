<?php
    session_start();
    if(isset($_SESSION['User'])==false){
        header("location:/WebDatabase/index.html");
    }
?>
<html>
    <head >
        <title>Person</title>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    </head>
    <body style="background-color:#f0f8ff">
        <table align="center" style="width:70%" class="table">
            <tr style="text-align:center">
                <th>Id</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Age</th>
                <th>Email</th>
                <th>Speedrunner</th>
            </tr>
            <?php
                $server="localhost";
                $username="programma";
                $password="12345";
                $connection=new PDO("mysql:host=$server;dbname=speedrunning",$username,$password);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query="SELECT p.Id,p.Name,p.Surname,p.Age,p.Email,s.Username FROM person p JOIN speedrunner s ON p.IdSpeedrunner=s.Id;";

                $statement=$connection->prepare($query);
                $statement->execute();
                $data=$statement->fetchAll();

                foreach($data as $row){
                    echo "<tr style='text-align:center'>";
                    echo "<td>".$row["Id"]."</td>";
                    echo "<td>".$row["Name"]."</td>";
                    echo "<td>".$row["Surname"]."</td>";
                    echo "<td>".$row["Age"]."</td>";
                    echo "<td>".$row["Email"]."</td>";
                    echo "<td>".$row["Username"]."</td>";
                    echo "</tr>";
                }
            ?>
        </table>
        <br><br><br><br>
        Filter by age
        <form action="/WebDatabase/FilteredPagePerson.php" method="get">
            Input a year:<input type="number" name="year"><br><br>
            <button type="b" class="btn btn-primary">Filter</button>
        </form><br><br><br>
        <form action="/WebDatabase/DeleteP.php" method="get">
            <?php
                $server="localhost";
                $username="programma";
                $password="12345";
                $connection=new PDO("mysql:host=$server;dbname=speedrunning",$username,$password);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query="SELECT p.Name,p.Surname,s.Username FROM person p JOIN speedrunner s ON p.IdSpeedrunner=s.Id";
                $statement=$connection->prepare($query);
                $statement->execute();
                $data=$statement->fetchAll();
                echo "Scegliere la persona da cancellare:<br>";
                echo "<select name=PersonD>";
                foreach($data as $rows){
                    echo "<option>".$rows["Name"]."-".$rows["Surname"]."-".$rows["Username"]."</option>";
                }
                echo "</select>";
            ?>
            <button class='btn btn-primary'>Cancella</button><br><br>
        </form>
        <form action="UpdateP.php" method="get">
            <?php
                $server="localhost";
                $username="programma";
                $password="12345";
                $connection=new PDO("mysql:host=$server;dbname=speedrunning",$username,$password);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query="SELECT p.Name,p.Surname,s.Username FROM person p JOIN speedrunner s ON p.IdSpeedrunner=s.Id";
                $statement=$connection->prepare($query);
                $statement->execute();
                $data=$statement->fetchAll();

                echo "Modifica di un gioco<br>";
                echo "<select name=PersonU>";
                foreach($data as $rows){
                    echo "<option>".$rows["Name"]."-".$rows["Surname"]."-".$rows["Username"]."</option>";
                }
                echo "</select>     ";
                echo "<button type='b' class='btn btn-primary'>Modifica</button><br><br>";
            ?>
        </form>
        <a href="/WebDatabase/AddP.php"><button name='ciao' type='b' class='btn btn-primary'>Aggiungi una persona</button><br><br></a>
    </body>
</html>