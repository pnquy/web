<?php 
    $connect = new mysqli('localhost','root','','dbdoan');

    $id = $_POST['id'];
    $size = $_POST['size'];
   
    $sq = "select sl from procolorsize where procolorid = '".$id."' and size = '".$size."'";
    $res = $connect->query($sq);
    $row = $res->fetch_assoc();

    $sl = $row['sl'];
    echo "$sl";
                      
?>