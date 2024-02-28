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
            <th>Title</th>
            <th>Publisher</th>
            <th>PublishingYear</th>
            <th>TimesSpeedrunned</th>
        </tr>
        <?php

            $server="localhost";
            $username="programma";
            $password="12345";
            $publisher=$_GET["company"];
            $publishingYear=$_GET["year"];
            try{
                $connection=new PDO("mysql:host=$server;dbname=speedrunning",$username,$password);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query="SELECT v.id,v.Title,e.Name,v.PublishingYear,v.TimesSpeedrunned FROM videogame v JOIN editor e ON v.Publisher=e.Id WHERE e.Name=:type";
                if($publishingYear!=""){
                    $query=$query." AND PublishingYear=:type2";
                    $statement=$connection->prepare($query);
                    $statement->bindParam(":type",$publisher,PDO::PARAM_STR);
                    $statement->bindParam(":type2",$publishingYear,PDO::PARAM_STR);
                }
                else{
                    $statement=$connection->prepare($query);
                    $statement->bindParam(":type",$publisher,PDO::PARAM_STR);
                }
                $statement->execute();
                $data=$statement->fetchAll();

                foreach($data as $row){
                    echo "<tr style='text-align:center'>";
                    echo "<td>".$row["id"]."</td>";
                    echo "<td>".$row["Title"]."</td>";
                    echo "<td>".$row["Name"]."</td>";
                    echo "<td>".$row["PublishingYear"]."</td>";
                    echo "<td>".$row["TimesSpeedrunned"]."</td>";
                    echo "</tr>";
                }      
            }catch(PDOException $e){
                echo "non è stato possibile caricare la tabella filtrata. ";
            }
        ?>
    </table>
    
    </body>
</html>