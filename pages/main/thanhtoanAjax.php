<?php
    $connect = new mysqli('localhost','root','','dbdoan');
    session_start();

    if(isset($_SESSION['cart'])){
        $tenkh = $_POST['tenkh'];
        $tinhthanh = $_POST['tinhthanh'];
        $quanhuyen = $_POST['quanhuyen'];
        $phuongxa = $_POST['phuongxa'];
        $diachi = $_POST['diachi'];
        $email = $_POST['email'];
        $sdt = $_POST['sdt'];
        
        $tienhang = $_POST['tienhang'];
        $phuongthuc = $_POST['phuongthuc'];

        $tongcong = $_POST['tongcong'];
        $phiShip = $_POST['shippingFee'];

        $sql1 = "Select khachhangid from khachhang where sodt = '" . $sdt . "'";
        $rs1 = $connect->query($sql1);
        $row1 = $rs1->fetch_assoc();

        $khid = $row1['khachhangid'];
                
        // Update lại thông tin khách hàng
        $str = "update khachhang set hoten='" . $tenkh . "',diachi='" . $diachi . "',tinhthanh='" . $tinhthanh . "',quanhuyen='" . $quanhuyen . "',phuongxa='" . $phuongxa . "',email='" . $email . "' WHERE sodt = '" . $sdt . "'";
        $rs = $connect->query($str);


        $sql5 = "SELECT CURDATE() as date;";
        $rs5 = $connect->query($sql5);
        $row5 = $rs5->fetch_assoc();

        $ngayorder = $row5['date'];
        // $ngayorder = date("Y-m-d H:i:s");

        $magiamgiaid = "";
        // Nếu có add mã giảm giá thì lấy mã giảm giá
        if (isset($_SESSION['magiamgia'])) {
            $sessionMGG = $_SESSION['magiamgia'];
            $sql2 = "select magiamgiaid from magiamgia where codemagiamgia = '" . $sessionMGG . "'";
            $rs2 = $connect->query($sql2);
            $row2 = $rs2->fetch_assoc();
            $magiamgiaid = $row2['magiamgiaid'];
        }
        
        // Chèn thông tin vào bảng thanh toán
        $sql4 = "INSERT INTO `thanhtoan`(`khachhangid`, `ngayorder`, `magiamgiaid`, `tongtien`, `hinhthucthanhtoan`, `tienhang`, `phiship`, `trangthai`) VALUES ('" . $khid . "','" . $ngayorder . "','" . $magiamgiaid . "','" . $tongcong . "','" . $phuongthuc . "', '" . $tienhang . "' , '" . $phiShip . "','Chờ xác nhận')";
        $rs4 = $connect->query($sql4);

        
        // Chèn vào bảng thanh toán chi tiết
        if ($rs4 == true) {
            $sql3 = "select thanhtoanid from thanhtoan where khachhangid = '".$khid."' ORDER BY thanhtoanid DESC LIMIT 1; ";
            $rs3 = $connect->query($sql3);
            $row3 = $rs3->fetch_assoc();
            $thanhtoanidnumber = $row3['thanhtoanid'];
            
            foreach ($_SESSION['cart'] as $pro) {

                $sql7 = "INSERT INTO `thanhtoanct`(`thanhtoanid`, `productcolorsizeid`, `soluong`) VALUES ( '" . $thanhtoanidnumber . "' ,  '" . $pro['productcolorsizeid'] . "', '" . $pro['sl'] . "')";
                $rs7 = $connect->query($sql7);

                $sql8 = "SELECT `sl` FROM `procolorsize` WHERE `procolorsizeid`='".$pro['productcolorsizeid']."'";
                $rs8 = $connect->query($sql8);
                $row8 = $rs8->fetch_assoc();
                $pro_sl = $row8['sl'];

                $pro_sl = $pro_sl - $pro['sl'];
                $sql9 = "UPDATE `procolorsize` SET `sl`='".$pro_sl."' WHERE `procolorsizeid`='".$pro['productcolorsizeid']."'";
                $rs9 = $connect->query($sql9);
            }
            unset($_SESSION['cart']);
            unset($_SESSION['magiamgia']);
            echo "thanh cong";
        } else {
            echo "that bai";
        }
        
    
    }else{
        echo "Chưa có giỏ hàng";
    }
?>