<?php 
    session_start();
    include('../../config/config.php');

    if (!isset($connect)) {
        $connect = new mysqli('localhost','root','','dbdoan');
        $connect->set_charset("utf8");
    }

    if(isset($_POST['id']) && isset($_POST['size'])) {
        $id = $_POST['id'];
        $size = $_POST['size'];
        $sl = (int)$_POST['sl'];
        $ten = $_POST['ten'];
        $gia = $_POST['gia'];
        $img = $_POST['img'];

        $sql1 = "SELECT procolorsizeid FROM procolorsize WHERE procolorid='" . $id . "' AND size='" . $size . "'";
        $rs4 = $connect->query($sql1);
        
        $procolorsizeid = "";
        if ($rs4 && $rs4->num_rows > 0) {
            $row4 = $rs4->fetch_row();
            $procolorsizeid = $row4[0];
        }

        if ($procolorsizeid != "") {
            
            if (!isset($_SESSION['cart'][$procolorsizeid])) {
                $_SESSION['cart'][$procolorsizeid] = array(
                    'ten' => $ten,
                    'size' => $size,
                    'sl' => $sl,
                    'gia' => $gia,
                    'img' => $img,
                    'productcolorsizeid' => $procolorsizeid,
                    'productcolorid' => $id
                );
                echo "Thêm sản phẩm thành công";
            } 
            else {
                $sl_hien_tai = (int)$_SESSION['cart'][$procolorsizeid]['sl'];
                $sl_moi = $sl_hien_tai + $sl;
                
                $_SESSION['cart'][$procolorsizeid]['sl'] = $sl_moi;
                echo "Cập nhật số lượng thành công";
            }

        } else {
            echo "Lỗi: Không tìm thấy thông tin sản phẩm (Size không hợp lệ)";
        }
    } else {
        echo "Lỗi: Dữ liệu gửi lên không đủ";
    }
?>