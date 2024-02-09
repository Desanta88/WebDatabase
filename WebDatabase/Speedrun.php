<html>
    <head>
        <title>Speedrunner</title>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    </head>
    <body style="background-color:#f0f8ff">
        <table align="center" style="width:70%" class="table">
            <tr>
                <th>Id</th>
                <th>Username</th>
                <th>Videogame</th>
                <th>Date</th>
                <th>Time</th>
                <th>LeaderboardNumber</th>
                <th>Platform</th>
            </tr>
            <?php
        $server="localhost";
        $username="programma";
        $password="12345";
        $connection=new PDO("mysql:host=$server;dbname=speedrunning",$username,$password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query="SELECT sr.Id,speedrunner.Username,videogame.Title as Videogame,sr.Date,sr.Time,sr.LeaderboardNumber,sr.Platform
        FROM (speedrun sr JOIN speedrunner ON sr.Speedrunner=speedrunner.Id) JOIN videogame ON videogame.Id=sr.Videogame
        ORDER BY sr.Id ASC;";

        $statement=$connection->prepare($query);
        $statement->execute();
        $data=$statement->fetchAll();

        foreach($data as $row){
            echo "<tr style='text-align:center'>";
            echo "<td>".$row["Id"]."</td>";
            echo "<td>".$row["Username"]."</td>";
            echo "<td>".$row["Videogame"]."</td>";
            echo "<td>".$row["Date"]."</td>";
            echo "<td>".$row["Time"]."</td>";
            echo "<td>".$row["LeaderboardNumber"]."</td>";
            echo "<td>".$row["Platform"]."</td>";
            echo "</tr>";
        }
        ?>
        </table><br><br>
        Filter by the videogame and the possibilty to sort the leaderboard <br><br>
        <form action="/WebDatabase/FilteredPageSpeedrun.php" method="get">
            <?php
                $server="localhost";
                $username="programma";
                $password="12345";
                $connection=new PDO("mysql:host=$server;dbname=speedrunning",$username,$password);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query="SELECT DISTINCT videogame.Title Videogame FROM videogame;";
                $statement=$connection->prepare($query);
                $statement->execute();
                $data=$statement->fetchAll();

                echo "<select name=game>";
                foreach($data as $rows){
                    echo "<option>".$rows["Videogame"]."</option>";
                }
                echo "</select>";


            ?>
            
            <input type="checkbox" name="sort">Sort the leaderboard of a specific game<br><br>
            <button type="b" class="btn btn-primary">Filter</button>
        </form>
    </body>
</html>