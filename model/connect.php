<?php
    $link = mysqli_connect("localhost", "root", "", "wm10");
    
    if(!$link)
    {
     die('Não conectado : ' . mysqli_error($link));
    }
?>