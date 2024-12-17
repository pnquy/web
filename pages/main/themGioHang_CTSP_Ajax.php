<?php 
    $connect = new mysqli('localhost','root','','dbdoan');
    session_start();

    $id = $_POST['id'];
    $size = $_POST['size'];
    $sl = $_POST['sl'];
    $ten = $_POST['ten'];
    $gia = $_POST['gia'];
    $img = $_POST['img'];
    // echo $id;
    // $ten = $_SESSION['dangnhap'];
    // $sql = "select khachhangid from khachhang where hoten = '" . $ten . "' limit 1";
    // $sodt = $_SESSION['dangnhap'];
    // $sql = "select khachhangid from khachhang where sodt = '" . $sodt . "' limit 1";
    // $rs3 = $connect->query($sql);
    // $khid = "";
    // while ($row3 = $rs3->fetch_row()) {
    //   $khid = $row3[0];
    // }


    $sql1 = "select procolorsizeid from procolorsize, productcolor where procolorsize.procolorid = productcolor.productcolorid and procolorid='" . $id . "' and size='" . $size . "'";
    $rs4 = $connect->query($sql1);
    $procolorsizeid = "";
    while ($row4 = $rs4->fetch_row()) {
        $procolorsizeid = $row4[0];
    }


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
        $check = true;
        echo "Thêm sản phẩm thành công";

        
    } else {
        $_SESSION['cart'][$procolorsizeid]['sl'] += $sl;
        echo "Cập nhật số lượng thành công";
        
    }
    
    
      
    
?>