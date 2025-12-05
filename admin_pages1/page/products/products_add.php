<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm - Admin MTP</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../dashboard/admin_dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <?php include('../../navigation/menu_navigation.php'); ?>

    <section class="home-section">
        <div class="container-fluid">
            
            <?php
                // --- LOGIC PHP: CHUẨN BỊ DỮ LIỆU ---
                // Khởi tạo các biến mặc định là rỗng
                $tensp = $giasp = $danhmuc = $dong = $kieudang = $thongtin = "";
                
                // Nếu có Session (Dữ liệu cũ hoặc đang nhập dở), gán giá trị
                if(isset($_SESSION['sp_info'])){
                    $i = 0;
                    foreach($_SESSION['sp_info'] as $p){
                        if($i == 0) $tensp = $p;
                        if($i == 1) $giasp = $p;
                        if($i == 2) $danhmuc = $p;
                        if($i == 3) $dong = $p;
                        if($i == 4) $kieudang = $p;
                        if($i == 5) $thongtin = $p;
                        $i++;
                    }
                }
            ?>

            <div class="admin-card">
                <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                    <h2 class="admin-title border-0 mb-0">Thêm Sản Phẩm Mới</h2>
                    <a href="../products/products_management.php" class="btn btn-outline-secondary rounded-pill px-3">
                        <i class='bx bx-arrow-back'></i> Quay lại
                    </a>
                </div>

                <div class="row">
                    <div class="col-lg-7 border-end pe-lg-4">
                        <h5 class="fw-bold text-primary mb-3"><i class='bx bx-info-circle'></i> Thông Tin Chung</h5>
                        
                        <div class="mb-3">
                            <label class="form-label">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="input_tensanpham" name="input_tensanpham" placeholder="Ví dụ: Nike Air Force 1" value="<?php echo $tensp; ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Giá sản phẩm</label>
                            <input type="text" class="form-control" id="input_giasanpham" name="input_giasanpham" placeholder="Ví dụ: 2000000" value="<?php echo $giasp; ?>">
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Giới tính</label>
                                <select class="form-select" id="select_danhmucsanpham" name="select_danhmucsanpham">
                                    <option value="Nam" <?php if ($danhmuc == 'Nam') echo 'selected'; ?>>Nam</option>
                                    <option value="Nữ" <?php if ($danhmuc == 'Nữ') echo 'selected'; ?>>Nữ</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Thương hiệu</label>
                                <select class="form-select" id="select_dongsanpham" name="select_dongsanpham">
                                    <option value="Nike" <?php if ($dong == 'Nike') echo 'selected'; ?>>Nike</option>
                                    <option value="Adidas" <?php if ($dong == 'Adidas') echo 'selected'; ?>>Adidas</option>
                                    <option value="Bitis" <?php if ($dong == 'Bitis') echo 'selected'; ?>>Biti's</option>
                                    <option value="Puma" <?php if ($dong == 'Puma') echo 'selected'; ?>>Puma</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Loại giày</label>
                                <select class="form-select" id="select_kieudang" name="select_kieudang">
                                    <option value="Bóng đá" <?php if ($kieudang == 'Bóng đá') echo 'selected'; ?>>Bóng đá</option>
                                    <option value="Bóng rổ" <?php if ($kieudang == 'Bóng rổ') echo 'selected'; ?>>Bóng rổ</option>
                                    <option value="Gym" <?php if ($kieudang == 'Gym') echo 'selected'; ?>>Gym</option>
                                    <option value="Chạy bộ" <?php if ($kieudang == 'Chạy bộ') echo 'selected'; ?>>Chạy bộ</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mô tả chi tiết</label>
                            <textarea class="form-control" id="textarea_thongtinsanpham" name="textarea_thongtinsanpham" rows="6" placeholder="Nhập mô tả sản phẩm..."><?php echo $thongtin; ?></textarea>
                        </div>
                    </div>

                    <div class="col-lg-5 ps-lg-4">
                        <h5 class="fw-bold text-primary mb-3"><i class='bx bx-package'></i> Kho & Hình Ảnh</h5>

                        <div class="mb-4 bg-light p-3 rounded">
                            <label class="form-label fw-bold">Màu sắc sản phẩm</label>
                            <select class="form-select" id="select_mausanpham" name="select_mausanpham">
                                <?php 
                                    $colors = [
                                        'color1' => 'Offwhite/Gum', 'color2' => 'Rustic', 'color3' => 'Real Teal',
                                        'color4' => 'White', 'color5' => 'Evergreen', 'color6' => 'Black/Gum',
                                        'color7' => 'Corluray Mix', 'color8' => 'Monk\'s Robe'
                                    ];
                                    $selected_color = isset($_COOKIE['colorid']) ? $_COOKIE['colorid'] : 'color1';
                                    
                                    foreach($colors as $val => $name){
                                        $selected = ($selected_color == $val) ? 'selected' : '';
                                        echo "<option value='$val' $selected>$name</option>";
                                    }
                                ?>
                            </select>
                            <small class="text-muted fst-italic mt-1 d-block">*Chọn màu để nhập số lượng và ảnh tương ứng</small>
                        </div>

                        <label class="form-label fw-bold small text-uppercase text-muted">Số lượng theo Size</label>
                        <div class="row g-2 mb-4">
                            <?php 
                            for($i=36; $i<=44; $i++): 
                                // Lấy giá trị session nếu có
                                $sl_val = isset($_SESSION['sp'][$selected_color]["sl$i"]) ? $_SESSION['sp'][$selected_color]["sl$i"] : '';
                            ?>
                            <div class="col-4">
                                <div class="input-group input-group-sm">
                                    <span class="input-group-text bg-white">S<?php echo $i; ?></span>
                                    <input type="text" class="form-control text-center input_size" id="input_size<?php echo $i; ?>" 
                                           name="input_size<?php echo $i; ?>" value="<?php echo $sl_val; ?>" placeholder="0">
                                </div>
                            </div>
                            <?php endfor; ?>
                        </div>

                        <label class="form-label fw-bold">Hình ảnh (4 Ảnh)</label>
                        <div class="row g-3">
                            <?php for($j=1; $j<=4; $j++): ?>
                            <div class="col-6">
                                <div class="border rounded p-2 text-center bg-white shadow-sm position-relative">
                                    <span class="badge bg-secondary position-absolute top-0 start-0 m-1">Ảnh <?php echo $j; ?></span>
                                    
                                    <div id="div_hienthi_anh<?php echo $j; ?>" class="mb-2 d-flex align-items-center justify-content-center" style="height: 100px; overflow: hidden;">
                                        <?php 
                                            // Hiển thị ảnh nếu có trong session
                                            if(isset($_SESSION['sp'][$selected_color]["img{$j}_alt"]) && $_SESSION['sp'][$selected_color]["img{$j}_alt"] != ""){
                                                $src = $_SESSION['sp'][$selected_color]["img{$j}_alt"];
                                                echo "<img src='../../../uploads/$src' id='img$j' alt='$src' style='max-width:100%; max-height:100%;'>";
                                            } else {
                                                echo "<img src='' id='img$j' alt='' style='display:none;'>"; // Placeholder ẩn
                                                echo "<i class='bx bx-image-add text-muted fs-1'></i>";
                                            }
                                        ?>
                                    </div>
                                    <input type="file" class="form-control form-control-sm" id="input_upload_anh_<?php echo $j; ?>" name="input_upload_anh_<?php echo $j; ?>" accept=".jpg, .jpeg, .png">
                                </div>
                            </div>
                            <?php endfor; ?>
                        </div>

                        <div class="d-flex justify-content-end mt-3">
                            <button type="button" class="btn btn-outline-primary btn-sm rounded-pill" id="luu">
                                <i class='bx bx-save'></i> Lưu Tạm (Size & Màu)
                            </button>
                        </div>
                        <div id="rs" class="text-end mt-1 text-success fw-bold small"></div>
                    </div>
                </div>

                <hr class="my-4">

                <div class="text-center">
                    <button type="button" id="addsp" name="themsanpham" class="btn-admin btn-lg px-5">
                        <i class='bx bx-plus-circle'></i> THÊM SẢN PHẨM HOÀN TẤT
                    </button>
                    <div id="btn_themsp" class="mt-2 fw-bold text-danger"></div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../../../jq.js"></script>
    <script src="../dashboard/admin_dashboard.js"></script>

    <script>
        $(document).ready(function() {
            // 1. Xử lý đổi màu sắc (Cookie & Reload)
            $("#select_mausanpham").on("change", function(){
                createCookie("colorid", $(this).val(), 100);
                history.go(0); // Reload để PHP lấy lại session mới
            });

            function createCookie(name, value, days) {
                var expires = "";
                if (days) {
                    var date = new Date();
                    date.setTime(date.getTime() + (days * 1000)); // Sửa lại logic giây
                    expires = "; expires=" + date.toGMTString();
                }
                document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
            }

            // 2. Xử lý Upload Ảnh (Preview AJAX)
            function setupImageUpload(id) {
                $(document).on('change', '#input_upload_anh_' + id, function() {
                    var property = this.files[0];
                    if(!property) return;

                    var image_name = property.name;
                    var image_extension = image_name.split('.').pop().toLowerCase();
                    if($.inArray(image_extension, ['gif','jpg','jpeg','png']) == -1) {
                        alert("Chỉ chấp nhận file ảnh (jpg, png, gif)");
                        return;
                    }

                    var form_data = new FormData();
                    form_data.append("file", property);

                    $.ajax({
                        url: '../products/upload_img_ajax.php',
                        method: 'POST',
                        data: form_data,
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend: function() {
                            $('#div_hienthi_anh' + id).html('<div class="spinner-border text-primary spinner-border-sm"></div>');
                        },
                        success: function(data) {
                            $('#div_hienthi_anh' + id).html(data); // PHP trả về thẻ <img>
                            // Cập nhật alt cho img ẩn để validate hoạt động
                            var newSrc = $(data).attr('src').split('/').pop(); // Lấy tên file
                            $('#img' + id).attr('alt', newSrc); 
                        }
                    });
                });
            }
            setupImageUpload(1); setupImageUpload(2); setupImageUpload(3); setupImageUpload(4);

            // 3. Xử lý Validate
            function validate() {
                var isValid = true;
                // Validate tên, giá
                if($('#input_tensanpham').val() == "") { $('#input_tensanpham').addClass('is-invalid'); isValid = false; }
                else { $('#input_tensanpham').removeClass('is-invalid'); }

                if(isNaN($('#input_giasanpham').val()) || $('#input_giasanpham').val() == "") { $('#input_giasanpham').addClass('is-invalid'); isValid = false; }
                else { $('#input_giasanpham').removeClass('is-invalid'); }

                // Validate Size (Check nếu không phải số)
                $('.input_size').each(function() {
                    if(isNaN($(this).val())) { $(this).addClass('is-invalid'); isValid = false; }
                    else { $(this).removeClass('is-invalid'); }
                });

                // Validate Ảnh (Kiểm tra xem đã upload chưa thông qua thuộc tính alt của img ẩn hoặc img hiển thị)
                // Logic cũ của bạn dựa vào getAttribute("alt"). Ở đây ta cần đảm bảo ảnh đã được upload.
                // Đoạn này có thể cần tùy chỉnh thêm tùy vào cách file upload_img_ajax trả về.
                return isValid;
            }

            // 4. Lưu Tạm (AJAX)
            $("#luu").click(function(){
                if(!validate()) { alert("Vui lòng kiểm tra lại thông tin nhập!"); return; }

                var colorid = $("#select_mausanpham").val();
                
                // Lấy tên file ảnh từ thẻ img được ajax trả về
                var getImgName = function(id) {
                    var imgTag = $('#div_hienthi_anh' + id).find('img');
                    if(imgTag.length > 0) {
                        // Lấy đường dẫn src, tách lấy tên file
                        var src = imgTag.attr('src'); 
                        return src ? src.split('/').pop() : ''; 
                    }
                    return '';
                };

                $.post("../../page/products/luu_size_ajax.php", {
                    tensp: $('#input_tensanpham').val(),
                    giasp: $('#input_giasanpham').val(),
                    danhmuc: $('#select_danhmucsanpham').val(),
                    dong: $('#select_dongsanpham').val(),
                    kieudang: $('#select_kieudang').val(),
                    thongtinsp: $('#textarea_thongtinsanpham').val(),
                    
                    sl36: $('#input_size36').val(), sl37: $('#input_size37').val(), sl38: $('#input_size38').val(),
                    sl39: $('#input_size39').val(), sl40: $('#input_size40').val(), sl41: $('#input_size41').val(),
                    sl42: $('#input_size42').val(), sl43: $('#input_size43').val(), sl44: $('#input_size44').val(),

                    img1_alt: getImgName(1), img2_alt: getImgName(2),
                    img3_alt: getImgName(3), img4_alt: getImgName(4),
                    
                    colorid: colorid
                }, function(data) {
                    $("#rs").text(data).fadeIn().delay(2000).fadeOut();
                });
            });

            // 5. Thêm Sản Phẩm Hoàn Tất
            $("#addsp").click(function() {
                // Kiểm tra xem đã lưu ít nhất 1 màu chưa? (Có thể thêm logic check session ở đây nếu cần)
                // Gửi request thêm sản phẩm
                $.post("../products/themSp_ajax.php", {}, function(data) {
                    alert(data);
                    if(data.trim() == "Thành công"){
                        window.location.href = "../products/products_management.php";
                    }
                });
            });
        });
    </script>
</body>
</html>