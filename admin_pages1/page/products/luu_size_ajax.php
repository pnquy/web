<?php 
    session_start();
    $mysqli = new mysqli("localhost","root","","dbdoan");

    $tensp = $_POST['tensp'];
    $giasp = $_POST['giasp'];
    $danhmuc = $_POST['danhmuc'];
    $dong = $_POST['dong'];
    $kieudang = $_POST['kieudang'];
    $thongtinsp = $_POST['thongtinsp'];
    $colorid = $_POST['colorid'];

    if(!isset($_SESSION['sp_info'])){
        $_SESSION['sp_info'] = array(
            'tensp' => $tensp,
            'giasp' => $giasp,
            'danhmuc' => $danhmuc,
            'dong' => $dong,
            'kieudang' => $kieudang,
            'thongtin' => $thongtinsp,
            'colorid' => $colorid,
        );
    }else{
        $_SESSION['sp_info']['tensp'] = $tensp;
        $_SESSION['sp_info']['giasp'] = $giasp;
        $_SESSION['sp_info']['danhmuc'] = $danhmuc;
        $_SESSION['sp_info']['dong'] = $dong;
        $_SESSION['sp_info']['kieudang'] = $kieudang;
        $_SESSION['sp_info']['thongtin'] = $thongtinsp;
        $_SESSION['sp_info']['colorid'] = $colorid;
    }

    $sl36 = $_POST['sl36'];
    $sl37 = $_POST['sl37'];
    $sl38 = $_POST['sl38'];
    $sl39 = $_POST['sl39'];
    $sl40 = $_POST['sl40'];
    $sl41 = $_POST['sl41'];
    $sl42 = $_POST['sl42'];
    $sl43 = $_POST['sl43'];
    $sl44 = $_POST['sl44'];

    // $img1_src = $_POST['img1_src'];
    // $img2_src = $_POST['img2_src'];
    // $img3_src = $_POST['img3_src'];
    // $img4_src = $_POST['img4_src'];

    $img1_alt = $_POST['img1_alt'];
    $img2_alt = $_POST['img2_alt'];
    $img3_alt = $_POST['img3_alt'];
    $img4_alt = $_POST['img4_alt'];

    

    if (!isset($_SESSION['sp'][$colorid])) {
        $_SESSION['sp'][$colorid] = array(
            'sl36' => $sl36,
            'sl37' => $sl37,
            'sl38' => $sl38,
            'sl39' => $sl39,
            'sl40' => $sl40,
            'sl41' => $sl41,
            'sl42' => $sl42,
            'sl43' => $sl43,
            'sl44' => $sl44,

            // 'img1_src' => $img1_src,
            // 'img2_src' => $img2_src,
            // 'img3_src' => $img3_src,
            // 'img4_src' => $img4_src,

            'img1_alt' => $img1_alt,
            'img2_alt' => $img2_alt,
            'img3_alt' => $img3_alt,
            'img4_alt' => $img4_alt,

            'colorid' => $colorid,
        );
        echo "Lưu thành công";

        
    } else {
        $_SESSION['sp'][$colorid]['sl36'] = $sl36;
        $_SESSION['sp'][$colorid]['sl37'] = $sl37;
        $_SESSION['sp'][$colorid]['sl38'] = $sl38;
        $_SESSION['sp'][$colorid]['sl39'] = $sl39;
        $_SESSION['sp'][$colorid]['sl40'] = $sl40;
        $_SESSION['sp'][$colorid]['sl41'] = $sl41;
        $_SESSION['sp'][$colorid]['sl42'] = $sl42;
        $_SESSION['sp'][$colorid]['sl43'] = $sl43;
        $_SESSION['sp'][$colorid]['sl44'] = $sl44;

        // $_SESSION['sp'][$colorid]['img1_src'] = $img1_src;
        // $_SESSION['sp'][$colorid]['img2_src'] = $img2_src;
        // $_SESSION['sp'][$colorid]['img3_src'] = $img3_src;
        // $_SESSION['sp'][$colorid]['img4_src'] = $img4_src;

        $_SESSION['sp'][$colorid]['img1_alt'] = $img1_alt;
        $_SESSION['sp'][$colorid]['img2_alt'] = $img2_alt;
        $_SESSION['sp'][$colorid]['img3_alt'] = $img3_alt;
        $_SESSION['sp'][$colorid]['img4_alt'] = $img4_alt;

        echo "Cập nhật số lượng thành công";
        
    }
?>