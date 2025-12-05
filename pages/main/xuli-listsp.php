<?php
// Kết nối Database
$connect = new mysqli('localhost', 'root', '', 'dbdoan');
if ($connect->errno !== 0) {
    die("Error: Could not connect to the database. An error " . $connect->error . " ocurred.");
}
$connect->set_charset('utf8');

// Logic xử lý query dựa trên ID (Giữ nguyên logic của bạn)
$idsp = isset($_GET['idsp']) ? $_GET['idsp'] : 1;
$str = "";

switch ($idsp) {
    case 1: $str = "select productcolorid, tensp, giasp, img1, img2 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid;"; break;
    case 2: $str = "select productcolorid, tensp, giasp, img1, img2 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and danhmuc = 'Nam';"; break;
    case 3: $str = "select productcolorid, tensp, giasp, img1, img2 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and danhmuc = 'Nữ';"; break;
    // ... (Giữ nguyên các case khác của bạn để tiết kiệm diện tích) ...
    case 4: $str = "select productcolorid, tensp, giasp, img1, img2 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid;"; break;
    case 5: $str = "select productcolorid, tensp, giasp, img1, img2 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and dongsp.dongspid='dongsp1';"; break;
    case 6: $str = "select productcolorid, tensp, giasp, img1, img2 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and dongsp.dongspid='dongsp2';"; break;
    case 7: $str = "select productcolorid, tensp, giasp, img1, img2 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and dongsp.dongspid='dongsp3';"; break;
    case 8: $str = "select productcolorid, tensp, giasp, img1, img2 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and dongsp.dongspid='dongsp4';"; break;
    case 11: $str = "select productcolorid, tensp, giasp, img1, img2 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and sanpham.giasp >= 6000000;"; break;
    case 12: $str = "select productcolorid, tensp, giasp, img1, img2 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and sanpham.giasp >= 5000000 and sanpham.giasp <=5999000;"; break;
    case 13: $str = "select productcolorid, tensp, giasp, img1, img2 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and sanpham.giasp >= 4000000 and sanpham.giasp <=4999000;"; break;
    case 14: $str = "select productcolorid, tensp, giasp, img1, img2 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and sanpham.giasp >= 3000000 and sanpham.giasp <=3999000;"; break;
    case 15: $str = "select productcolorid, tensp, giasp, img1, img2 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and sanpham.giasp >= 2000000 and sanpham.giasp <=2999000;"; break;
    case 16: $str = "select productcolorid, tensp, giasp, img1, img2 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and sanpham.giasp <2000000;"; break;
    case 17: $str = "select productcolorid, tensp, giasp, img1, img2 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and sanpham.styleid='style1';"; break;
    case 18: $str = "select productcolorid, tensp, giasp, img1, img2 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and sanpham.styleid='style2';"; break;
    case 19: $str = "select productcolorid, tensp, giasp, img1, img2 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and sanpham.styleid='style3';"; break;
    case 20: $str = "select productcolorid, tensp, giasp, img1, img2 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and sanpham.styleid='style4';"; break;
}

// Logic Khuyến mãi
$str1 = "SELECT * FROM saleoff";
date_default_timezone_set('Asia/Jakarta');
$datenow = date("Y-m-d G:i:s", time());
$arr = array();
$rs1 = $connect->query($str1);
if ($rs1->num_rows > 0) {
    while ($row1 = $rs1->fetch_row()) {
        if("$datenow" >= date($row1[1]) && "$datenow" < date($row1[2])){
            $arr["$row1[0]"] = "$row1[3]";
        }
    }
}

$arr_info = array();
if(count($arr) != 0){
    foreach($arr as $x=>$x_value){
        $rs1 = $connect->query("SELECT * FROM `saleoffct` WHERE saleoffid = '$x'");
        if($rs1->num_rows > 0){
            while($row1 = $rs1->fetch_row()){
                $arr_info["$row1[2]"]= "$row1[1]";
            }
        }
    }
}

// Thực thi query sản phẩm
$rs = $connect->query($str);
if($rs && $rs->num_rows > 0){
    while($row = $rs->fetch_row()){
        $giasp = $row[2];
        $giasp_giam = $giasp;
        $has_sale = false;
        $percent = 0;

        if(array_key_exists("$row[0]", $arr_info)){
            $saleoffid = $arr_info["$row[0]"];
            $percent = $arr["$saleoffid"];
            $giasp_giam = $giasp - ($giasp * $percent)/100;
            $has_sale = true;
        }

        // Nếu là trang Sale Off (idsp=4) thì chỉ hiện sp giảm giá
        if($idsp == 4 && !$has_sale) continue;
        ?>

        <div class="col-lg-4 col-md-6 col-6 mb-4">
            <div class="product-card">
                <div class="item-img">
                    <a href="index.php?quanly=chitietsanpham&id=<?php echo $row[0] ?>">
                        <img src='uploads/<?php echo $row[3] ?>' alt='<?php echo $row[1] ?>'>
                        <img src='uploads/<?php echo $row[4] ?>' class="hover-img" alt='<?php echo $row[1] ?>'>
                    </a>
                    
                    <?php if($has_sale): ?>
                        <div class="position-absolute top-0 right-0 bg-danger text-white px-2 py-1 m-2 rounded small font-weight-bold" style="z-index: 5;">
                            -<?php echo $percent; ?>%
                        </div>
                    <?php endif; ?>

                    <div class="add-to-cart-btn">
                        <a href="index.php?quanly=chitietsanpham&id=<?php echo $row[0] ?>" class="btn">Xem chi tiết</a>
                    </div>
                </div>
                
                <div class="item-info">
                    <a href='index.php?quanly=chitietsanpham&id=<?php echo $row[0] ?>' class="product-name">
                        <?php echo $row[1] ?>
                    </a>
                    
                    <div class="price-group">
                        <?php if($has_sale): ?>
                            <span class="price-new"><?php echo number_format($giasp_giam, 0, ',', '.') ?> VNĐ</span>
                            <span class="price-old"><?php echo number_format($giasp, 0, ',', '.') ?>đ</span>
                        <?php else: ?>
                            <span class="price-new" style="color:#333;"><?php echo number_format($giasp, 0, ',', '.') ?> VNĐ</span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

    <?php 
    } 
} else {
    echo "<div class='col-12 text-center py-5'><p class='text-muted'>Không tìm thấy sản phẩm nào phù hợp.</p></div>";
}
?>