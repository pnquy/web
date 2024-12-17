<?php
$mysqli = new mysqli("localhost", "root", "", "dbdoan");
//LOAD CSDL (LIỆT KÊ SẢN PHẨM)
$sanphamid = $_GET['sanphamid'];
$colorid = $_GET['colorid'];
$sql_lietke_danhmuc_sp = "SELECT *
                FROM sanpham sp
                JOIN productcolor pc ON pc.productid = sp.sanphamid
                JOIN dongsp dsp ON dsp.dongspid = sp.dongspid
                JOIN style st ON st.styleid = sp.styleid
                JOIN color cl ON cl.colorid = pc.colorid
                JOIN procolorsize pcs ON pcs.procolorid = pc.productcolorid
                WHERE sp.sanphamid = '$sanphamid' AND cl.colorid = '$colorid'
                ";
$query_lietke_danhmuc_sp = $mysqli->query($sql_lietke_danhmuc_sp);
$query_lietke_danhmuc_sp_1 = $mysqli->query($sql_lietke_danhmuc_sp);

$row = $query_lietke_danhmuc_sp->fetch_assoc();
//Quantity size
$quantity = array_fill_keys(range(36, 44), 0);
while ($row_quantity_size = $query_lietke_danhmuc_sp_1->fetch_assoc()) {
    if (isset($row_quantity_size['size'])) {
        $size = $row_quantity_size['size'];
        $quantity[$size] = $row_quantity_size['sl'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../dashboard/admin_dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Sửa sản phẩm</title>
    <style>
        #div_suasanpham,
        #div_sua_giasanpham,
        #div_sua_danhmucsanpham,
        #div_sua_dongsanpham,
        #div_sua_kieudang,
        #div_sua_thongtinsanpham {
            margin-bottom: 10px;
        }

        #label_sua_tensanpham,
        #label_sua_giasanpham,
        #label_sua_danhmucsanpham,
        #label_sua_dongsanpham,
        #label_sua_kieudang,
        #label_sua_thongtinsanpham,
        #label_edit_mausanpham {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        #input_sua_tensanpham,
        #input_sua_giasanpham {
            width: 100%;
            max-width: 460px;
            padding: 8px;
        }

        #select_sua_danhmucsanpham,
        #select_sua_dongsanpham,
        #select_sua_kieudang {
            padding: 4px;
        }

        #textarea_sua_thongtinsanpham {
            width: 100%;
            max-width: 460px;
        }

        select {
            cursor: pointer;
        }

        #textarea_sua_thongtinsanpham {
            resize: vertical;
        }

        /* Style cho phần "Thêm sản phẩm" */
        .text-hnm {
            font-size: 1.5em;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .section_suasanpham {
            position: relative;
            left: 250px;
            height: 100vh;
            width: calc(100% - 250px);
            background: var(--body-color);
            transition: var(--tran-05);
        }

        .sidebar-hnm.close~.section_suasanpham {
            left: 88px;
            width: calc(100% - 88px);
        }

        .section_suasanpham .text-hnm {
            font-size: 30px;
            font-weight: 500;
            color: var(--text-color);
            padding: 8px 40px;
            caret-color: transparent;
        }

        .section_suasanpham {
            display: flex;
            align-items: stretch;
        }

        .div_products_edit_1 {
            flex: 1;
            padding: 10px;
            align-items: center;
        }

        .div_products_edit_2 {
            flex: 2;
            padding: 10px;
        }

        #label_edit_mausanpham {
            margin-top: 72px;
        }

        #color-box_sua_OffwhiteGum {
            margin-right: 10px;
            background-color: #FEFBEF;
            width: 20px;
            height: 20px;
            display: inline-block;
            cursor: pointer;
            border-radius: 50%;
        }

        #color-box_sua_Rustic {
            margin-right: 10px;
            background-color: #EBD0A2;
            width: 20px;
            height: 20px;
            display: inline-block;
            cursor: pointer;
            border-radius: 50%;
        }

        #color-box_sua_RealTeal {
            margin-right: 10px;
            background-color: #1C487C;
            width: 20px;
            height: 20px;
            display: inline-block;
            cursor: pointer;
            border-radius: 50%;
        }

        #color-box_sua_White {
            margin-right: 10px;
            background-color: #FFFFFF;
            width: 20px;
            height: 20px;
            display: inline-block;
            cursor: pointer;
            border-radius: 50%;
        }

        #color-box_sua_Evergreen {
            margin-right: 10px;
            background-color: #6D9951;
            width: 20px;
            height: 20px;
            display: inline-block;
            cursor: pointer;
            border-radius: 50%;
        }

        #color-box_sua_BlackGum {
            margin-right: 10px;
            background-color: #464646;
            width: 20px;
            height: 20px;
            display: inline-block;
            cursor: pointer;
            border-radius: 50%;
        }

        #color-box_sua_CorlurayMix {
            margin-right: 10px;
            background-color: #F5D255;
            width: 20px;
            height: 20px;
            display: inline-block;
            cursor: pointer;
            border-radius: 50%;
        }

        #color-box_sua_MonksRobe {
            margin-right: 10px;
            background-color: #77553D;
            width: 20px;
            height: 20px;
            display: inline-block;
            cursor: pointer;
            border-radius: 50%;
        }

        .sua-color-option {
            width: 20px;
            height: 20px;
            display: inline-block;
            cursor: pointer;
            border-radius: 50%;
            margin-right: 10px;
        }

        .sua-color-option.selected {
            border: 2px solid #F15E2C;
        }

        #div_sua_table_size {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #div_sua_table_size table form tr td {
            margin-right: 10px;
        }


        #label_sua_size36,
        #label_sua_size37,
        #label_sua_size38,
        #label_sua_size39,
        #label_sua_size40,
        #label_sua_size41,
        #label_sua_size42,
        #label_sua_size43,
        #label_sua_size44 {
            font-weight: bold;
        }

        #div_sua_table_size table tr td {
            padding: 15px;
        }

        .input_sua_size {
            max-width: 140px;
            padding: 6px;
        }

        #div_sua_hienthi_anh1 img {
            width: 270px;
            height: 180px;
        }

        #div_sua_hienthi_anh2 img {
            width: 270px;
            height: 180px;
        }

        #div_sua_hienthi_anh3 img {
            width: 270px;
            height: 180px;
        }

        #div_sua_hienthi_anh4 img {
            width: 270px;
            height: 180px;
        }


        .div_sua_upload {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        #div_sua_upload_anh_1,
        #div_sua_upload_anh_2,
        #div_sua_upload_anh_3,
        #div_sua_upload_anh_4 {
            flex: 0 0 calc(48% - 10px);
            box-sizing: border-box;
        }

        #div_sua_upload_anh_1,
        #div_sua_upload_anh_2,
        #div_sua_upload_anh_3,
        #div_sua_upload_anh_4 {
            margin-bottom: 30px;
        }

        #div_sua_color_size_uploadimage {
            display: none;
        }

        .div_sua_upload {
            display: flex;
            max-width: 600px;
            width: 100%;
            justify-content: center;
            align-items: center;
        }

        .div_sua_upload {
            margin: auto;
        }

        #div_sua_color_size_uploadimage {
            border-style: solid;
            max-width: 1000px;
            border-color: #ff5f17;
        }

        #div_products_edit_enter {
            margin-left: 40px;
        }

        #div_sua_danhmucsanpham,
        #div_sua_dongsanpham,
        #div_sua_kieudang {
            flex: 1;
            margin-right: 0px;
        }

        #div_sua_danhmuc_dong_kieudang {
            display: flex;
            flex-wrap: wrap;
        }

        .suasanpham {
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

        .suasanpham:hover {
            background: #d54e10;
        }

        /* .suasanpham-text {
            display: inline-flex;
            align-items: center;
            padding: 0 5px;
            color: #fff;
            height: 100%;
        } */
    </style>
</head>
<style>
    .grid-container {
        display: grid;
        grid-template-columns: auto auto;
        padding: 30px;
    }

    .QuantityPicture {
        padding-left: 50px;
    }
</style>

<body>
    <?php
    include('../../navigation/menu_navigation.php');
    ?>
    <section class="section_suasanpham">

        <form method="post" action="xuly.php?sanphamid=<?php echo $row['sanphamid']; ?>&colorid=<?php echo $row['colorid']; ?>" enctype="multipart/form-data">
            <div class="grid-container">
                <div class="grid-item">
                    <p class="text text-hnm">Sửa sản phẩm</p>
                    <div id="div_suasanpham">
                        <label id="label_sua_tensanpham">Tên sản phẩm</label>
                        <input type="text" id="input_sua_tensanpham" name="input_sua_tensanpham" placeholder="Nhập tên sản phẩm" value="<?php echo $row['tensp']; ?>">
                    </div>
                    <br>
                    <div id="div_sua_giasanpham">
                        <label id="label_sua_giasanpham">Giá sản phẩm</label>
                        <input type="text" id="input_sua_giasanpham" name="input_sua_giasanpham" placeholder="Nhập giá sản phẩm" value="<?php echo $row['giasp']; ?>">
                    </div>
                    <br>
                    <div id="div_sua_danhmuc_dong_kieudang">
                        <div id="div_sua_danhmucsanpham">
                            <label id="label_sua_danhmucsanpham">Giới tính</label>
                            <select id="select_sua_danhmucsanpham" name="select_sua_danhmucsanpham">
                                <?php if ($row['danhmuc'] == "Nam") {
                                ?>
                                    <option value="Nam" selected>Nam</option>
                                    <option value="Nữ">Nữ</option>
                                <?php
                                } else {
                                ?>
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ" selected>Nữ</option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <br>
                        <div id="div_sua_dongsanpham">
                            <label id="label_sua_dongsanpham">Thương hiệu</label>
                            <select id="select_sua_dongsanpham" name="select_sua_dongsanpham">
                                <?php if ($row['tendongsp'] == "Nike") {
                                ?>
                                    <option value="Nike" name="Nike" selected>Nike</option>
                                    <option value="Adidas" name="Adidas">Adidas</option>
                                    <option value="Bitis" name="Bitis">Biti's</option>
                                    <option value="Puma" name="Puma">Puma</option>

                                <?php
                              } else if ($row['tendongsp'] == "Adidas") {
                                ?>
                                <option value="Nike" name="Nike">Nike</option>
                                <option value="Adidas" name="Adidas" selected>Adidas</option>
                                <option value="Bitis" name="Bitis">Biti's</option>
                                <option value="Puma" name="Puma">Puma</option>

                                <?php
                              } else if ($row['tendongsp'] == "Bitis") {
                                ?>
                                <option value="Nike" name="Nike">Nike</option>
                                <option value="Adidas" name="Adidas" >Adidas</option>
                                <option value="Bitis" name="Bitis" selected>Biti's</option>
                                <option value="Puma" name="Puma">Puma</option>
                                <?php
                              } else if ($row['tendongsp'] == "Puma") {
                                ?>
                                <option value="Nike" name="Nike">Nike</option>
                                <option value="Adidas" name="Adidas" >Adidas</option>
                                <option value="Bitis" name="Bitis" >Biti's</option>
                                <option value="Puma" name="Puma" selected>Puma</option>
                                <?php
                                } else if ($row['tendongsp'] == "Creas") {
                                ?>
                                    <option value="Basas" name="basas">Basas</option>
                                    <option value="Vintas" name="vintas">Vintas</option>
                                    <option value="Urbas" name="urbas">Urbas</option>
                                    <option value="Pattas" name="pattas">Pattas</option>
                                    <option value="Creas" name="creas" selected>Creas</option>
                                    <option value="Track 6" name="track6">Track 6</option>
                                <?php
                                } else if ($row['tendongsp'] == "Track 6") {
                                ?>
                                    <option value="Basas" name="basas">Basas</option>
                                    <option value="Vintas" name="vintas">Vintas</option>
                                    <option value="Urbas" name="urbas">Urbas</option>
                                    <option value="Pattas" name="pattas">Pattas</option>
                                    <option value="Creas" name="creas">Creas</option>
                                    <option value="Track 6" name="track6" selected>Track 6</option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <br>
                        <div id="div_sua_kieudang">
                            <label id="label_sua_kieudang">Kiểu dáng</label>
                            <select id="select_sua_kieudang" name="select_sua_kieudang">
                                <?php if ($row['stylename'] == "Low Top") {
                                ?>
                                    <option value="Low Top" name="lowtop" selected>Low Top</option>
                                    <option value="High Top" name="hightop">High Top</option>
                                    <option value="Mid Top" name="midtop">Mid Top</option>
                                    <option value="Mule" name="mule">Mule</option>
                                <?php } else  if ($row['stylename'] == "High Top") {
                                ?>
                                    <option value="Low Top" name="lowtop">Low Top</option>
                                    <option value="High Top" name="hightop" selected>High Top</option>
                                    <option value="Mid Top" name="midtop">Mid Top</option>
                                    <option value="Mule" name="mule">Mule</option>
                                <?php } else  if ($row['stylename'] == "Mid Top") {
                                ?>
                                    <option value="Low Top" name="lowtop">Low Top</option>
                                    <option value="High Top" name="hightop">High Top</option>
                                    <option value="Mid Top" name="midtop" selected>Mid Top</option>
                                    <option value="Mule" name="mule">Mule</option>
                                <?php } else  if ($row['stylename'] == "Mule") {
                                ?>
                                    <option value="Low Top" name="lowtop">Low Top</option>
                                    <option value="High Top" name="hightop">High Top</option>
                                    <option value="Mid Top" name="midtop">Mid Top</option>
                                    <option value="Mule" name="mule" selected>Mule</option>

                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div id="div_sua_thongtinsanpham">
                        <label id="label_sua_thongtinsanpham">Thông tin sản phẩm</label>
                        <textarea id="textarea_sua_thongtinsanpham" name="textarea_sua_thongtinsanpham" rows="8"><?php echo $row['thongtinsp']; ?></textarea>
                    </div>
                </div>
                <div class="grid-item QuantityPicture">
                    <label id="label_edit_mausanpham">Màu sản phẩm: <span style="color:<?php echo $row['colorhex'] ?>;"><?php echo $row['colorname'] ?></span></label>
                    <!-- Quantity -->
                    <table>
                        <tr>
                            <td>
                                <div>
                                    <label id="label_sua_size36">Size 36</label>
                                    <input class="input_sua_size" id="input_sua_size36" name="input_sua_size36" type="text" placeholder="Nhập số lượng..." value="<?php echo $quantity[36] ?>">
                                </div>
                            </td>
                            <td>
                                <div>
                                    <label id="label_sua_size39">Size 39</label>
                                    <input class="input_sua_size" id="input_sua_size39" name="input_sua_size39" type="text" placeholder="Nhập số lượng..." value="<?php echo $quantity[39] ?>">
                                </div>
                            </td>
                            <td>
                                <div>
                                    <label id="label_sua_size42">Size 42</label>
                                    <input class="input_sua_size" id="input_sua_size42" name="input_sua_size42" type="text" placeholder="Nhập số lượng..." value="<?php echo $quantity[42] ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>
                                    <label id="label_sua_size37">Size 37</label>
                                    <input class="input_sua_size" id="input_sua_size37" name="input_sua_size37" type="text" placeholder="Nhập số lượng..." value="<?php echo $quantity[37] ?>">
                                </div>
                            </td>
                            <td>
                                <div>
                                    <label id="label_sua_size40">Size 40</label>
                                    <input class="input_sua_size" id="input_sua_size40" name="input_sua_size40" type="text" placeholder="Nhập số lượng..." value="<?php echo $quantity[40] ?>">
                                </div>
                            </td>
                            <td>
                                <div>
                                    <label id="label_sua_size43">Size 43</label>
                                    <input class="input_sua_size" id="input_sua_size43" name="input_sua_size43" type="text" placeholder="Nhập số lượng..." value="<?php echo $quantity[43] ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>
                                    <label id="label_sua_size38">Size 38</label>
                                    <input class="input_sua_size" id="input_sua_size38" name="input_sua_size38" type="text" placeholder="Nhập số lượng..." value="<?php echo $quantity[38] ?>">
                                </div>
                            </td>
                            <td>
                                <div>
                                    <label id="label_sua_size41">Size 41</label>
                                    <input class="input_sua_size" id="input_sua_size41" name="input_sua_size41" type="text" placeholder="Nhập số lượng..." value="<?php echo $quantity[41] ?>">
                                </div>
                            </td>
                            <td>
                                <div>
                                    <label id="label_sua_size44">Size 44</label>
                                    <input class="input_sua_size" id="input_sua_size44" name="input_sua_size44" type="text" placeholder="Nhập số lượng..." value="<?php echo $quantity[44] ?>">
                                </div>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <!-- Picture -->
                    <table>
                        <tr>
                            <td>
                                <div id="div_sua_upload_anh_1">
                                    <label id="label_sua_anh1"><b>Ảnh 1</b> </label><br>
                                    <input type="file" id="input_sua_upload_anh_1" name="input_sua_upload_anh_1" accept=".jpg, .jpeg, .png"><br>
                                    <div id="div_sua_hienthi_anh1">
                                        <img src="uploads/<?php echo $row['img1'] ?>" alt="Ảnh 1" style="width: 270px;height: 180px;">
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div id="div_sua_upload_anh_2">
                                    <label id="label_sua_anh2"><b>Ảnh 2</b> </label><br>
                                    <input type="file" id="input_sua_upload_anh_2" name="input_sua_upload_anh_2" accept=".jpg, .jpeg, .png"><br>
                                    <div id="div_sua_hienthi_anh2">
                                        <img src="uploads/<?php echo $row['img2'] ?>" alt="Ảnh 2" style="width: 270px;height: 180px;">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div id="div_sua_upload_anh_3">
                                    <label id="label_sua_anh3"><b>Ảnh 3</b> </label><br>
                                    <input type="file" id="input_sua_upload_anh_3" name="input_sua_upload_anh_3" accept=".jpg, .jpeg, .png"><br>
                                    <div id="div_sua_hienthi_anh3">
                                        <img src="uploads/<?php echo $row['img3'] ?>" alt="Ảnh 3" style="width: 270px;height: 180px;">
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div id="div_sua_upload_anh_4">
                                    <label id="label_sua_anh4"><b>Ảnh 4</b> </label><br>
                                    <input type="file" id="input_sua_upload_anh_4" name="input_sua_upload_anh_4" accept=".jpg, .jpeg, .png"><br>
                                    <div id="div_sua_hienthi_anh4"><img src="uploads/<?php echo $row['img4'] ?>" alt="Ảnh 4" style="width: 270px;height: 180px;"></div>
                                </div>

                            </td>
                        </tr>
                    </table>

                </div>
                <input type="submit" class="suasanpham" name="suasanpham" value="Sửa sản phẩm">
            </div>

        </form>
    </section>
</body>
<script src="../../../jq.js"></script>
<script src="../dashboard/admin_dashboard.js"></script>
<script src="../dashboard/admin_dashboard.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const colorOptions = document.querySelectorAll(".sua-color-option");
        const colorSizeUploadImage = document.getElementById("div_sua_color_size_uploadimage");
        colorSizeUploadImage.style.display = "block";
        // colorOptions.forEach(function(option) {
        //     option.addEventListener("click", function() {
        //         var colorid = $(this).attr("value");
        //         var sanphamid = "<?php echo $_GET['sanphamid']; ?>";
        //         $.get("load_color_size_img.php?colorid=" + colorid + "&sanphamid=" + sanphamid, function(data, status) {
        //             $(".thongbao").html(data);
        //         });

        //     });
        // });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const colorOptions = document.querySelectorAll(".sua-color-option");
        const colorSizeUploadImage = document.getElementById("div_sua_color_size_uploadimage");

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
            const sizeInputs = document.querySelectorAll(".input_sua_size");
            sizeInputs.forEach(function(input) {
                input.value = "";
            });
            resetImagePreview("div_sua_hienthi_anh1", "input_sua_upload_anh_1");
            resetImagePreview("div_sua_hienthi_anh2", "input_sua_upload_anh_2");
            resetImagePreview("div_sua_hienthi_anh3", "input_sua_upload_anh_3");
            resetImagePreview("div_sua_hienthi_anh4", "input_sua_upload_anh_4");
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
    const fileUploader_1 = document.getElementById('input_sua_upload_anh_1');
    const reader_1 = new FileReader();
    const imageGrid_1 = document.getElementById('div_sua_hienthi_anh1');
    let currentImage_1 = null;

    fileUploader_1.addEventListener('change', (event) => {
        const files = event.target.files;
        const file = files[0];
        reader_1.readAsDataURL(file);

        reader_1.addEventListener('load', (event) => {
            const img = document.createElement('img');
            imageGrid_1.innerHTML = ''; // Clear existing images
            imageGrid_1.appendChild(img);
            img.src = event.target.result;
            img.alt = file.name;

            // Update the currentImage variable with the new image information
            currentImage_1 = {
                src: event.target.result,
                alt: file.name
            };
        });
    });

    // Hiển thị ảnh đã upload lần cuối vào div_sua_hienthi_anh1
    if (currentImage_1) {
        const img = document.createElement('img');
        imageGrid_1.innerHTML = ''; // Clear existing images
        imageGrid_1.appendChild(img);
        img.src = currentImage_1.src;
        img.alt = currentImage_1.alt;
    }
</script>
<script>
    const fileUploader_2 = document.getElementById('input_sua_upload_anh_2');
    const reader_2 = new FileReader();
    const imageGrid_2 = document.getElementById('div_sua_hienthi_anh2');
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
        });
    });

    // Hiển thị ảnh đã upload lần cuối vào div_sua_hienthi_anh1
    if (currentImage_2) {
        const img = document.createElement('img');
        imageGrid_2.innerHTML = ''; // Clear existing images
        imageGrid_2.appendChild(img);
        img.src = currentImage_2.src;
        img.alt = currentImage_2.alt;
    }
</script>
<script>
    const fileUploader_3 = document.getElementById('input_sua_upload_anh_3');
    const reader_3 = new FileReader();
    const imageGrid_3 = document.getElementById('div_sua_hienthi_anh3');
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
        });
    });

    // Hiển thị ảnh đã upload lần cuối vào div_sua_hienthi_anh1
    if (currentImage_3) {
        const img = document.createElement('img');
        imageGrid_3.innerHTML = ''; // Clear existing images
        imageGrid_3.appendChild(img);
        img.src = currentImage_3.src;
        img.alt = currentImage_3.alt;
    }
</script>
<script>
    const fileUploader_4 = document.getElementById('input_sua_upload_anh_4');
    const reader_4 = new FileReader();
    const imageGrid_4 = document.getElementById('div_sua_hienthi_anh4');
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
        });
    });

    // Hiển thị ảnh đã upload lần cuối vào div_sua_hienthi_anh1
    if (currentImage_4) {
        const img = document.createElement('img');
        imageGrid_4.innerHTML = ''; // Clear existing images
        imageGrid_4.appendChild(img);
        img.src = currentImage_4.src;
        img.alt = currentImage_4.alt;
    }
</script>

</html>
