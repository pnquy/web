<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../dashboard/admin_dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Thêm sản phẩm</title>
    <style>
        .edit{
            padding: 10px;
        }
        .grid-container {
            display: grid;
            grid-template-columns: auto auto;
            padding: 30px;
        }

        .QuantityPicture {
            padding-left: 50px;
        }

        #div_themsanpham,
        #div_giasanpham,
        #div_danhmucsanpham,
        #div_dongsanpham,
        #div_kieudang,
        #div_thongtinsanpham {
            margin-bottom: 10px;
        }

        #label_tensanpham,
        #label_giasanpham,
        #label_danhmucsanpham,
        #label_dongsanpham,
        #label_kieudang,
        #label_thongtinsanpham,
        #label_mausanpham {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        #input_tensanpham,
        #input_giasanpham {
            width: 100%;
            max-width: 460px;
            padding: 8px;
        }

        #select_danhmucsanpham,
        #select_dongsanpham,
        #select_kieudang {
            padding: 4px;
        }

        #textarea_thongtinsanpham {
            width: 100%;
            max-width: 460px;
        }

        select {
            cursor: pointer;
        }

        #textarea_thongtinsanpham {
            resize: vertical;
        }

        /* Style cho phần "Thêm sản phẩm" */
        .text-hnm {
            font-size: 1.5em;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .section_themsanpham {
            position: relative;
            left: 250px;
            height: 100vh;
            width: calc(100% - 250px);
            background: var(--body-color);
            transition: var(--tran-05);
        }

        .sidebar-hnm.close~.section_themsanpham {
            left: 88px;
            width: calc(100% - 88px);
        }

        .section_themsanpham .text-hnm {
            font-size: 30px;
            font-weight: 500;
            color: var(--text-color);
            padding: 8px 40px;
            caret-color: transparent;
        }

        .section_themsanpham {
            display: flex;
            align-items: stretch;
        }

        .div_products_add_1 {
            flex: 1;
            padding: 10px;
            align-items: center;
        }

        .div_products_add_2 {
            flex: 2;
            padding: 10px;
        }

        #label_mausanpham {
            margin-top: 72px;
        }


        #color-box_OffwhiteGum {
            margin-right: 10px;
            background-color: #FEFBEF;
            width: 20px;
            height: 20px;
            display: inline-block;
            cursor: pointer;
            border-radius: 50%;
        }

        #color-box_Rustic {
            margin-right: 10px;
            background-color: #EBD0A2;
            width: 20px;
            height: 20px;
            display: inline-block;
            cursor: pointer;
            border-radius: 50%;
        }

        #color-box_RealTeal {
            margin-right: 10px;
            background-color: #1C487C;
            width: 20px;
            height: 20px;
            display: inline-block;
            cursor: pointer;
            border-radius: 50%;
        }

        #color-box_White {
            margin-right: 10px;
            background-color: #FFFFFF;
            width: 20px;
            height: 20px;
            display: inline-block;
            cursor: pointer;
            border-radius: 50%;
        }

        #color-box_Evergreen {
            margin-right: 10px;
            background-color: #6D9951;
            width: 20px;
            height: 20px;
            display: inline-block;
            cursor: pointer;
            border-radius: 50%;
        }

        #color-box_BlackGum {
            margin-right: 10px;
            background-color: #464646;
            width: 20px;
            height: 20px;
            display: inline-block;
            cursor: pointer;
            border-radius: 50%;
        }

        #color-box_CorlurayMix {
            margin-right: 10px;
            background-color: #F5D255;
            width: 20px;
            height: 20px;
            display: inline-block;
            cursor: pointer;
            border-radius: 50%;
        }

        #color-box_MonksRobe {
            margin-right: 10px;
            background-color: #77553D;
            width: 20px;
            height: 20px;
            display: inline-block;
            cursor: pointer;
            border-radius: 50%;
        }

        .color-option {
            width: 20px;
            height: 20px;
            display: inline-block;
            cursor: pointer;
            border-radius: 50%;
            margin-right: 10px;
        }

        .color-option.selected {
            border: 2px solid #F15E2C;
        }

        #div_table_size {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #div_table_size table form tr td {
            margin-right: 10px;
        }


        #label_size36,
        #label_size37,
        #label_size38,
        #label_size39,
        #label_size40,
        #label_size41,
        #label_size42,
        #label_size43,
        #label_size44 {
            font-weight: bold;
        }

        #div_table_size table tr td {
            padding: 15px;
        }

        .input_size {
            max-width: 140px;
            padding: 6px;
        }

        #div_hienthi_anh1 img {
            width: 270px;
            height: 180px;
        }

        #div_hienthi_anh2 img {
            width: 270px;
            height: 180px;
        }

        #div_hienthi_anh3 img {
            width: 270px;
            height: 180px;
        }

        #div_hienthi_anh4 img {
            width: 270px;
            height: 180px;
        }


        .div_upload {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        #div_upload_anh_1,
        #div_upload_anh_2,
        #div_upload_anh_3,
        #div_upload_anh_4 {
            flex: 0 0 calc(48% - 10px);
            box-sizing: border-box;
        }

        #div_upload_anh_1,
        #div_upload_anh_2,
        #div_upload_anh_3,
        #div_upload_anh_4 {
            margin-bottom: 30px;
        }

        #div_color_size_uploadimage {
            display: none;
        }

        .div_upload {
            display: flex;
            max-width: 600px;
            width: 100%;
            justify-content: center;
            align-items: center;
        }

        .div_upload {
            margin: auto;
        }

        #div_color_size_uploadimage {
            border-style: solid;
            max-width: 1000px;
            border-color: #ff5f17;
        }

        #div_products_add_enter {
            margin-left: 40px;
        }

        #div_danhmucsanpham,
        #div_dongsanpham,
        #div_kieudang {
            flex: 1;
            margin-right: 0px;
        }

        #div_danhmuc_dong_kieudang {
            display: flex;
            flex-wrap: wrap;
        }

        .btn-themsanpham {
            display: flex;
            background-color: #ff5f17;
            border: none;
            color: white;
            padding: 5px 15px;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
            font-family: "Quicksand", sans-serif;
            font-size: 18px;
            font-weight: 500;
            outline: none;
            border-radius: 5px;
            height: fit-content;
            width: fit-content;
        }

        .btn-themsanpham:hover {
            background: #d54e10;
        }
    </style>

