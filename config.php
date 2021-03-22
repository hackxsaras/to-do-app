<?php
    $link = 0;
    if($link = mysqli_connect('localhost', 'hackxsaras', 'c3daq8njve', 'testdb')){
        //echo 'in db';
    } else 
        echo mysqli_connect_error();
?>