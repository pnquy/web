<?php 
    include "./admincp/config/config.php";
    session_start();
    $chk = "123";
  
    
    $taikhoan = $_POST['taikhoan'];
    $matkhau = $_POST['matkhau'];

    $str = "select password from khachhang, taikhoankh where khachhang.khachhangid = taikhoankh.khachhangid and  sodt = '" . $taikhoan . "'  limit 1";
    $rs = $connect->query($str);


    if ($rs->num_rows > 0) {
        while ($row = $rs->fetch_row()) {
            if(password_verify($matkhau, $row[0])){
                if (isset($_SESSION['url']) && $_SESSION['url'] != "http://localhost:3000/index.php?quanly=dangki")
                    $url = $_SESSION['url'];
                else
                    $url = "index.php"; 
                // $_SESSION['dangnhap'] = $row[0];
                $_SESSION['dangnhap'] = $taikhoan;
    
                echo $url;
            }else{
                echo "5";
            }
            
        }
    } else {//sai mk
        $sql = "select password from admin where username = '".$taikhoan."'";
        $rs1 = $connect->query($sql);
        
        if($rs1->num_rows > 0){
            while($row1 = $rs1->fetch_row()){
                if(password_verify($matkhau, $row1[0])){
                    $url = "admin_pages1/page/products/products_management.php";
                    echo $url;
                }else{
                    echo "5";
                }
                
            }
        }else{
            echo "5";
        }
    }

    // echo $matkhau;
    // $hashedPassword = password_hash($matkhau, PASSWORD_DEFAULT);
    // echo $hashedPassword;
    // $sql = "update admin set password = '".$hashedPassword."' where adminid = 'ad01'";
    // $rs = $connect->query($sql);

?>