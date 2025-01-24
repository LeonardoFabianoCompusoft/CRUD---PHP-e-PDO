<?php
    require_once "Connection/connection.php";

    $modelo= file_get_contents("APP/Template/index.html");
    
    echo $modelo;