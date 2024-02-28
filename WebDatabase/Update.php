<html>
    <head>
        <title>Page</title>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    </head>
    <body style="background-color:#f0f8ff">
        <form action="/WebDatabase/UpdateProcess.php" method="get">
            Title:<input type="text" name="title"><br><br>
            Publisher:<input type="text" name="publisher"><br><br>
            Publishing Year:<input type="text" name="publishingyear"><br><br>
            Times Speedrunned<input type="text" name="timesspeedrunned"><br><br>
            <button type='b' class='btn btn-primary'>Modifica</button>
            <?php
                $g=$_GET["VideogameU"];
                echo"<input type='text' name='VideogameU' value='$g' style='display:none;'><br><br>";
            ?>
            
        </form>
    </body>
</html>