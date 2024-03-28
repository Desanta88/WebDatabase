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
    <table align="center" style="width:70%" class="table">
        <tr style='text-align:center'>
            <th>Id</th>
            <th>Surname</th>
            <th>Age</th>
            <th>Email</th>
            <th>Speedrunner</th>
        </tr>
        <?php

            $server="localhost";
            $username="programma";
            $password="12345";
            $year=$_GET["year"];
            try{
                $connection=new PDO("mysql:host=$server;dbname=speedrunning",$username,$password);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query="SELECT p.Id,p.Surname,p.Age,p.Email,s.Username FROM person p JOIN speedrunner s ON p.IdSpeedrunner=s.Id  WHERE p.Age=:type";
                $statement=$connection->prepare($query);
                $statement->bindParam(":type",$year,PDO::PARAM_STR);
                $statement->execute();
                $data=$statement->fetchAll();

                foreach($data as $row){
                    echo "<tr style='text-align:center'>";
                    echo "<td>".$row["Id"]."</td>";
                    echo "<td>".$row["Surname"]."</td>";
                    echo "<td>".$row["Age"]."</td>";
                    echo "<td>".$row["Email"]."</td>";
                    echo "<td>".$row["Username"]."</td>";
                    echo "</tr>";
                }      
            }catch(PDOException $e){
                echo "non è stato possibile caricare la tabella filtrata.";
                echo $e;
            }
        ?>
    </table>
    
    </body>
</html>