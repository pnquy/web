<?php 
    // Kết nối CSDL
    $connect = new mysqli('localhost', 'root', '', 'dbdoan');
    
    // Kiểm tra kết nối
    if ($connect->connect_error) {
        die("0"); // Trả về 0 nếu lỗi kết nối
    }
    $connect->set_charset('utf8');

    // Kiểm tra biến đầu vào có tồn tại không
    if(isset($_POST['id']) && isset($_POST['size'])){
        
        // 1. Bảo mật: Xử lý ký tự đặc biệt để tránh lỗi SQL Injection
        $id = $connect->real_escape_string($_POST['id']);
        $size = $connect->real_escape_string($_POST['size']);
    
        // 2. Viết lại câu truy vấn chuẩn hơn
        $sq = "SELECT sl FROM procolorsize WHERE procolorid = '$id' AND size = '$size'";
        $res = $connect->query($sq);

        // 3. Kiểm tra có tìm thấy dữ liệu không
        if($res && $res->num_rows > 0){
            $row = $res->fetch_assoc();
            echo $row['sl']; // Trả về số lượng thực tế
        } else {
            echo "0"; // Nếu không tìm thấy size, trả về 0 (Hết hàng)
        }
    } else {
        echo "0"; // Nếu thiếu dữ liệu gửi lên
    }
?>