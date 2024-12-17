<?php
    include ("../../../config/config.php");
    $ten=$_POST['ten'];
    $sql = "SELECT tensp, img1 FROM sanpham, productcolor where tensp='$ten' and productcolor.productid = sanpham.sanphamid LIMIT 1;";
    $results = $mysqli->query($sql);
    $d = "";
    if($results->num_rows>0){
        $row = $results->fetch_row();
        $d .= '<tr> <td><div><input type="hidden" name="showtensp[]" value="'. $row[0] . '">'. $row[0] . '</input></div></td>              
                    <td><div class="hinhanhsp"><img src="../products/uploads/'.$row[1].'"></div></td>
                    <td><button class="delete button">Xóa</button></td>
                </tr>';
        echo $d;
    }
    else
        echo $d;
?>