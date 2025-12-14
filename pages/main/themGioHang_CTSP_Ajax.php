<?php 
    session_start();
    include('../../config/config.php'); // Đảm bảo đường dẫn kết nối đúng

    // Kiểm tra kết nối
    if (!isset($connect)) {
        $connect = new mysqli('localhost','root','','dbdoan');
        $connect->set_charset("utf8");
    }

    if(isset($_POST['id']) && isset($_POST['size'])) {
        $id = $_POST['id'];     // Đây là procolorid
        $size = $_POST['size'];
        $sl = (int)$_POST['sl']; // Ép kiểu số ngay từ đầu
        $ten = $_POST['ten'];
        $gia = $_POST['gia'];
        $img = $_POST['img'];

        // 1. Tìm ID chi tiết sản phẩm (procolorsizeid)
        $sql1 = "SELECT procolorsizeid FROM procolorsize WHERE procolorid='" . $id . "' AND size='" . $size . "'";
        $rs4 = $connect->query($sql1);
        
        $procolorsizeid = "";
        if ($rs4 && $rs4->num_rows > 0) {
            $row4 = $rs4->fetch_row();
            $procolorsizeid = $row4[0];
        }

        // 2. Kiểm tra nếu tìm thấy ID hợp lệ mới xử lý
        if ($procolorsizeid != "") {
            
            // Trường hợp 1: Sản phẩm chưa có trong giỏ -> Thêm mới
            if (!isset($_SESSION['cart'][$procolorsizeid])) {
                $_SESSION['cart'][$procolorsizeid] = array(
                    'ten' => $ten,
                    'size' => $size,
                    'sl' => $sl,         // Key là 'sl'
                    'gia' => $gia,
                    'img' => $img,
                    'productcolorsizeid' => $procolorsizeid,
                    'productcolorid' => $id
                );
                echo "Thêm sản phẩm thành công";
            } 
            // Trường hợp 2: Sản phẩm đã có -> Cộng dồn số lượng
            else {
                // SỬA LỖI: Dùng đúng key $procolorsizeid và đúng trường 'sl'
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