</head>

<body>

    <?php
    include('../../navigation/menu_navigation.php');
    ?>
    <section class="section_themsanpham">
            <div class="grid-container">
                    <?php
                        if(isset($_SESSION['sp_info'])){
                            $i = 0;
                            foreach($_SESSION['sp_info'] as $p){
                              if($i == 0){
                                $tensp = $p;
                                ++$i;
                                continue;
                              } if($i == 1){
                                $giasp = $p;
                                ++$i;
                                continue;
                              } if($i == 2){
                                $danhmuc = $p;
                                ++$i;
                                continue;
                              } if($i == 3){
                                $dong = $p;
                                ++$i;
                                continue;
                              }if($i == 4){
                                $kieudang = $p;
                                ++$i;
                                continue;
                              }if($i == 5){
                                $thongtin = $p;
                                ++$i;
                                break;
                              }
                            }
                    ?>
                         <div class="grid-item">
                            <p class="text text-hnm">Thêm sản phẩm</p>
                            <div class="edit">
                                <div id="div_themsanpham">
                                    <label id="label_tensanpham">Tên sản phẩm</label>
                                    <input type="text" id="input_tensanpham" onclick="un_validate()" name="input_tensanpham" placeholder="Nhập tên sản phẩm" value="<?php echo $tensp; ?>">
                                </div>
                                <br>
                                <div id="div_giasanpham">
                                    <label id="label_giasanpham">Giá sản phẩm</label>
                                    <input type="text" id="input_giasanpham" name="input_giasanpham" placeholder="Nhập giá sản phẩm" value="<?php echo $giasp; ?>">
                                </div>
                                <br>
                                <div id="div_danhmuc_dong_kieudang">
                                    <div id="div_danhmucsanpham">
                                        <label id="label_danhmucsanpham">Giới tính</label>
                                        <select id="select_danhmucsanpham" name="select_danhmucsanpham">
                                            <option value="Nam" <?php if ($danhmuc == 'Nam') echo ' selected="selected"'; ?>>Nam</option>
                                            <option value="Nữ" <?php if ($danhmuc == 'Nữ') echo ' selected="selected"'; ?>>Nữ</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div id="div_dongsanpham">
                                        <label id="label_dongsanpham">Dòng</label>
                                        <select id="select_dongsanpham" name="select_dongsanpham">
                                            <option value="Nike" <?php if ($dong == 'Nike') echo ' selected="selected"'; ?>>Nike</option>
                                            <option value="Adidas" <?php if ($dong == 'Adidas') echo ' selected="selected"'; ?>>Adidas</option>
                                            <option value="Bitis" <?php if ($dong == 'Bitis') echo ' selected="selected"'; ?>>Biti's</option>
                                            <option value="Puma" <?php if ($dong == 'Puma') echo ' selected="selected"'; ?>>Puma</option>

                                        </select>
                                    </div>
                                    <br>
                                    <div id="div_kieudang">
                                        <label id="label_kieudang">Loại giày</label>
                                        <select id="select_kieudang" name="select_kieudang">
                                            <option value="Bóng đá" <?php if ($dong == 'Bóng đá') echo ' selected="selected"'; ?>>Bóng đá</option>
                                            <option value="Bóng rổ"<?php if ($dong == 'Bóng rổ') echo ' selected="selected"'; ?>>Bóng rổ</option>
                                            <option value="Gym"<?php if ($dong == 'Gym') echo ' selected="selected"'; ?>>Gym</option>
                                            <option value="Chạy bộ"<?php if ($dong == 'Chạy bộ') echo ' selected="selected"'; ?>>Chạy bộ</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div id="div_thongtinsanpham">
                                    <label id="label_thongtinsanpham">Thông tin sản phẩm</label>
                                    <textarea id="textarea_thongtinsanpham" name="textarea_thongtinsanpham" rows="8"><?php echo $thongtin ?></textarea>
                                </div>

                                <input type="submit" name="themsanpham" id="addsp" value="Thêm sản phẩm" class="btn-themsanpham">
                                <span id="btn_themsp" style="font-weight: bold; color:red"></span>

                            </div>
                        </div>

                <?php


                    }else{ ?>
                        <div class="grid-item">
                            <p class="text text-hnm">Thêm sản phẩm</p>
                            <div class="edit">
                                <div id="div_themsanpham">
                                    <label id="label_tensanpham">Tên sản phẩm</label>
                                    <input type="text" id="input_tensanpham" name="input_tensanpham" placeholder="Nhập tên sản phẩm">
                                </div>
                                <br>
                                <div id="div_giasanpham">
                                    <label id="label_giasanpham">Giá sản phẩm</label>
                                    <input type="text" id="input_giasanpham" name="input_giasanpham" placeholder="Nhập giá sản phẩm">
                                </div>
                                <br>
                                <div id="div_danhmuc_dong_kieudang">
                                    <div id="div_danhmucsanpham">
                                        <label id="label_danhmucsanpham">Giới tính</label>
                                        <select id="select_danhmucsanpham" name="select_danhmucsanpham">
                                            <option value="Nam">Nam</option>
                                            <option value="Nữ">Nữ</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div id="div_dongsanpham">
                                        <label id="label_dongsanpham">Thương hiệu</label>
                                        <select id="select_dongsanpham" name="select_dongsanpham">
                                            <option value="Nike">Nike</option>
                                            <option value="Adidas">Adidas</option>
                                            <option value="Bitis">Biti's</option>
                                            <option value="Puma">Puma</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div id="div_kieudang">
                                        <label id="label_kieudang">Loại giày</label>
                                        <select id="select_kieudang" name="select_kieudang">
                                            <option value="Bóng đá">Bóng đá</option>
                                            <option value="Bóng rổ">Bóng rổ</option>
                                            <option value="Gym">Gym</option>
                                            <option value="Chạy bộ">Chạy bộ</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div id="div_thongtinsanpham">
                                    <label id="label_thongtinsanpham">Thông tin sản phẩm</label>
                                    <textarea id="textarea_thongtinsanpham" name="textarea_thongtinsanpham" rows="8"></textarea>
                                </div>

                                <input type="submit" name="themsanpham" id="addsp" value="Thêm sản phẩm" class="btn-themsanpham">
                                <span id="btn_themsp" style="font-weight: bold; color:red"></span>
                            </div>
                        </div>
                        <?php

                            }
                        ?>

                <div class="grid-item QuantityPicture">
                    <div id="div_mausanpham">
                        <?php
                            if(isset($_COOKIE['colorid'])){ ?>
                                <label id="label_mausanpham">Màu sản phẩm:
                                <select id="select_mausanpham" name="select_mausanpham">
                                    <option value="color1" <?php if ($_COOKIE['colorid'] == 'color1') echo ' selected="selected"';  ?>>Offwhite/Gum</option>
                                    <option value="color2" <?php if ($_COOKIE['colorid'] == 'color2') echo ' selected="selected"';  ?>>Rustic</option>
                                    <option value="color3" <?php if ($_COOKIE['colorid'] == 'color3') echo ' selected="selected"';  ?>>Real Teal</option>
                                    <option value="color4" <?php if ($_COOKIE['colorid'] == 'color4') echo ' selected="selected"';  ?>>White</option>
                                    <option value="color5" <?php if ($_COOKIE['colorid'] == 'color5') echo ' selected="selected"';  ?>>Evergreen</option>
                                    <option value="color6" <?php if ($_COOKIE['colorid'] == 'color6') echo ' selected="selected"';  ?>>Black/Gum</option>
                                    <option value="color7" <?php if ($_COOKIE['colorid'] == 'color7') echo ' selected="selected"';  ?>>Corluray Mix</option>
                                    <option value="color8" <?php if ($_COOKIE['colorid'] == 'color8') echo ' selected="selected"';  ?>>Monk\"s Robe</option>
                                </select>
                        </label>
                        <?php

                            }else{ ?>
                            <label id="label_mausanpham">Màu sản phẩm:
                                <select id="select_mausanpham" name="select_mausanpham">
                                    <option value="color1" >Offwhite/Gum</option>
                                    <option value="color2" >Rustic</option>
                                    <option value="color3" >Real Teal</option>
                                    <option value="color4" >White</option>
                                    <option value="color5" >Evergreen</option>
                                    <option value="color6" >Black/Gum</option>
                                    <option value="color7" >Corluray Mix</option>
                                    <option value="color8" >Monk\"s Robe</option>
                                </select>
                        <?php

                            }
                        ?>

                        <?php
                            if(isset($_COOKIE['colorid'])){
                                if(isset($_SESSION['sp'][$_COOKIE['colorid']])){ ?>
                                    <!-- Neu ton tai session  code html-->
                                    <table>
                                        <tr>
                                            <td>
                                                <div>
                                                    <label id="label_size36">Size 36</label>
                                                    <input class="input_size" id="input_size36" name="input_size36" type="text" placeholder="Nhập số lượng..." value="<?php echo $_SESSION['sp'][$_COOKIE['colorid']]['sl36'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <label id="label_size39">Size 39</label>
                                                    <input class="input_size" id="input_size39" name="input_size39" type="text" placeholder="Nhập số lượng..." value="<?php echo $_SESSION['sp'][$_COOKIE['colorid']]['sl39'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <label id="label_size42">Size 42</label>
                                                    <input class="input_size" id="input_size42" name="input_size42" type="text" placeholder="Nhập số lượng..." value="<?php echo $_SESSION['sp'][$_COOKIE['colorid']]['sl42'] ?>">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div>
                                                    <label id="label_size37">Size 37</label>
                                                    <input class="input_size" id="input_size37" name="input_size37" type="text" placeholder="Nhập số lượng..." value="<?php echo $_SESSION['sp'][$_COOKIE['colorid']]['sl37'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <label id="label_size40">Size 40</label>
                                                    <input class="input_size" id="input_size40" name="input_size40" type="text" placeholder="Nhập số lượng..." value="<?php echo $_SESSION['sp'][$_COOKIE['colorid']]['sl40'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <label id="label_size43">Size 43</label>
                                                    <input class="input_size" id="input_size43" name="input_size43" type="text" placeholder="Nhập số lượng..." value="<?php echo $_SESSION['sp'][$_COOKIE['colorid']]['sl43'] ?>">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div>
                                                    <label id="label_size38">Size 38</label>
                                                    <input class="input_size" id="input_size38" name="input_size38" type="text" placeholder="Nhập số lượng..." value="<?php echo $_SESSION['sp'][$_COOKIE['colorid']]['sl38'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <label id="label_size41">Size 41</label>
                                                    <input class="input_size" id="input_size41" name="input_size41" type="text" placeholder="Nhập số lượng..."value="<?php echo $_SESSION['sp'][$_COOKIE['colorid']]['sl41'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <label id="label_size44">Size 44</label>
                                                    <input class="input_size" id="input_size44" name="input_size44" type="text" placeholder="Nhập số lượng..."value="<?php echo $_SESSION['sp'][$_COOKIE['colorid']]['sl44'] ?>">
                                                </div>
                                            </td>
                                        </tr>

                                    </table>
                                    <table>
                                        <tr>
                                            <td>
                                                <div id="div_upload_anh_1">
                                                    <label id="label_anh1"><b>Ảnh 1</b> </label><br>
                                                    <input type="file" id="input_upload_anh_1" name="input_upload_anh_1" accept=".jpg, .jpeg, .png">
                                                    <?php
                                                            if($_SESSION['sp'][$_COOKIE['colorid']]['img1_alt'] != ""){
                                                                $alt1 = $_SESSION['sp'][$_COOKIE['colorid']]['img1_alt']; ?>

                                                    <input type="hidden" name="" id="img1" src="../../../uploads/<?php echo $alt1 ?>" alt="<?php echo $alt1 ?>">
                                                    <div id="div_hienthi_anh1">

                                                            <img src="../../../uploads/<?php echo $alt1 ?>" alt="<?php echo $alt1 ?>">
                                                        <?php }else {?>
                                                            <input type="hidden" name="" id="img1" src="" alt="">
                                                            <div id="div_hienthi_anh1"></div>
                                                        <?php } ?>
                                                    </div>
                                                </div>


                                            </td>
                                            <td>
                                                <div id="div_upload_anh_2">
                                                    <label id="label_anh2"><b>Ảnh 2</b> </label><br>
                                                    <input type="file" id="input_upload_anh_2" name="input_upload_anh_2" accept=".jpg, .jpeg, .png">
                                                    <?php
                                                            if( $_SESSION['sp'][$_COOKIE['colorid']]['img2_alt'] != ""){
                                                                $alt2 = $_SESSION['sp'][$_COOKIE['colorid']]['img2_alt']; ?>

                                                    <input type="hidden" name="" id="img2" src="../../../uploads/<?php echo $alt2 ?>" alt="<?php echo $alt2 ?>">
                                                    <div id="div_hienthi_anh2">

                                                            <img src="../../../uploads/<?php echo $alt2 ?>" alt="<?php echo $alt2 ?>">

                                                    </div>

                                                    <?php } else {?>
                                                        <input type="hidden" name="" id="img2" src="" alt="">
                                                        <div id="div_hienthi_anh2"></div>
                                                    <?php }  ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div id="div_upload_anh_3">
                                                    <label id="label_anh3"><b>Ảnh 3</b> </label><br>
                                                    <input type="file" id="input_upload_anh_3" name="input_upload_anh_3" accept=".jpg, .jpeg, .png">
                                                    <?php
                                                            if($_SESSION['sp'][$_COOKIE['colorid']]['img3_alt'] != ""){
                                                                $alt3 = $_SESSION['sp'][$_COOKIE['colorid']]['img3_alt']; ?>

                                                    <input type="hidden" name="" id="img3" src="../../../uploads/<?php echo $alt3 ?>" alt="<?php echo $alt3 ?>">
                                                    <div id="div_hienthi_anh3">

                                                            <img src="../../../uploads/<?php echo $alt3 ?>" alt="<?php echo $alt3 ?>">
                                                        <?php }else { ?>
                                                            <input type="hidden" name="" id="img3" src="" alt="">
                                                            <div id="div_hienthi_anh3"></div>
                                                        <?php }  ?>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div id="div_upload_anh_4">
                                                    <label id="label_anh4"><b>Ảnh 4</b> </label><br>
                                                    <input type="file" id="input_upload_anh_4" name="input_upload_anh_4" accept=".jpg, .jpeg, .png">
                                                    <?php
                                                            if($_SESSION['sp'][$_COOKIE['colorid']]['img4_alt'] != ""){
                                                                $alt4 = $_SESSION['sp'][$_COOKIE['colorid']]['img4_alt']; ?>

                                                    <input type="hidden" name="" id="img4" src="../../../uploads/<?php echo $alt4 ?>" alt="<?php echo $alt4 ?>">
                                                    <div id="div_hienthi_anh4">

                                                            <img src="../../../uploads/<?php echo $alt4 ?>" alt="<?php echo $alt4 ?>">

                                                    </div>
                                                    <?php }else{ ?>
                                                        <input type="hidden" name="" id="img4" src="" alt="">
                                                        <div id="div_hienthi_anh4"></div>
                                                    <?php } ?>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>

                                    <input type="submit" class="btn-themsanpham" value="Lưu" id="luu">
                                    <span id="rs" style="color: red; font-weight: bold; "></span>
                                </div>
                            </div>

                            <?php
                                }else{ ?>
                                <!-- Neu k ton tai -->
                                <table>
                                    <tr>
                                        <td>
                                            <div>
                                                <label id="label_size36">Size 36</label>
                                                <input class="input_size" id="input_size36" name="input_size36" type="text" placeholder="Nhập số lượng...">
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <label id="label_size39">Size 39</label>
                                                <input class="input_size" id="input_size39" name="input_size39" type="text" placeholder="Nhập số lượng...">
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <label id="label_size42">Size 42</label>
                                                <input class="input_size" id="input_size42" name="input_size42" type="text" placeholder="Nhập số lượng...">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div>
                                                <label id="label_size37">Size 37</label>
                                                <input class="input_size" id="input_size37" name="input_size37" type="text" placeholder="Nhập số lượng...">
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <label id="label_size40">Size 40</label>
                                                <input class="input_size" id="input_size40" name="input_size40" type="text" placeholder="Nhập số lượng...">
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <label id="label_size43">Size 43</label>
                                                <input class="input_size" id="input_size43" name="input_size43" type="text" placeholder="Nhập số lượng...">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div>
                                                <label id="label_size38">Size 38</label>
                                                <input class="input_size" id="input_size38" name="input_size38" type="text" placeholder="Nhập số lượng...">
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <label id="label_size41">Size 41</label>
                                                <input class="input_size" id="input_size41" name="input_size41" type="text" placeholder="Nhập số lượng...">
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <label id="label_size44">Size 44</label>
                                                <input class="input_size" id="input_size44" name="input_size44" type="text" placeholder="Nhập số lượng...">
                                            </div>
                                        </td>
                                    </tr>

                                </table>
                                <table>
                                    <tr>
                                        <td>
                                            <div id="div_upload_anh_1">
                                                <label id="label_anh1"><b>Ảnh 1</b> </label><br>
                                                <input type="file" id="input_upload_anh_1" name="input_upload_anh_1" accept=".jpg, .jpeg, .png">
                                                <input type="hidden" name="" id="img1" src="" alt="">
                                                <div id="div_hienthi_anh1"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <div id="div_upload_anh_2">
                                                <label id="label_anh2"><b>Ảnh 2</b> </label><br>
                                                <input type="file" id="input_upload_anh_2" name="input_upload_anh_2" accept=".jpg, .jpeg, .png">
                                                <input type="hidden" name="" id="img2" src="" alt="">
                                                <div id="div_hienthi_anh2"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div id="div_upload_anh_3">
                                                <label id="label_anh3"><b>Ảnh 3</b> </label><br>
                                                <input type="file" id="input_upload_anh_3" name="input_upload_anh_3" accept=".jpg, .jpeg, .png">
                                                <input type="hidden" name="" id="img3" src="" alt="">
                                                <div id="div_hienthi_anh3"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <div id="div_upload_anh_4">
                                                <label id="label_anh4"><b>Ảnh 4</b> </label><br>
                                                <input type="file" id="input_upload_anh_4" name="input_upload_anh_4" accept=".jpg, .jpeg, .png">
                                                <input type="hidden" name="" id="img4" src="" alt="">
                                                <div id="div_hienthi_anh4"></div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>

                                <input type="submit" class="btn-themsanpham" value="Lưu" id="luu">
                                <span id="rs" style="color: red; font-weight: bold; "></span>
                            </div>
                        </div>
                            <?php

                                }
                            }else{ ?>
                                <!-- k ton tai -->
                                <table>
                                    <tr>
                                        <td>
                                            <div>
                                                <label id="label_size36">Size 36</label>
                                                <input class="input_size" id="input_size36" name="input_size36" type="text" placeholder="Nhập số lượng...">
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <label id="label_size39">Size 39</label>
                                                <input class="input_size" id="input_size39" name="input_size39" type="text" placeholder="Nhập số lượng...">
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <label id="label_size42">Size 42</label>
                                                <input class="input_size" id="input_size42" name="input_size42" type="text" placeholder="Nhập số lượng...">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div>
                                                <label id="label_size37">Size 37</label>
                                                <input class="input_size" id="input_size37" name="input_size37" type="text" placeholder="Nhập số lượng...">
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <label id="label_size40">Size 40</label>
                                                <input class="input_size" id="input_size40" name="input_size40" type="text" placeholder="Nhập số lượng...">
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <label id="label_size43">Size 43</label>
                                                <input class="input_size" id="input_size43" name="input_size43" type="text" placeholder="Nhập số lượng...">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div>
                                                <label id="label_size38">Size 38</label>
                                                <input class="input_size" id="input_size38" name="input_size38" type="text" placeholder="Nhập số lượng...">
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <label id="label_size41">Size 41</label>
                                                <input class="input_size" id="input_size41" name="input_size41" type="text" placeholder="Nhập số lượng...">
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <label id="label_size44">Size 44</label>
                                                <input class="input_size" id="input_size44" name="input_size44" type="text" placeholder="Nhập số lượng...">
                                            </div>
                                        </td>
                                    </tr>

                                </table>
                                <table>
                                    <tr>
                                        <td>

                                            <div id="div_upload_anh_1">
                                                <label id="label_anh1"><b>Ảnh 1</b> </label><br>
                                                <input type="file" id="input_upload_anh_1" name="input_upload_anh_1" accept=".jpg, .jpeg, .png">
                                                <input type="hidden" name="" id="img1" src="" alt="">
                                                <div id="div_hienthi_anh1"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <div id="div_upload_anh_2">
                                                <label id="label_anh2"><b>Ảnh 2</b> </label><br>
                                                <input type="file" id="input_upload_anh_2" name="input_upload_anh_2" accept=".jpg, .jpeg, .png">
                                                <input type="hidden" name="" id="img2" src="" alt="">
                                                <div id="div_hienthi_anh2"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div id="div_upload_anh_3">
                                                <label id="label_anh3"><b>Ảnh 3</b> </label><br>
                                                <input type="file" id="input_upload_anh_3" name="input_upload_anh_3" accept=".jpg, .jpeg, .png">
                                                <input type="hidden" name="" id="img3" src="" alt="">
                                                <div id="div_hienthi_anh3"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <div id="div_upload_anh_4">
                                                <label id="label_anh4"><b>Ảnh 4</b> </label><br>
                                                <input type="file" id="input_upload_anh_4" name="input_upload_anh_4" accept=".jpg, .jpeg, .png">
                                                <input type="hidden" name="" id="img4" src="" alt="">
                                                <div id="div_hienthi_anh4"></div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>

                                <input type="submit" class="btn-themsanpham" value="Lưu" id="luu">
                                <span id="rs" style="color: red; font-weight: bold; "></span>
                            </div>
                        </div>
                            <?php

                            }

                        ?>




                <?php
                    if(isset($_COOKIE['colorid'])){ ?>
                        <input type="hidden" id="idcolor" value="<?php  echo $_COOKIE['colorid']; ?>">

                    <?php

                    }
                ?>

            </div>
    </section>
