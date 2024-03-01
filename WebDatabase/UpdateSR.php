<html>
    <head>
        <title>Page</title>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    </head>
    <body style="background-color:#f0f8ff">
        <form action="/WebDatabase/UpdateProcessSR.php" method="get">
            <?php
                $server="localhost";
                $username="programma";
                $password="12345";
                $connection=new PDO("mysql:host=$server;dbname=speedrunning",$username,$password);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $queryV="SELECT Title FROM videogame";
                $queryS="SELECT Username FROM speedrunner";
                $statement=$connection->prepare($queryS);
                $statement->execute();
                $data=$statement->fetchAll();
                echo "Username:<select name=speedrunner>";
                foreach($data as $rows){
                    echo "<option>".$rows["Username"]."</option>";
                }
                echo "</select><br><br>";
                $statement=$connection->prepare($queryV);
                $statement->execute();
                $data=$statement->fetchAll();
                echo "Videogame:<select name=videogame>";
                foreach($data as $rows){
                    echo "<option>".$rows["Title"]."</option>";
                }
                echo "</select><br><br>";
            ?>
            Date:<input type="date" name="date" pattern="\d{4}-\d{2}-\d{2}"><br><br>
            Time:<input type="time" name="time" step="1"></input><br><br>
            Leaderboard number:<input type="text" name="leaderboardnumber"><br><br>
            Platform:<input type="text" name="platform"><br><br>
            <button type='b' class='btn btn-primary'>Modifica</button>
            <?php
                $g=$_GET["SpeedrunU"];
                echo"<input type='text' name='SpeedrunU' value='$g' style='display:none;'><br><br>";
            ?>
        </form>
    </body>
</html>