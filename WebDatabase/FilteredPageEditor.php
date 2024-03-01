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
            <th>Name</th>
            <th>EstablishmentYear</th>
            <th>Sales</th>
            <th>Whereabouts</th>
        </tr>
        <?php

            $server="localhost";
            $username="programma";
            $password="12345";
            $whereabouts=$_GET["whereabouts"];
            try{
                $connection=new PDO("mysql:host=$server;dbname=speedrunning",$username,$password);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query="SELECT * FROM editor WHERE Whereabouts=:type";
                if($_GET["establishmentyear"]!=""){
                    $query=$query." AND EstablishmentYear=:type2;";
                    $statement=$connection->prepare($query);
                    $statement->bindParam(":type",$whereabouts,PDO::PARAM_STR);
                    $statement->bindParam(":type2",$_GET["establishmentyear"],PDO::PARAM_STR);
                }
                else{
                    $statement=$connection->prepare($query);
                    $statement->bindParam(":type",$whereabouts,PDO::PARAM_STR);
                }
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
                echo "non è stato possibile caricare la tabella filtrata.";
                echo $e;
            }
        ?>
    </table>
    
    </body>
</html>