</body>
<script src="../../../jq.js"></script>
<script src="../dashboard/admin_dashboard.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const colorOptions = document.querySelectorAll(".color-option");
        const colorSizeUploadImage = document.getElementById("div_color_size_uploadimage");
        colorSizeUploadImage.style.display = "block";
        // colorOptions.forEach(function(option) {
        //     option.addEventListener("click", function() {


        //     });
        // });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const colorOptions = document.querySelectorAll(".color-option");
        const colorSizeUploadImage = document.getElementById("div_color_size_uploadimage");

        colorOptions.forEach(function(option) {
            option.addEventListener("click", function() {
                colorOptions.forEach(function(el) {
                    el.classList.remove("selected");
                });

                option.classList.add("selected");

                resetDivColorSizeUploadImage();
            });
        });

        function resetDivColorSizeUploadImage() {
            const sizeInputs = document.querySelectorAll(".input_size");
            sizeInputs.forEach(function(input) {
                input.value = "";
            });
            resetImagePreview("div_hienthi_anh1", "input_upload_anh_1");
            resetImagePreview("div_hienthi_anh2", "input_upload_anh_2");
            resetImagePreview("div_hienthi_anh3", "input_upload_anh_3");
            resetImagePreview("div_hienthi_anh4", "input_upload_anh_4");
        }

        function resetImagePreview(imageDivId, inputFileId) {
            const fileUploader = document.getElementById(inputFileId);
            const reader = new FileReader();
            const imageGrid = document.getElementById(imageDivId);

            fileUploader.value = "";
            imageGrid.innerHTML = "";
        }
    });
