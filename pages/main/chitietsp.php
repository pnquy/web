<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Sản Phẩm </title>
    

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />

    <link rel="stylesheet" href="css/chitietsp2.css"> 
    
    <style>
        /* CSS nội tuyến để ghi đè style cũ nhanh chóng */
        :root {
            --primary-color: #CF7486;
            --primary-hover: #b05f6e;
        }

        body {
            font-family: 'Nunito Sans', sans-serif;
            background-color: #f8f9fa;
        }

        /* Breadcrumb */
        .breadcrumb-item a {
            color: #6c757d;
            font-weight: 600;
        }
        
        .breadcrumb-item.active {
            color: var(--primary-color);
            font-weight: 700;
        }

        /* Slider ảnh */
        .slider-for {
            margin-bottom: 20px;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .slider-nav .slider-item {
            margin: 0 5px;
            border: 2px solid transparent;
            border-radius: 10px;
            overflow: hidden;
            cursor: pointer;
            transition: all 0.3s;
        }

        .slider-nav .slick-current .slider-item {
            border-color: var(--primary-color);
        }

        /* Nút chọn màu */
        .color-select label {
            cursor: pointer;
            margin-right: 10px;
        }
        
        .color-select input[type="radio"] {
            display: none;
        }

        .color-select span {
            display: inline-block;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            border: 2px solid #ddd;
            transition: all 0.3s;
        }

        .color-select input:checked + span {
            transform: scale(1.2);
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(207, 116, 134, 0.2);
        }

        /* Button Mua hàng */
        .add-to-cart, .buy-now {
            width: 100%;
            border: none;
            padding: 15px;
            font-size: 16px;
            font-weight: 800;
            text-transform: uppercase;
            border-radius: 50px;
            transition: all 0.3s;
        }

        .add-to-cart {
            background-color: #333;
            color: white;
        }

        .add-to-cart:hover {
            background-color: #000;
            transform: translateY(-2px);
        }

        .buy-now {
            background-color: var(--primary-color);
            color: white;
            margin-top: 15px;
        }

        .buy-now:hover {
            background-color: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(207, 116, 134, 0.4);
        }

        /* Accordion */
        .card-accordion {
            border: none;
            border-bottom: 1px solid #eee;
            background: transparent;
        }

        .card-header-accordion {
            background: transparent;
            border: none;
            padding: 15px 0;
        }

        .card-link-accordion {
            color: #333;
            font-weight: 700;
            text-decoration: none;
            display: block;
            position: relative;
        }
        
        .card-link-accordion:hover {
            color: var(--primary-color);
        }

        /* Sản phẩm liên quan */
        .related-product-title {
            font-weight: 800;
            text-transform: uppercase;
            margin-bottom: 30px;
            color: #333;
            text-align: center;
        }

        .img-wish {
            margin: 0 10px;
            background: #fff;
            border-radius: 12px;
            padding: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: 0.3s;
        }

        .img-wish:hover {
            transform: translateY(-5px);
        }

        .img-wish img {
            width: 100%;
            border-radius: 8px;
        }

        .related-name {
            font-weight: 700;
            color: #333;
            text-decoration: none;
            display: block;
            margin-top: 10px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .related-price {
            color: var(--primary-color);
            font-weight: 800;
        }
    </style>
</head>

<body>
    <?php
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $sql_dongsp_tensp = "SELECT tendongsp, tensp from dongsp d, sanpham s, productcolor p where d.dongspid = s.dongspid and s.sanphamid = p.productid and p.productcolorid = '$id';";
    $row_dongsp_tensp = $connect->query($sql_dongsp_tensp);
    
    if($row_dongsp_tensp && $row_dongsp_tensp->num_rows > 0) {
        $dongsp_tensp = $row_dongsp_tensp->fetch_row();
    ?>
    <div class="container my-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white p-3 rounded-pill shadow-sm">
                <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none"><?php echo $dongsp_tensp[0] ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $dongsp_tensp[1] ?></li>
            </ol>
        </nav>
    </div>
    <?php } ?>

    <div class="container bg-white p-4 rounded-4 shadow-sm mb-5">
        <div class="row">
            <?php
            $str = "select sanphamid, tensp, thongtinsp, giasp, img1, img2, img3, img4 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and '$id' = productcolor.productcolorid LIMIT 1";
            $rs = $connect->query($str);
            if ($rs && $rs->num_rows > 0) {
                while ($row = $rs->fetch_row()) {
            ?>
            
            <div class="col-lg-7 mb-4">
                <div class="slider slider-for">
                    <div><img class="zoom" src="uploads/<?php echo $row[4] ?>" width="100%"></div>
                    <div><img class="zoom" src="uploads/<?php echo $row[5] ?>" width="100%"></div>
                    <div><img class="zoom" src="uploads/<?php echo $row[6] ?>" width="100%"></div>
                    <div><img class="zoom" src="uploads/<?php echo $row[7] ?>" width="100%"></div>
                </div>
                <div class="slider slider-nav">
                    <div class="slider-item"><img src="uploads/<?php echo $row[4] ?>" width="100%"></div>
                    <div class="slider-item"><img src="uploads/<?php echo $row[5] ?>" width="100%"></div>
                    <div class="slider-item"><img src="uploads/<?php echo $row[6] ?>" width="100%"></div>
                    <div class="slider-item"><img src="uploads/<?php echo $row[7] ?>" width="100%"></div>
                </div>
                <input type="hidden" id="imgSP" value="<?php echo $row[4] ?>">
            </div>

            <div class="col-lg-5">
                <h2 class="fw-bold mb-2" id="tenSP"><?php echo $row[1] ?></h2>
                <p class="text-muted mb-3">Mã sản phẩm: <strong class="text-dark">SP<?php echo $row[0] ?></strong></p>
                
                <div class="price mb-4">
                    <?php
                        // Logic giảm giá giữ nguyên
                        $str1 = "SELECT * FROM saleoff";
                        date_default_timezone_set('Asia/Jakarta');
                        $datenow = date("Y-m-d G:i:s", time());
                        $arr = array();
                        $rs1 = $connect->query($str1);
                        
                        if ($rs1 && $rs1->num_rows > 0) {
                            while ($row1 = $rs1->fetch_row()) {
                                if("$datenow" >= date($row1[1]) && "$datenow" < date($row1[2])){
                                    $arr["$row1[0]"] = "$row1[3]";
                                }
                            }
                        }
                        
                        $has_sale = false;
                        $final_price = $row[3];

                        if(count($arr) > 0){
                            foreach($arr as $saleId => $percent){
                                $sql_sale = "select giatrigiam from saleoff, saleoffct where saleoff.saleoffid = saleoffct.saleoffid and saleoffct.procolorid = '$id' and saleoff.saleoffid = '$saleId' LIMIT 1";
                                $res_sale = $connect->query($sql_sale);
                                if($res_sale && $res_sale->num_rows > 0){
                                    $final_price = $row[3] - ($row[3] * $percent)/100;
                                    $has_sale = true;
                                    break;
                                }
                            }
                        }
                    ?>
                    
                    <?php if($has_sale): ?>
                        <h3 class="d-inline-block text-danger fw-bold me-2"><?php echo number_format($final_price, 0, ',', '.') ?> VNĐ</h3>
                        <span class="text-decoration-line-through text-muted fs-5"><?php echo number_format($row[3], 0, ',', '.') ?> VNĐ</span>
                    <?php else: ?>
                        <h3 class="fw-bold text-dark"><?php echo number_format($row[3], 0, ',', '.') ?> VNĐ</h3>
                    <?php endif; ?>
                    <input type="hidden" id="giaSP" value="<?php echo $final_price ?>">
                </div>

                <hr class="opacity-25">

                <p class="text-secondary"><?php echo $row[2] ?></p>

                <div class="mb-4">
                    <p class="fw-bold mb-2">Màu sắc:</p>
                    <div class="color-select">
                        <?php
                        $str_color = "select distinct productcolorid, colorhex from productcolor, sanpham, color where productcolor.productid = sanpham.sanphamid and color.colorid = productcolor.colorid AND productid = '" . $row[0] . "'";
                        $rs_color = $connect->query($str_color);
                        if ($rs_color->num_rows > 0) {
                            while ($row_color = $rs_color->fetch_row()) {
                                $checked = ($row_color[0] == $id) ? 'checked' : '';
                        ?>
                            <label>
                                <input type="radio" name="color" <?php echo $checked ?> data-link="index.php?quanly=chitietsanpham&id=<?php echo $row_color[0] ?>">
                                <span style="background: <?php echo $row_color[1] ?>;"></span>
                            </label>
                        <?php } } ?>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-6">
                        <label class="fw-bold mb-2">Kích thước</label>
                        <select class="form-select rounded-pill" id="Size">
                            <option value="">Chọn size</option>
                            <?php
                                $sq_size = "select size, sl from procolorsize where procolorid = '$id'";
                                $res_size = $connect->query($sq_size);
                                if ($res_size->num_rows > 0) {
                                    while ($rw_size = $res_size->fetch_row()) {
                                        if($rw_size[1] > 0) echo "<option value='$rw_size[0]'>$rw_size[0]</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-6">
                        <label class="fw-bold mb-2">Số lượng</label>
                        <select class="form-select rounded-pill" id="sl">
                            </select>
                    </div>
                </div>

                <div class="mb-4">
                    <div id="alert-addtocart-success" class="alert alert-success p-2 mb-2 text-center small rounded-pill" role="alert" style="display:none;"></div>
                    <div class="row g-2">
                        <div class="col-10">
                            <button type="button" id="addToCartBtn" class="add-to-cart"><i class="fa fa-cart-plus me-2"></i> Thêm vào giỏ</button>
                        </div>
                        <div class="col-2">
                            <button class="rounded-circle d-flex align-items-center justify-content-center" style="border-color: #b05f6e; width:50px; height:50px;">
                                <i class="fa-regular fa-heart fs-4 like" style="color:#CF7486;"></i>
                            </button>
                        </div>
                        <div class="col-12">
                            <button type="button" id="muangay" class="buy-now">Mua Ngay</button>
                        </div>
                    </div>
                </div>

                <div class="accordion accordion-flush" id="productInfo">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#info1">
                                THÔNG TIN CHI TIẾT
                            </button>
                        </h2>
                        <div id="info1" class="accordion-collapse collapse show" data-bs-parent="#productInfo">
                            <div class="accordion-body text-secondary small">
                                <p>Gender: Unisex<br>Size run: 35 - 46<br>Upper: Canvas<br>Outsole: Rubber</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#info2">
                                CHÍNH SÁCH ĐỔI TRẢ
                            </button>
                        </h2>
                        <div id="info2" class="accordion-collapse collapse" data-bs-parent="#productInfo">
                            <div class="accordion-body text-secondary small">
                                Hỗ trợ đổi size trong vòng 7 ngày. Sản phẩm phải còn nguyên tem mác.
                            </div>
                        </div>
                    </div>
                </div>

            </div> <?php } } ?>
        </div>
    </div>

    <div class="container mb-5">
        <h3 class="related-product-title">SẢN PHẨM LIÊN QUAN</h3>
        <div class="slider slide-show">
            <?php
            if(isset($dongsp_tensp)) {
                $tendongsp_safe = $connect->real_escape_string($dongsp_tensp[0]);

                $str2 = "select productcolorid, img1, tensp, colorname, giasp from color, sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and productcolor.colorid = color.colorid and dongsp.tendongsp = '$tendongsp_safe' LIMIT 8;";
                
                $rs2 = $connect->query($str2);
                if ($rs2 && $rs2->num_rows > 0) {
                    while ($row2 = $rs2->fetch_row()) {
            ?>
                <div class="img-wish">
                    <a href="index.php?quanly=chitietsanpham&id=<?php echo $row2[0] ?>">
                        <img src="uploads/<?php echo $row2[1] ?>" alt="">
                    </a>
                    <div class="text-center mt-2">
                        <a href="index.php?quanly=chitietsanpham&id=<?php echo $row2[0] ?>" class="related-name text-dark text-decoration-none">
                            <?php echo $row2[2] ?>
                        </a>
                        <p class="text-muted small mb-1"><?php echo $row2[3] ?></p>
                        <p class="related-price"><?php echo number_format($row2[4], 0, ',', '.') ?> VND</p>
                    </div>
                </div>
            <?php } } } ?>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <script>
        $(document).ready(function() {
            // Slider Logic
            $('.slider-for').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                asNavFor: '.slider-nav'
            });

            // Slider Phụ (Thumbnail)
            $('.slider-nav').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                asNavFor: '.slider-for',
                dots: false,
                centerMode: false, // Để false để ảnh không bị căn giữa lệch lạc
                focusOnSelect: true,
                arrows: false,
                infinite: false // Không lặp lại để tránh lỗi hiển thị khi ít ảnh
            });

            // Slider Sản phẩm liên quan
            $('.slide-show').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                arrows: true, // Bật mũi tên điều hướng
                dots: false,
                prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-chevron-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="fa fa-chevron-right"></i></button>',
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: { slidesToShow: 3 }
                    },
                    {
                        breakpoint: 768,
                        settings: { slidesToShow: 2 }
                    },
                    {
                        breakpoint: 480,
                        settings: { slidesToShow: 1 }
                    }
                ]
            });

            // Chọn màu chuyển trang
            $('input[name="color"]').on('change', function() {
                window.location.href = $(this).attr('data-link');
            });

            // Xử lý Size -> Số lượng (AJAX)
            // Xử lý Size -> Số lượng (AJAX)
          $("#Size").change(function(){
              var size = $(this).val();
              var id = <?php echo isset($_GET['id']) ? $_GET['id'] : 0 ?>;
              var slSelect = $("#sl");
              
              // Reset ô số lượng về mặc định
              slSelect.empty(); 
              slSelect.append('<option value="">Chọn số lượng</option>'); 

              if(size !== ""){
                  console.log("Đang gửi yêu cầu check size: " + size); // Debug

                  $.post("pages/main/chage_size_Ajax.php", { id: id, size: size }, function(data, status){
                      if(status == "success") {
                          console.log("Server trả về: " + data); // Debug xem server trả về gì

                          var maxSL = parseInt(data); // Ép kiểu số nguyên

                          if (!isNaN(maxSL) && maxSL > 0) {
                              // Giới hạn hiển thị tối đa 10 cái để dropdown không quá dài
                              var limit = (maxSL > 10) ? 10 : maxSL;
                              
                              for(var i=1; i<=limit; i++) {
                                  slSelect.append($('<option>', { value: i, text: i }));
                              }
                              
                              // Mở khóa nút mua hàng
                              $("#addToCartBtn, #muangay").prop('disabled', false);
                          } else {
                              // Nếu hết hàng hoặc lỗi
                              slSelect.append('<option value="">Hết hàng</option>');
                              $("#addToCartBtn, #muangay").prop('disabled', true);
                          }
                      }
                  }).fail(function() {
                      alert("Lỗi kết nối đến server!");
                  });
              }
          });
          $('.slider-for img').on('click', function() {
                var src = $(this).attr('src');
                // Có thể mở modal zoom ở đây
            });
            // Thêm vào giỏ hàng
            $("#addToCartBtn, #muangay").click(function(){
                var btnId = $(this).attr('id');
                var id = <?php echo isset($_GET['id']) ? $_GET['id'] : 0 ?>;
                var size = $("#Size").val();
                var sl = $("#sl").val();

                if(size == "" || sl == null){
                    alert("Vui lòng chọn Size và Số lượng!");
                    return;
                }

                var ten = $("#tenSP").text();
                var gia = $("#giaSP").val();
                var img = $("#imgSP").val();

                $.post("pages/main/themGioHang_CTSP_Ajax.php", 
                    { id: id, size: size, sl: sl, ten: ten, gia: gia, img: img },
                    function(data, status){
                        if(status == "success"){
                            if(btnId == "muangay"){
                                window.location.href = "index.php?quanly=giohang";
                            } else {
                                $("#alert-addtocart-success").text(data).fadeIn().delay(2000).fadeOut();
                            }
                        }
                    }
                );
            });
        });
    </script>
</body>
</html>
<?php ob_end_flush(); ?>