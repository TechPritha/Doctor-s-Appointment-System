<?php
require('config.php');
require('checksession.php');


session_destroy();

        header('location:home.php')
    
?>