</script>
<script>
    $(document).ready(function(){
      $(document).on('change','#input_upload_anh_1',function(){
        var property = document.getElementById('input_upload_anh_1').files[0];
        document.getElementById("img1").alt = property.name;

        var image_name = property.name;
        var image_extension = image_name.split('.').pop().toLowerCase();

        if(jQuery.inArray(image_extension,['gif','jpg','jpeg','']) == -1){
          alert("Invalid image file");
        }

        var form_data = new FormData();
        form_data.append("file",property);
          $.ajax({
            url:'../products/upload_img_ajax.php',
            method:'POST',
            data:form_data,
            contentType:false,
            cache:false,
            processData:false,
            beforeSend:function(){
              $('#div_hienthi_anh1').html('Loading......');
            },
            success:function(data){
              console.log(data);
              $('#div_hienthi_anh1').html(data);
            }
          });
        });

        $(document).on('change','#input_upload_anh_2',function(){
          var property = document.getElementById('input_upload_anh_2').files[0];
          document.getElementById("img2").alt = property.name;
          var image_name = property.name;
          var image_extension = image_name.split('.').pop().toLowerCase();

          if(jQuery.inArray(image_extension,['gif','jpg','jpeg','']) == -1){
            alert("Invalid image file");
          }

          var form_data = new FormData();
          form_data.append("file",property);
            $.ajax({
              url:'../products/upload_img_ajax.php',
              method:'POST',
              data:form_data,
              contentType:false,
              cache:false,
              processData:false,
              beforeSend:function(){
                $('#div_hienthi_anh2').html('Loading......');
              },
              success:function(data){
                console.log(data);
                $('#div_hienthi_anh2').html(data);
              }
            });
          });

          $(document).on('change','#input_upload_anh_3',function(){
          var property = document.getElementById('input_upload_anh_3').files[0];
          document.getElementById("img3").alt = property.name;
          var image_name = property.name;
          var image_extension = image_name.split('.').pop().toLowerCase();

          if(jQuery.inArray(image_extension,['gif','jpg','jpeg','']) == -1){
            alert("Invalid image file");
          }

          var form_data = new FormData();
          form_data.append("file",property);
            $.ajax({
              url:'../products/upload_img_ajax.php',
              method:'POST',
              data:form_data,
              contentType:false,
              cache:false,
              processData:false,
              beforeSend:function(){
                $('#div_hienthi_anh3').html('Loading......');
              },
              success:function(data){
                console.log(data);
                $('#div_hienthi_anh3').html(data);
              }
            });
          });

          $(document).on('change','#input_upload_anh_4',function(){
          var property = document.getElementById('input_upload_anh_4').files[0];
          document.getElementById("img4").alt = property.name;

          var image_name = property.name;
          var image_extension = image_name.split('.').pop().toLowerCase();

          if(jQuery.inArray(image_extension,['gif','jpg','jpeg','']) == -1){
            alert("Invalid image file");
          }

          var form_data = new FormData();
          form_data.append("file",property);
            $.ajax({
              url:'../products/upload_img_ajax.php',
              method:'POST',
              data:form_data,
              contentType:false,
              cache:false,
              processData:false,
              beforeSend:function(){
                $('#div_hienthi_anh4').html('Loading......');
              },
              success:function(data){
                console.log(data);
                $('#div_hienthi_anh4').html(data);
              }
            });
          });
    });


