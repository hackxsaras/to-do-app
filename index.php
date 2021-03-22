<?php include 'config.php';date_default_timezone_set("Asia/Kolkata"); $tim = (date("Y-m-d H:i:s",time()));
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Finally, Reminding you...</title>
        <link rel="stylesheet" href="css/style.css">
        <script src="js/main.js"></script>
    </head>
    <body>
        <script> var timed = <?php echo '"'.$tim.'";'; ?></script>
        <div class="evs">
            <?php 
                $sql = "SELECT * FROM events ORDER BY timed";
                $x = "Deleted ";
                if($result = mysqli_query($link, $sql)){
                    if(mysqli_num_rows($result) != 0){
                        echo '<table>
                                <tr><th>Name</th><th>Time</th><th>Delete</th>';
                        while($arr = mysqli_fetch_array($result)){  
                            $tim2 = $arr['timed'];
                            if($tim > $tim2){
                                $x .= (($arr['name']!='')?$arr['name']:'noname').', ';
                                $url = 'http://localhost/project/delete.php?id='.$arr['srno'];
                                $contents = file_get_contents($url);
                                continue;
                            }
                            echo '<tr><td>'.$arr['name'].'</td><td>'.$arr['timed'].'</td>
                                    <td><a href = "/project/delete.php?id='.$arr['srno'].'">Delete</a></td></tr>';
                        }
                        echo '</table>';
                        mysqli_free_result($result);
                    } else {
                        echo '<span style="color:#fff;">You know what, no events.</span>';
                    }
                }
                if($x != "Deleted "){
                    echo '<div class="del">'.substr($x, 0  , strlen($x)-2).' Automatically</div>';
                }
            ?>
        </div>
        <form action = "insert.php" method = "GET">
            <div>Add Event</div>
            <input type="text" name = "name" placeholder="Name"><br>
            <input id="dt" type="text" name = "timed" placeholder="time"><br>
            <input type="submit" value="Submit">
        </form>
    </body>
</html>