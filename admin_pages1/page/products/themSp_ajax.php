<?php
    $mysqli = new mysqli("localhost","root","","dbdoan");
    session_start();

    if(isset($_SESSION['sp_info'])){
        $i =0;
        foreach($_SESSION['sp_info'] as $arr_sp){
            if($i == 0){
                $tensanpham = $arr_sp;
                $i++;
                continue;
            }
            if($i == 1){
                $giasanpham = $arr_sp;
                $i++;
                continue;
            }
            if($i == 2){
                $danhmucsanpham = $arr_sp;
                $i++;
                continue;
            }
            if($i == 3){
                $dongsanpham = $arr_sp;
                $i++;
                continue;
            }
            if($i == 4){
                $styleid = $arr_sp;
                $i++;
                continue;
            }
            if($i == 5){
                $thongtinsanpham = $arr_sp;
                $i++;
                continue;
            }
            if($i == 6){
                $mausanpham = $arr_sp;
                $i++;
                break;
            }
        }

        $dongsp_mapping = [
            'Nike' => 'dongsp1',
            'Adidas' => 'dongsp2',
            'Bitis' => 'dongsp3',
            'Puma' => 'dongsp4',
        ];
        $style_mapping = [
            'Bóng đá' => 'style1',
            'Bóng rổ' => 'style2',
            'Gym' => 'style3',
            'Chạy bộ' => 'style4',
        ];
        $dongsanpham = $dongsp_mapping[$dongsanpham] ?? '';
        $styleid = $style_mapping[$styleid] ?? '';

        $sql_them_sanpham = "INSERT INTO sanpham(tensp, giasp, danhmuc, dongspid, styleid, thongtinsp)
                            VALUES ('" . $tensanpham . "', '" . $giasanpham . "', '" . $danhmucsanpham . "', '" . $dongsanpham . "', '" . $styleid . "','" . $thongtinsanpham . "')";

        $anc_them_sanpham =  mysqli_query($mysqli, $sql_them_sanpham);



        // Retrieve the product id of the newly inserted record
        $sanphamid = mysqli_insert_id($mysqli);
        $colorid = array("color1", "color2", "color3", "color4", "color5", "color6", "color7", "color8");

        foreach($colorid as $colorid){
            if(isset($_SESSION['sp'][$colorid])){
                $hinhanh1 = $_SESSION['sp'][$colorid]['img1_alt'];
                $hinhanh2 = $_SESSION['sp'][$colorid]['img2_alt'];
                $hinhanh3 = $_SESSION['sp'][$colorid]['img3_alt'];
                $hinhanh4 = $_SESSION['sp'][$colorid]['img4_alt'];

                $sql_hinhanh = "INSERT INTO productcolor(productid, colorid,img1,img2,img3,img4)
                                VALUES ('" . $sanphamid . "', '".$colorid."', '" . $hinhanh1 . "', '" . $hinhanh2 . "', '" . $hinhanh3 . "', '" . $hinhanh4 . "')";
                $anc_hinhanh =  mysqli_query($mysqli, $sql_hinhanh);

                $size36 = $_SESSION['sp'][$colorid]['sl36'];
                $size37 = $_SESSION['sp'][$colorid]['sl37'];
                $size38 = $_SESSION['sp'][$colorid]['sl38'];
                $size39 = $_SESSION['sp'][$colorid]['sl39'];
                $size40 = $_SESSION['sp'][$colorid]['sl40'];
                $size41 = $_SESSION['sp'][$colorid]['sl41'];
                $size42 = $_SESSION['sp'][$colorid]['sl42'];
                $size43 = $_SESSION['sp'][$colorid]['sl43'];
                $size44 = $_SESSION['sp'][$colorid]['sl44'];

                $sql_soluong36 = "INSERT INTO procolorsize (procolorid, size, sl)
                VALUES ((SELECT productcolorid FROM productcolor WHERE productid = '" . $sanphamid . "' AND colorid='" . $colorid . "'), '36', '" . $size36 . "')";
                mysqli_query($mysqli, $sql_soluong36);


                $sql_soluong37 = "INSERT INTO procolorsize (procolorid, size, sl)
                VALUES ((SELECT productcolorid FROM productcolor WHERE productid = '" . $sanphamid . "' AND colorid='" . $colorid . "'), '37', '" . $size37 . "')";
                mysqli_query($mysqli, $sql_soluong37);

                $sql_soluong38 = "INSERT INTO procolorsize (procolorid, size, sl)
                VALUES ((SELECT productcolorid FROM productcolor WHERE productid = '" . $sanphamid . "' AND colorid='" . $colorid . "'), '38', '" . $size38 . "')";
                mysqli_query($mysqli, $sql_soluong38);

                $sql_soluong39 = "INSERT INTO procolorsize (procolorid, size, sl)
                VALUES ((SELECT productcolorid FROM productcolor WHERE productid = '" . $sanphamid . "' AND colorid='" . $colorid . "'), '39', '" . $size39 . "')";
                mysqli_query($mysqli, $sql_soluong39);

                $sql_soluong40 = "INSERT INTO procolorsize (procolorid, size, sl)
                VALUES ((SELECT productcolorid FROM productcolor WHERE productid = '" . $sanphamid . "' AND colorid='" . $colorid . "'), '40', '" . $size40 . "')";
                mysqli_query($mysqli, $sql_soluong40);

                $sql_soluong41 = "INSERT INTO procolorsize (procolorid, size, sl)
                VALUES ((SELECT productcolorid FROM productcolor WHERE productid = '" . $sanphamid . "' AND colorid='" . $colorid . "'), '41', '" . $size41 . "')";
                mysqli_query($mysqli, $sql_soluong41);

                $sql_soluong42 = "INSERT INTO procolorsize (procolorid, size, sl)
                VALUES ((SELECT productcolorid FROM productcolor WHERE productid = '" . $sanphamid . "' AND colorid='" . $colorid . "'), '42', '" . $size42 . "')";
                mysqli_query($mysqli, $sql_soluong42);

                $sql_soluong43 = "INSERT INTO procolorsize (procolorid, size, sl)
                VALUES ((SELECT productcolorid FROM productcolor WHERE productid = '" . $sanphamid . "' AND colorid='" . $colorid . "'), '43', '" . $size43 . "')";
                mysqli_query($mysqli, $sql_soluong43);

                $sql_soluong44 = "INSERT INTO procolorsize (procolorid, size, sl)
                VALUES ((SELECT productcolorid FROM productcolor WHERE productid = '" . $sanphamid . "' AND colorid='" . $colorid . "'), '44', '" . $size44 . "')";
                mysqli_query($mysqli, $sql_soluong44);


                // $sizes = ['36', '37', '38', '39', '40', '41', '42', '43', '44'];
                // foreach ($sizes as $size) {
                //     $quantity = $_POST['input_size' . $size];
                //     $sql_soluong = "INSERT INTO procolorsize (procolorid, size, sl)
                //         VALUES ((SELECT productcolorid FROM productcolor WHERE productid = '" . $sanphamid . "' AND colorid='" . $colorid . "'), '" . $size . "', '" . $quantity . "')";
                //     $anc_soluong =  mysqli_query($mysqli, $sql_soluong);

                // }

            }
        }

        unset($_SESSION['sp_info']);
        unset($_SESSION['sp']);

        echo "Thành công";
    }else{
        echo "Không thành công";
    }

    // $tensanpham = mysqli_real_escape_string($mysqli, $_POST['input_tensanpham']);
    // $giasanpham = $_POST['input_giasanpham'];
    // $danhmucsanpham = $_POST['select_danhmucsanpham'];
    // $dongsanpham = $_POST['select_dongsanpham'];
    // $styleid = $_POST['select_kieudang'];
    // $thongtinsanpham = $_POST['textarea_thongtinsanpham'];
    // $mausanpham = $_POST['select_mausanpham'];

    // Map values using associative arrays

    // // Handle picture updates
    // $hinhanh1 = $_FILES['input_upload_anh_1']['name'];
    // $hinhanh_tmp1 = $_FILES['input_upload_anh_1']['tmp_name'];

    // $hinhanh2 = $_FILES['input_upload_anh_2']['name'];
    // $hinhanh_tmp2 = $_FILES['input_upload_anh_2']['tmp_name'];

    // $hinhanh3 = $_FILES['input_upload_anh_3']['name'];
    // $hinhanh_tmp3 = $_FILES['input_upload_anh_3']['tmp_name'];

    // $hinhanh4 = $_FILES['input_upload_anh_4']['name'];
    // $hinhanh_tmp4 = $_FILES['input_upload_anh_4']['tmp_name'];

    // move_uploaded_file($hinhanh_tmp4, 'uploads/' . $hinhanh4);
    // move_uploaded_file($hinhanh_tmp3, 'uploads/' . $hinhanh3);
    // move_uploaded_file($hinhanh_tmp2, 'uploads/' . $hinhanh2);
    // move_uploaded_file($hinhanh_tmp1, 'uploads/' . $hinhanh1);

    // // Insert productcolor record
    // $sql_hinhanh = "INSERT INTO productcolor(productid, colorid,img1,img2,img3,img4)
    //                         VALUES ('" . $sanphamid . "', '".$mausanpham."', '" . $hinhanh1 . "', '" . $hinhanh2 . "', '" . $hinhanh3 . "', '" . $hinhanh4 . "')";
    // $anc_hinhanh =  mysqli_query($mysqli, $sql_hinhanh);



    // // Handle quantity updates

    // $size36 = $_POST['input_size36'];
    // $size37 = $_POST['input_size37'];
    // $size38 = $_POST['input_size38'];
    // $size39 = $_POST['input_size39'];
    // $size40 = $_POST['input_size40'];
    // $size41 = $_POST['input_size41'];
    // $size42 = $_POST['input_size42'];
    // $size43 = $_POST['input_size43'];
    // $size44 = $_POST['input_size44'];

    // $sql_soluong36 = "INSERT INTO procolorsize (procolorid, size, sl)
    // VALUES ((SELECT productcolorid FROM productcolor WHERE productid = '" . $sanphamid . "' AND colorid='" . $mausanpham . "'), '36', '" . $size36 . "')";
    // mysqli_query($mysqli, $sql_soluong36);


    // $sql_soluong37 = "INSERT INTO procolorsize (procolorid, size, sl)
    // VALUES ((SELECT productcolorid FROM productcolor WHERE productid = '" . $sanphamid . "' AND colorid='" . $mausanpham . "'), '37', '" . $size37 . "')";
    // mysqli_query($mysqli, $sql_soluong37);

    // $sql_soluong38 = "INSERT INTO procolorsize (procolorid, size, sl)
    // VALUES ((SELECT productcolorid FROM productcolor WHERE productid = '" . $sanphamid . "' AND colorid='" . $mausanpham . "'), '38', '" . $size38 . "')";
    // mysqli_query($mysqli, $sql_soluong38);

    // $sql_soluong39 = "INSERT INTO procolorsize (procolorid, size, sl)
    // VALUES ((SELECT productcolorid FROM productcolor WHERE productid = '" . $sanphamid . "' AND colorid='" . $mausanpham . "'), '39', '" . $size39 . "')";
    // mysqli_query($mysqli, $sql_soluong39);

    // $sql_soluong40 = "INSERT INTO procolorsize (procolorid, size, sl)
    // VALUES ((SELECT productcolorid FROM productcolor WHERE productid = '" . $sanphamid . "' AND colorid='" . $mausanpham . "'), '40', '" . $size40 . "')";
    // mysqli_query($mysqli, $sql_soluong40);

    // $sql_soluong41 = "INSERT INTO procolorsize (procolorid, size, sl)
    // VALUES ((SELECT productcolorid FROM productcolor WHERE productid = '" . $sanphamid . "' AND colorid='" . $mausanpham . "'), '41', '" . $size41 . "')";
    // mysqli_query($mysqli, $sql_soluong41);

    // $sql_soluong42 = "INSERT INTO procolorsize (procolorid, size, sl)
    // VALUES ((SELECT productcolorid FROM productcolor WHERE productid = '" . $sanphamid . "' AND colorid='" . $mausanpham . "'), '42', '" . $size42 . "')";
    // mysqli_query($mysqli, $sql_soluong42);

    // $sql_soluong43 = "INSERT INTO procolorsize (procolorid, size, sl)
    // VALUES ((SELECT productcolorid FROM productcolor WHERE productid = '" . $sanphamid . "' AND colorid='" . $mausanpham . "'), '43', '" . $size43 . "')";
    // mysqli_query($mysqli, $sql_soluong43);

    // $sql_soluong44 = "INSERT INTO procolorsize (procolorid, size, sl)
    // VALUES ((SELECT productcolorid FROM productcolor WHERE productid = '" . $sanphamid . "' AND colorid='" . $mausanpham . "'), '44', '" . $size44 . "')";
    // mysqli_query($mysqli, $sql_soluong44);


    // $sizes = ['36', '37', '38', '39', '40', '41', '42', '43', '44'];
    // foreach ($sizes as $size) {
    //     $quantity = $_POST['input_size' . $size];
    //     $sql_soluong = "INSERT INTO procolorsize (procolorid, size, sl)
    //         VALUES ((SELECT productcolorid FROM productcolor WHERE productid = '" . $sanphamid . "' AND colorid='" . $mausanpham . "'), '" . $size . "', '" . $quantity . "')";
    //     $anc_soluong =  mysqli_query($mysqli, $sql_soluong);
    //

?>
