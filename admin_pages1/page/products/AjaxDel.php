<?php
include('../../../config/config.php');

$sanphamid = $_POST['sanphamid'];
$colorid = $_POST['colorid'];


// $sanphamid = $_GET['sanphamid'];
//     $colorid = $_GET['colorid'];

    $sql_xoa_hinhanh = "SELECT * FROM productcolor WHERE productid = '" . $sanphamid . "' AND  colorid = '" . $colorid . "' LIMIT 1";
    $query_xoa_hinhanh = mysqli_query($mysqli, $sql_xoa_hinhanh);

    while ($row = mysqli_fetch_array($query_xoa_hinhanh)) {
        unlink('uploads/' . $row['img1']);
        unlink('uploads/' . $row['img2']);
        unlink('uploads/' . $row['img3']);
        unlink('uploads/' . $row['img4']);
    }

    $cnt = "select count(productcolorid) as cnt FROM productcolor WHERE productid = '" . $sanphamid . "'";
    $cnt_1 = mysqli_query($mysqli, $cnt);

    while($row1 = mysqli_fetch_array($cnt_1)){
        $tmp = $row1['cnt'];
    }
    if($tmp == 1){
        $sql_xoa_sanpham = "DELETE FROM sanpham WHERE sanphamid = '" . $sanphamid . "'";
        $anc_xoa_sanpham = mysqli_query($mysqli, $sql_xoa_sanpham);
    }else{
        $sql_xoa_productcolor = "DELETE FROM productcolor WHERE productid = '" . $sanphamid . "' and colorid = '" . $colorid . "'";
        $anc_xoa_productcolor = mysqli_query($mysqli, $sql_xoa_productcolor);
        $sql_xoa_procolorsize = "DELETE FROM procolorsize WHERE procolorid IN (SELECT productcolorid FROM productcolor WHERE productid = '" . $sanphamid . "' and colorid = '" . $colorid . "')";
        $anc_xoa_procolorsize = mysqli_query($mysqli, $sql_xoa_procolorsize);
    }

