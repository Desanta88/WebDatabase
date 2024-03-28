<?php
    session_start();
    session_destroy();
    header("location:/WebDatabase/index.html");
?>