</script>
<!-- <script>
    const fileUploader_2 = document.getElementById('input_upload_anh_2');
    const reader_2 = new FileReader();
    const imageGrid_2 = document.getElementById('div_hienthi_anh2');
    let currentImage_2 = null;

    fileUploader_2.addEventListener('change', (event) => {
        const files = event.target.files;
        const file = files[0];
        reader_2.readAsDataURL(file);

        reader_2.addEventListener('load', (event) => {
            const img = document.createElement('img');
            imageGrid_2.innerHTML = ''; // Clear existing images
            imageGrid_2.appendChild(img);
            img.src = event.target.result;
            img.alt = file.name;

            // Update the currentImage variable with the new image information
            currentImage_2 = {
                src: event.target.result,
                alt: file.name
            };

            document.getElementById("img2").src = img.src;
            document.getElementById("img2").alt = img.alt;
        });
    });

    // Hiển thị ảnh đã upload lần cuối vào div_hienthi_anh1
    if (currentImage_2) {
        const img = document.createElement('img');
        imageGrid_2.innerHTML = ''; // Clear existing images
        imageGrid_2.appendChild(img);
        img.src = currentImage_2.src;
        img.alt = currentImage_2.alt;
    }
</script>
<script>
    const fileUploader_3 = document.getElementById('input_upload_anh_3');
    const reader_3 = new FileReader();
    const imageGrid_3 = document.getElementById('div_hienthi_anh3');
    let currentImage_3 = null;

    fileUploader_3.addEventListener('change', (event) => {
        const files = event.target.files;
        const file = files[0];
        reader_3.readAsDataURL(file);



        reader_3.addEventListener('load', (event) => {
            const img = document.createElement('img');
            imageGrid_3.innerHTML = ''; // Clear existing images
            imageGrid_3.appendChild(img);
            img.src = event.target.result;
            img.alt = file.name;

            // Update the currentImage variable with the new image information
            currentImage_3 = {
                src: event.target.result,
                alt: file.name
            };
            document.getElementById("img3").src = img.src;
            document.getElementById("img3").alt = img.alt;
        });
    });

    // Hiển thị ảnh đã upload lần cuối vào div_hienthi_anh1
    if (currentImage_3) {
        alert(src);

        const img = document.createElement('img');
        imageGrid_3.innerHTML = ''; // Clear existing images
        imageGrid_3.appendChild(img);
        img.src = currentImage_3.src;
        img.alt = currentImage_3.alt;
    }
