<?php
$connect = new mysqli('localhost', 'root', '', 'dbdoan');
if ($connect->errno !== 0) {
    die("Error: Could not connect to the database. An error " . $connect->error . " ocurred.");
}
//Chọn hệ ký tự là utf8 để có thể in ra tiếng Việt.
$connect->set_charset('utf8'); //csdl tiếng việt
?>
<?php

switch ($_GET['idsp']) {
    case 1:
        $str = "select productcolorid, tensp, giasp, img1, img2 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid;";
        break;
    case 2:
        $str = "select productcolorid, tensp, giasp, img1, img2 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and danhmuc = 'Nam';";
        break;
    case 3:
        $str = "select productcolorid, tensp, giasp, img1, img2 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and danhmuc = 'Nữ';";
        break;
    case 4:
        $str = "select productcolorid, tensp, giasp, img1, img2 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid;";
        break;
    case 5:
        $str = "select productcolorid, tensp, giasp, img1, img2
                        from sanpham, productcolor, dongsp
                        where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and dongsp.dongspid='dongsp1';";
        break;
    case 6:
        $str = "select productcolorid, tensp, giasp, img1, img2
                        from sanpham, productcolor, dongsp
                        where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and dongsp.dongspid='dongsp2';";
        break;
    case 7:
        $str = "select productcolorid, tensp, giasp, img1, img2
                        from sanpham, productcolor, dongsp
                        where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and dongsp.dongspid='dongsp3';";
        break;
    case 8:
        $str = "select productcolorid, tensp, giasp, img1, img2
                        from sanpham, productcolor, dongsp
                        where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and dongsp.dongspid='dongsp4';";
        break;
    
    case 11:
        $str = "select productcolorid, tensp, giasp, img1, img2
                        from sanpham, productcolor, dongsp
                        where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and sanpham.giasp >= 6000000;";
        break;
    case 12:
        $str = "select productcolorid, tensp, giasp, img1, img2
                        from sanpham, productcolor, dongsp
                        where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and sanpham.giasp >= 5000000 and sanpham.giasp <=5999000;";
        break;
    case 13:
        $str = "select productcolorid, tensp, giasp, img1, img2
                        from sanpham, productcolor, dongsp
                        where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and sanpham.giasp >= 4000000 and sanpham.giasp <=4999000;";
        break;
    case 14:
        $str = "select productcolorid, tensp, giasp, img1, img2
                        from sanpham, productcolor, dongsp
                        where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and sanpham.giasp >= 3000000 and sanpham.giasp <=3999000;";
        break;
    case 15:
        $str = "select productcolorid, tensp, giasp, img1, img2
                        from sanpham, productcolor, dongsp
                        where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and sanpham.giasp >= 2000000 and sanpham.giasp <=2999000;";
        break;
    case 16:
        $str = "select productcolorid, tensp, giasp, img1, img2
                        from sanpham, productcolor, dongsp
                        where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and sanpham.giasp <2000000;";
        break;
    case 17:
        $str = "select productcolorid, tensp, giasp, img1, img2
                        from sanpham, productcolor, dongsp
                        where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and sanpham.styleid='style1';";
        break;
    case 18:
        $str = "select productcolorid, tensp, giasp, img1, img2
                        from sanpham, productcolor, dongsp
                        where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and sanpham.styleid='style2';";
        break;
    case 19:
        $str = "select productcolorid, tensp, giasp, img1, img2
                        from sanpham, productcolor, dongsp
                        where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and sanpham.styleid='style3';";
        break;
    case 20:
        $str = "select productcolorid, tensp, giasp, img1, img2
                        from sanpham, productcolor, dongsp
                        where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and sanpham.styleid='style4';";
        break;
}
                    $str1 = "SELECT * FROM saleoff";

                    date_default_timezone_set('Asia/Jakarta');
                    $format = "Y-m-d G:i:s";
                    $datenow =  date($format, time());

                    $arr = array();
                    $rs1 = $connect->query($str1);
                    if ($rs1->num_rows > 0) {
                        while ($row1 = $rs1->fetch_row()) {
                            $ngaybd = date($row1[1]);
                            $ngaykt = date($row1[2]);
                            $giam_value = $row1[3];
                            $saleid = $row1[0];

                            // Kiem tra ngay hien tai dang co trong chuong trinh khuyen mai nao ko. Neu co thi them saleoffid vao mang
                            if("$datenow" >= $ngaybd && "$datenow" < $ngaykt){
                                $arr["$saleid"] = "$giam_value";
                            }
                        }
                    } else {
                        echo "Không có record nào";
                    }

                    $arr_info = array();

                    if(count($arr) != 0){
                        foreach($arr as $x=>$x_value){
                            $str1 = "SELECT * FROM `saleoffct` WHERE saleoffid = '$x'";
                            $rs1 = $connect->query($str1);
                            if($rs1->num_rows > 0){
                                while($row1 = $rs1->fetch_row()){
                                    $arr_info["$row1[2]"]= "$row1[1]";
                                }
                            }
                        }
                    }

                    $rs = $connect->query($str);
                    if($rs->num_rows > 0){
                        while($row = $rs->fetch_row()){
                            if($_GET['idsp'] != 4){ ?>
                                <!-- Ko phai trang saleoff -->
                                <div class="col-sm-4 item">
                                    <div class="item-img">
                                        <a href="index.php?quanly=chitietsanpham&id=<?php echo $row[0] ?>">
                                            <?php
                                            echo "<img src='uploads/$row[3]' alt=''>";
                                            echo "<img src='uploads/$row[4]' alt=''>";
                                            ?>
                                        </a>
                                    </div>
                                    <div class="img-button">
                                        <a href="index.php?quanly=chitietsanpham&id=<?php echo $row[0] ?>">Mua hàng</a>
                                    </div>
                                    <div class="item-info">
                                        <hr>
                                        <?php
                                        echo "<a href='index.php?quanly=chitietsanpham&id=$row[0]' id='#tieuDe'>$row[1]</a> <br>";

                                        ?>

                                        <?php
                                            if(array_key_exists( "$row[0]", $arr_info)){
                                                $saleoffid = $arr_info["$row[0]"];
                                                $value =  $arr["$saleoffid"];
                                                $giasp = $row[2];
                                                $giasp_giam = $giasp - ($giasp * $value)/100; ?>
                                                            <!-- Neu ton tai sp co giam gia thi echo ra  -->
                                                <span style="font-weight: bold; margin-right:10px;"><?php echo $giasp_giam ?> VNĐ</span>
                                                <span style="text-decoration: line-through; font-weight:200; font-size:14px;" id="tien"><?php echo $giasp ?> VNĐ</span>

                                        <?php
                                            }else{ ?>
                                                <span style="font-weight: bold;" id="tien"><?php echo $row[2] ?> VNĐ</span>

                                        <?php

                                            }
                                        ?>



                                    </div>
                                </div>
                            <?php
                            }else{
                                if(count($arr_info) != 0){ ?>

                                    <?php
                                            if(array_key_exists( "$row[0]", $arr_info)){
                                                $saleoffid = $arr_info["$row[0]"];
                                                $value =  $arr["$saleoffid"];
                                                $giasp = $row[2];
                                                $giasp_giam = $giasp - ($giasp * $value)/100; ?>
                                                <div class="col-sm-4 item">
                                                    <div class="item-img">
                                                        <a href="index.php?quanly=chitietsanpham&id=<?php echo $row[0] ?>">
                                                            <?php
                                                            echo "<img src='uploads/$row[3]' alt=''>";
                                                            echo "<img src='uploads/$row[4]' alt=''>";
                                                            ?>
                                                        </a>
                                                    </div>
                                                    <div class="img-button">
                                                        <a href="index.php?quanly=chitietsanpham&id=<?php echo $row[0] ?>">Mua hàng</a>
                                                    </div>
                                                    <div class="item-info">
                                                        <hr>
                                                        <?php
                                                        echo "<a href='index.php?quanly=chitietsanpham&id=$row[0]' id='#tieuDe'>$row[1]</a> <br>";

                                                        ?>
                                                            <!-- Neu ton tai sp co giam gia thi echo ra  -->
                                                    <span style="font-weight: bold; margin-right:10px;"><?php echo $giasp_giam ?> VNĐ</span>
                                                    <span style="text-decoration: line-through; font-weight:200; font-size:14px;" id="tien"><?php echo $giasp ?> VNĐ</span>
                                                    </div>
                                                </div>
                                        <?php
                                            }?>


                                <?php

                                }else{
                                    echo "Khong co sp";
                                }
                            }
                        }
                    }else{
                        echo "Khong co san pham";
                    }

                    ?>
