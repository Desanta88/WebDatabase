<html>
    <head>
        <title>Page</title>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    </head>
    <body style="background-color:#f0f8ff">
        <form action="/WebDatabase/AddProcessP.php" method="get">
            Name:<input type="text" name="name"><br><br>
            Surname:<input type="text" name="surname"><br><br>
            Age:<input type="text" name="age"><br><br>
            Email:<input type="text" name="email"><br><br>
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
                echo "Speedrunner:<select name=speedrunner>";
                foreach($data as $rows){
                    echo "<option>".$rows["Username"]."</option>";
                }
                echo "</select><br><br>";
            ?>
            <button type='b' class='btn btn-primary'>Aggiungi</button>
        </form>
    </body>
</html>