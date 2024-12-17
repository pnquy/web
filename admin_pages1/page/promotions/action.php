<?php
   include ('../../../config/config.php');
    if(isset($_POST['query']))
    {
        $inpText = $_POST['query'];
        $query = "SELECT tensp FROM sanpham WHERE tensp LIKE '%$inpText%'";
        $result = $mysqli->query($query);
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                $ten = $row['tensp'];
                echo "<a href='#' class='list-group-item list-group-item-action' style='border: 1px solid;'>$ten</a>";
            }
        }
    }
?>