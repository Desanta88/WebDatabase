
<html>
    <head>
        <!--<script src="WrongUserData.js"></script>-->
    </head>
    <body>
        <?php
            session_start();
            $username=$_GET["user"];
            $password=$_GET["pass"];
            $hash=sha1($password);
            $connection=new PDO("mysql:host=localhost;dbname=speedrunning","programma","12345");
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query='SELECT * FROM utenti WHERE utenti.Password=:type AND utenti.Username=:type2;';
            $statement=$connection->prepare($query);
            $statement->bindParam(':type', $hash, PDO::PARAM_STR);
            $statement->bindParam('type2', $username, PDO::PARAM_STR);
            $statement->execute();
            $data=$statement->fetchAll();
    
            if(empty($data)==false){
                $_SESSION["User"]=$username;
                header("location:/WebDatabase/home.php");
            }
            else
                echo "username o password non corretti";
                
        ?>
        <!--<script>
            fetch("LoginProcess.php").then(data=>{
                alert("nome utente o password errati");
            });
        </script>-->
    </body>
</html>
