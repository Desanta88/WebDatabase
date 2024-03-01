<html>
    <head>
        <title>Page</title>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    </head>
    <body style="background-color:#f0f8ff">
        <form action="/WebDatabase/UpdateProcessE.php" method="get">
            Name:<input type="text" name="name"><br><br>
            EstablishmentYear:<input type="text" name="establishmentyear"><br><br>
            Sales:<input type="text" name="sales"><br><br>
            Whereabouts:<input type="text" name="whereabouts"><br><br>
            <button type='b' class='btn btn-primary'>Modifica</button>
            <?php
                $s=$_GET["EditorU"];
                echo"<input type='text' name='EditorU' value='$s' style='display:none;'><br><br>";
            ?>
        </form>
    </body>
</html>