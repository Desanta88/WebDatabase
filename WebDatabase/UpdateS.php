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
        <form action="/WebDatabase/UpdateProcessS.php" method="get">
            Username:<input type="text" name="username"><br><br>
            Nationality:<input type="text" name="nationality"><br><br>
            Gender:<input type="text" name="gender"><br><br>
            Total Speedruns:<input type="text" name="totalspeedruns"><br><br>
            <button type='b' class='btn btn-primary'>Modifica</button>
            <?php
                $s=$_GET["SpeedrunnerU"];
                echo"<input type='text' name='SpeedrunnerU' value='$s' style='display:none;'><br><br>";
            ?>
        </form>
    </body>
</html>