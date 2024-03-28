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
            <th>Username</th>
            <th>Nationality</th>
            <th>Gender</th>
            <th>TotalSpeedRuns</th>
        </tr>
        <?php

            $server="localhost";
            $username="programma";
            $password="12345";
            $nationality=$_GET["nation"];
            try{
                $connection=new PDO("mysql:host=$server;dbname=speedrunning",$username,$password);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query="SELECT * FROM speedrunner WHERE Nationality=:type";
                if(isset($_GET["gender"])){
                    $query=$query." AND Gender=:type2;";
                    $statement=$connection->prepare($query);
                    $statement->bindParam(":type",$nationality,PDO::PARAM_STR);
                    $statement->bindParam(":type2",$_GET["gender"],PDO::PARAM_STR);
                }
                else{
                    $statement=$connection->prepare($query);
                    $statement->bindParam(":type",$nationality,PDO::PARAM_STR);
                }
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
                echo "non è stato possibile caricare la tabella filtrata.";
            }
        ?>
    </table>
    
    </body>
</html>