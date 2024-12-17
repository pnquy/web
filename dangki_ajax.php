<?php
  include "admincp/config/config.php";
  
    $hoten = $_POST['hoten'];
    $email = $_POST['Email'];
    $matkhau = $_POST['matkhau'];
    $sdt = $_POST['sodt'];
    $diachi = $_POST['diachi'];
    $tinhthanh = $_POST['tinhthanh'];
    $quanhuyen = $_POST['quanhuyen'];
    $phuongxa = $_POST['phuongxa'];
    $gioitinh = $_POST['gioitinh'];

    $hashedPassword = password_hash($matkhau, PASSWORD_DEFAULT);


    $result1 = $connect->query("SELECT khachhangid FROM khachhang where sodt = '".$sdt."'");
    $row1 = $result1->fetch_assoc();

    if($result1->num_rows > 0){
        echo "Số điện thoại đã tồn tại";
    }else{
        $result = $connect->query("SELECT COUNT(khachhangid) AS count FROM khachhang");
        $row = $result->fetch_assoc();
        $count = $row['count'] +1;

        $str = "insert into khachhang(khachhangid,hoten, diachi, tinhthanh, quanhuyen, phuongxa, sodt, email,gioitinh) values (concat('kh',$count),'" . $hoten . "','" . $diachi . "','" . $tinhthanh . "','" . $quanhuyen . "', '" . $phuongxa . "', '" . $sdt . "', '" . $email . "', '" . $gioitinh . "')";
        $rs = $connect->query($str);

        if ($rs == TRUE) {
          $sql = "INSERT INTO `taikhoankh`(`khachhangid`, `password`) VALUES (concat('kh',$count),'".$hashedPassword."')";
          $rs1 = $connect->query($sql);
          if($rs1 == true){
            echo "1";
          }else{
            echo "that bai";
          }
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }


    
  
  ?>