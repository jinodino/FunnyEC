<?php
    session_cache_expire(360); 
    session_start();
    echo $_SESSION['id'];
    echo $_SESSION['password'];
?>