</script>
<script>
    const fileUploader_4 = document.getElementById('input_upload_anh_4');
    const reader_4 = new FileReader();
    const imageGrid_4 = document.getElementById('div_hienthi_anh4');
    let currentImage_4 = null;

    fileUploader_4.addEventListener('change', (event) => {
        const files = event.target.files;
        const file = files[0];
        reader_4.readAsDataURL(file);

        reader_4.addEventListener('load', (event) => {
            const img = document.createElement('img');
            imageGrid_4.innerHTML = ''; // Clear existing images
            imageGrid_4.appendChild(img);
            img.src = event.target.result;
            img.alt = file.name;

            // Update the currentImage variable with the new image information
            currentImage_4 = {
                src: event.target.result,
                alt: file.name
            };

            document.getElementById("img4").src = img.src;
            document.getElementById("img4").alt = img.alt;
        });
    });

    // Hiển thị ảnh đã upload lần cuối vào div_hienthi_anh1
    if (currentImage_4) {
        const img = document.createElement('img');
        imageGrid_4.innerHTML = ''; // Clear existing images
        imageGrid_4.appendChild(img);
        img.src = currentImage_4.src;
        img.alt = currentImage_4.alt;
    }
</script> -->



<script type="text/javascript">
    document.querySelector('#input_tensanpham').addEventListener('click', function(e) {
      e.preventDefault();
      document.getElementById("input_tensanpham").style.border = "";
    })

    document.querySelector('#input_giasanpham').addEventListener('click', function(e) {
      e.preventDefault();
      document.getElementById("input_giasanpham").style.border = "";
    })

    document.querySelector('#input_size36').addEventListener('click', function(e) {
      e.preventDefault();
      document.getElementById("input_size36").style.border = "";
    })
    document.querySelector('#input_size37').addEventListener('click', function(e) {
      e.preventDefault();
      document.getElementById("input_size37").style.border = "";
    })
    document.querySelector('#input_size38').addEventListener('click', function(e) {
      e.preventDefault();
      document.getElementById("input_size38").style.border = "";
    })
    document.querySelector('#input_size39').addEventListener('click', function(e) {
      e.preventDefault();
      document.getElementById("input_size39").style.border = "";
    })
    document.querySelector('#input_size40').addEventListener('click', function(e) {
      e.preventDefault();
      document.getElementById("input_size40").style.border = "";
    })
    document.querySelector('#input_size41').addEventListener('click', function(e) {
      e.preventDefault();
      document.getElementById("input_size41").style.border = "";
    })
    document.querySelector('#input_size42').addEventListener('click', function(e) {
      e.preventDefault();
      document.getElementById("input_size42").style.border = "";
    })
    document.querySelector('#input_size43').addEventListener('click', function(e) {
      e.preventDefault();
      document.getElementById("input_size43").style.border = "";
    })
    document.querySelector('#input_size44').addEventListener('click', function(e) {
      e.preventDefault();
      document.getElementById("input_size44").style.border = "";
    })




         $(document).ready(function() {
            $("#select_mausanpham").on("change", function(){
                history.go(0);
                createCookie("colorid", $(this).val(), 100);




            });

            function createCookie(name, value, days) {
                var expires;

                if (days) {
                    var date = new Date();
                    date.setTime(date.getTime() + (days * 1 * 1000));
                    expires = "; expires=" + date.toGMTString();
                } else {
                    expires = "";
                }

                document.cookie = escape(name) + "=" +
                    escape(value) + expires + "; path=/";
            }
        });

        $(document).on('click', '#addsp', function(event) {
                $.post("../products/themSP_ajax.php",
                    {

                    },
                    function(data,status){
                        if(status=="success")
                        {
                            alert(data);
                            if(data == "Thành công"){
                                location.replace("../products/products_management.php");
                            }

                        }
                    }
                );
            });

        function validate(){
            tensp =  document.getElementById('input_tensanpham').value;
            giasp =  document.getElementById('input_giasanpham').value;

            sl36 = document.getElementById('input_size36').value;
            sl37 = document.getElementById('input_size37').value;
            sl38 = document.getElementById('input_size38').value;
            sl39 = document.getElementById('input_size39').value;
            sl40 = document.getElementById('input_size40').value;
            sl41 = document.getElementById('input_size41').value;
            sl42 = document.getElementById('input_size42').value;
            sl43 = document.getElementById('input_size43').value;
            sl44 = document.getElementById('input_size44').value;

            img1 = document.getElementById('img1');
            img2 = document.getElementById('img2');
            img3 = document.getElementById('img3');
            img4 = document.getElementById('img4');

            img1_alt = img1.getAttribute("alt");
            img2_alt = img2.getAttribute("alt");
            img3_alt = img3.getAttribute("alt");
            img4_alt = img4.getAttribute("alt");

            flag = true;

            const isAlpha = /^[a-zA-Z-' ]*$/;
            if(isAlpha.test(tensp) == false || tensp == ""){
                document.getElementById("input_tensanpham").style.borderColor = "red";
                flag = false;
            }

            if(isNaN(giasp) || giasp == ""){
                document.getElementById("input_giasanpham").style.borderColor = "red";
                flag = false;
            }

            if(isNaN(sl36)){
                document.getElementById("input_size36").style.borderColor = "red";
                flag = false;
            }
            if(isNaN(sl37)){
                document.getElementById("input_size37").style.borderColor = "red";
                flag = false;
            }
            if(isNaN(sl38)){
                document.getElementById("input_size38").style.borderColor = "red";
                flag = false;
            }
            if(isNaN(sl39)){
                document.getElementById("input_size39").style.borderColor = "red";
                flag = false;
            }
            if(isNaN(sl40)){
                document.getElementById("input_size40").style.borderColor = "red";
                flag = false;
            }
            if(isNaN(sl41)){
                document.getElementById("input_size41").style.borderColor = "red";
                flag = false;
            }
            if(isNaN(sl42)){
                document.getElementById("input_size42").style.borderColor = "red";
                flag = false;
            }
            if(isNaN(sl43)){
                document.getElementById("input_size43").style.borderColor = "red";
                flag = false;
            }
            if(isNaN(sl44)){
                document.getElementById("input_size44").style.borderColor = "red";
                flag = false;
            }

            if(img1_alt == "" || img2_alt == "" || img3_alt == "" || img4_alt == "" || flag == false){
                return 3;
            }

            return 1;
        }

        $(document).ready(function(){

            $("#luu").click(function(){
                if(validate() == 3){
                    alert("Vui lòng kiểm tra thông tin và hình ảnh");
                }
                else{
                    tensp =  document.getElementById('input_tensanpham').value;
                    giasp =  document.getElementById('input_giasanpham').value;
                    danhmuc =  document.getElementById("select_danhmucsanpham");
                    danhmuc_val = danhmuc.options[danhmuc.selectedIndex].value;

                    dong =  document.getElementById("select_dongsanpham");
                    dong_val = dong.options[dong.selectedIndex].value;

                    kieudang =  document.getElementById("select_kieudang");
                    kieu_val = kieudang.options[kieudang.selectedIndex].value;

                    thongtinsp = document.getElementById('textarea_thongtinsanpham').value;

                    sl36 = document.getElementById('input_size36').value;
                    sl37 = document.getElementById('input_size37').value;
                    sl38 = document.getElementById('input_size38').value;
                    sl39 = document.getElementById('input_size39').value;
                    sl40 = document.getElementById('input_size40').value;
                    sl41 = document.getElementById('input_size41').value;
                    sl42 = document.getElementById('input_size42').value;
                    sl43 = document.getElementById('input_size43').value;
                    sl44 = document.getElementById('input_size44').value;

                    img1 = document.getElementById('img1');
                    img2 = document.getElementById('img2');
                    img3 = document.getElementById('img3');
                    img4 = document.getElementById('img4');

                    // img1_src = img1.getAttribute("src");
                    // img2_src = img2.getAttribute("src");
                    // img3_src = img3.getAttribute("src");
                    // img4_src = img4.getAttribute("src");

                    img1_alt = img1.getAttribute("alt");
                    img2_alt = img2.getAttribute("alt");
                    img3_alt = img3.getAttribute("alt");
                    img4_alt = img4.getAttribute("alt");


                    e = document.getElementById("select_mausanpham");
                    value = e.options[e.selectedIndex].value;

                    $.post("../../page/products/luu_size_ajax.php",
                        {
                            tensp:tensp,
                            giasp:giasp,
                            danhmuc:danhmuc_val ,
                            dong:dong_val,
                            kieudang:kieu_val,
                            thongtinsp:thongtinsp,

                            sl36:sl36,
                            sl37:sl37,
                            sl38:sl38,
                            sl39:sl39,
                            sl40:sl40,
                            sl41:sl41,
                            sl42:sl42,
                            sl43:sl43,
                            sl44:sl44,

                            // img1_src:img1_src,
                            // img2_src:img2_src,
                            // img3_src:img3_src,
                            // img4_src:img4_src,

                            img1_alt:img1_alt,
                            img2_alt:img2_alt,
                            img3_alt:img3_alt,
                            img4_alt:img4_alt,

                            colorid:value,
                        },
                        function(data,status){
                            if(status=="success")
                            {

                                $("#rs").text(data);
                            }
                        }
                    );
                }

            });








        });
    </script>



</html>
