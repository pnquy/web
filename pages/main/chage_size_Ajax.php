<?php 
    $connect = new mysqli('localhost', 'root', '', 'dbdoan');
    
    if ($connect->connect_error) {
        die("0");
    }
    $connect->set_charset('utf8');

    if(isset($_POST['id']) && isset($_POST['size'])){
        
        $id = $connect->real_escape_string($_POST['id']);
        $size = $connect->real_escape_string($_POST['size']);
    
        $sq = "SELECT sl FROM procolorsize WHERE procolorid = '$id' AND size = '$size'";
        $res = $connect->query($sq);

        if($res && $res->num_rows > 0){
            $row = $res->fetch_assoc();
            echo $row['sl'];
        } else {
            echo "0";
        }
    } else {
        echo "0";
    }
?>