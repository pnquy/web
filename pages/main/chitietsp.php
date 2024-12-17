<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- boostrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- Slick -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/chitietsp1.css">

  <!-- slick slider -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css" />
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
  <!--  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- magnify -->
  <!-- <link rel="stylesheet" href="/css/chitietsp1.css"> code cũ của NM-->
  <link rel="stylesheet" href="css/chitietsp2.css">
  <!-- code chỉnh sửa của tui -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/magnify/2.3.3/js/jquery.magnify.min.js" integrity="sha512-YKxHqn7D0M5knQJO2xKHZpCfZ+/Ta7qpEHgADN+AkY2U2Y4JJtlCEHzKWV5ZE87vZR3ipdzNJ4U/sfjIaoHMfw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

  <title>Product Detail</title>
  <style>
    #alert-addtocart-success {
      display: none;
    }

    #alert-addtocart-success.show {
      display: block;
    }
  </style>
</head>

<body>
  <!-- Breadcrumbs -->
  <!-- ---------------------------chỉnh--------------------- -->
  <?php
  $sql_dongsp_tensp = "SELECT tendongsp, tensp from dongsp d, sanpham s, productcolor p where d.dongspid = s.dongspid and s.sanphamid = p.productid and p.productcolorid = '$_GET[id]';";
  $row_dongsp_tensp = $connect->query($sql_dongsp_tensp);
  $dongsp_tensp = $row_dongsp_tensp->fetch_row();
  ?>
  <div class="container my-5">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a class="link-body-emphasis text-decoration-none" href="#">Giày</a>
        </li>
        <li class="breadcrumb-item">
          <a class="link-body-emphasis text-decoration-none" href="#" id="breadcrumb_dongSP"><?php echo $dongsp_tensp[0] ?></a>
        </li>
        <li class="breadcrumb-item fw-bold active" aria-current="page" id="breadcrumb_tenSP"><?php echo $dongsp_tensp[1] ?></li>
      </ol>
    </nav>
    <hr class="border border-dark border-2 opacity-100">
  </div>
  <!-- ---------------------------chỉnh--------------------- -->
  <!-- main -->
  <div class="container">
    <div class="row">
      <!-- ảnh chính -->
      <?php
      $str = "select sanphamid, tensp, thongtinsp, giasp, img1, img2, img3, img4 from sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and '$_GET[id]' = productcolor.productcolorid LIMIT 1";
      $rs = $connect->query($str);
      if ($rs->num_rows > 0) {
        while ($row = $rs->fetch_row()) {

      ?>
          <div class="main col-lg-7">
            <div class="row zoom">
              <div class="col-lg-12">
                <div class="slider slider-for">
                  <div>
                    <img class="zoom" id="image" src="uploads/<?php echo $row[4] ?>" data-magnify-src="<?php echo $row[4] ?>" width="100%">
                  </div>
                  <div>
                    <img class="zoom" id="image" src="uploads/<?php echo $row[5] ?>" data-magnify-src="<?php echo $row[5] ?>" width="100%">
                  </div>
                  <div>
                    <img class="zoom" id="image" src="uploads/<?php echo $row[6] ?>" data-magnify-src="<?php echo $row[6] ?>" width="100%">
                  </div>
                  <div>
                    <img class="zoom" id="image" src="uploads/<?php echo $row[7] ?>" data-magnify-src="<?php echo $row[7] ?>" width="100%">
                  </div>
                  <div>
                    <img class="zoom" id="image" src="uploads/<?php echo $row[4] ?>" data-magnify-src="<?php echo $row[4] ?>" width="100%">
                  </div>

                  <div>
                    <img class="zoom" id="image" src="uploads/<?php echo $row[5] ?>" data-magnify-src="<?php echo $row[5] ?>" width="100%">
                  </div>
                  <div>
                    <img class="zoom" id="image" src="uploads/<?php echo $row[6] ?>" data-magnify-src="<?php echo $row[6] ?>" width="100%">
                  </div>
                  <div>
                    <img class="zoom" id="image" src="uploads/<?php echo $row[7] ?>" data-magnify-src="<?php echo $row[7] ?>" width="100%">
                  </div>

                </div>

              </div>

            </div>



            <!-- bang chuyen -->
            <div class="row">
              <div class="slider slider-nav">
                <div class="slider-item">
                  <img src="uploads/<?php echo $row[4] ?>" width="100%">
                  <input type="hidden" id="imgSP" value="<?php echo $row[4] ?>">
                </div>
                <div class="slider-item">
                  <img src="uploads/<?php echo $row[5] ?>" width="100%">
                </div>
                <div class="slider-item">
                  <img src="uploads/<?php echo $row[6] ?>" width="100%">
                </div>
                <div class="slider-item">
                  <img src="uploads/<?php echo $row[7] ?>" width="100%">
                </div>
                <div class="slider-item">
                  <img src="uploads/<?php echo $row[4] ?>" width="100%">
                </div>
                <div class="slider-item">
                  <img src="uploads/<?php echo $row[5] ?>" width="100%">
                </div>
                <div class="slider-item">
                  <img src="uploads/<?php echo $row[6] ?>" width="100%">
                </div>
                <div class="slider-item">
                  <img src="uploads/<?php echo $row[7] ?>" width="100%">
                </div>
              </div>
            </div>
          </div>


          <!-- chi tiet -->
          <div class=" col-lg-5">
            <h2 id="tenSP"><?php echo $row[1] ?></h2>
            <div class="masp mt-4 mb-4">
              <p>Mã sản phẩm: <strong>SP<?php echo $row[0] ?></strong></p>
            </div>
            <div class="price mt-4">
              <!-- Ktr sp co giam ko -->
              <?php 
                $str1 = "SELECT * FROM saleoff";

                date_default_timezone_set('Asia/Jakarta');
                $format = "Y-m-d G:i:s";
                $datenow =  date($format, time());

                $arr = array();
                $rs1 = $connect->query($str1);
                $saleoffid = 0;
                if ($rs1->num_rows > 0) {
                    while ($row1 = $rs1->fetch_row()) {
                        $ngaybd = date($row1[1]);
                        $ngaykt = date($row1[2]);
                        $giam_value = $row1[3];
                        $saleid = $row1[0];

                        // Kiem tra ngay hien tai dang co trong chuong trinh khuyen mai nao ko. Neu co thi them saleoffid vao mang
                        if("$datenow" >= $ngaybd && "$datenow" < $ngaykt){
                          $arr["$saleid"] = "$giam_value";
                        }
                    }
                } else { ?> 
                  <p><strong> <?php echo number_format($row[3], 0, ',', '.') . ' VND' ?> </strong></p>
                      <input type="hidden" id="giaSP" value="<?php echo $row[3] ?>">
                <?php
                }
                if(count($arr) != 0){
                  $giasp = 0;
                  $giasp_giam = 0;
                  foreach($arr as $u=>$y){
                    $sql = "select giatrigiam from saleoff, saleoffct where saleoff.saleoffid = saleoffct.saleoffid and saleoffct.procolorid = '".$_GET['id']."' and saleoff.saleoffid = '".$u."' LIMIT 1";
                    $res = $connect->query($sql);
                    
                    if($res->num_rows > 0){
                      while($ro = $res->fetch_row()){
                        $value =  $ro[0];
                        $giasp = $row[3];
                        $giasp_giam = $giasp - ($giasp * $value)/100; ?> 
                          
                        <?php
                        
                      }
                    }else{ ?> 
                      
                  <?php

                    }
                  }

                  if($giasp == 0){ ?> 
                    <p><strong> <?php echo number_format($row[3], 0, ',', '.') . ' VND' ?> </strong></p>
                    <input type="hidden" id="giaSP" value="<?php echo $row[3] ?>">
                  <?php

                  }else{ ?> 
                    <p><strong> <?php echo number_format($giasp_giam, 0, ',', '.') . ' VND' ?> </strong></p>
                    <input type="hidden" id="giaSP" value="<?php echo $giasp_giam ?>">
                  <?php

                  }
                   
                }else{ ?> 
                  <p><strong> <?php echo number_format($row[3], 0, ',', '.') . ' VND' ?> </strong></p>
                      <input type="hidden" id="giaSP" value="<?php echo $row[3] ?>">
                <?php
                }

              ?>
              
            </div>
            <hr class="dashed">
            <div class="product-text mt-4">
              <p> <?php echo $row[2] ?>
              </p>
            </div>

            <hr class="dashed">

            <div class="color-select">
              <!-- Load hinh anh mau -->
              <?php
              $str1 = "select distinct productcolorid, colorhex from productcolor, sanpham, color where productcolor.productid = sanpham.sanphamid and color.colorid = productcolor.colorid AND productid = '" . $row[0] . "'";
              $rs1 = $connect->query($str1);


              if ($rs1->num_rows > 0) {
                while ($row1 = $rs1->fetch_row()) {
              ?>

                  <label>
                    <input type="radio" name="color" id="color-1" data-link="index.php?quanly=chitietsanpham&id=<?php echo $row1[0] ?>">
                    <span class="color-1" style="background: <?php echo $row1[1] ?>;"></span>
                  </label>

              <?php

                }
              } else {
                echo "Không có record nào";
              }

              ?>

            </div>

            <hr class="dashed">
            <div class="row mb-4">
              <!-- bang size -->
              
              <div class="col-lg-6 size-select">
                <div class="mt-2 size">
                  <p class="mb-2" style="font-weight: bold;">Kích thước</p>
                  
                    <select class="form-select form-select-size" name="Size" id="Size">
                      <option></option>
                      <?php
                        $sq = "select size, sl from procolorsize where procolorid = '".$_GET['id']."'";
                        $res = $connect->query($sq);
                        if ($res->num_rows > 0) {
                          while ($rw = $res->fetch_row()) {
                            if($rw[1] == 0){
                              continue;
                            }else{
                              
                              echo "<option value='$rw[0]'>$rw[0]</option>";
                              
                            }
                          }
                        }
                      ?>

                    </select>

                </div>
              </div>

              <!-- quantity -->
              <div class="col-lg-6 quantity-select">
                <div class="mt-2 quantity">
                  <p class="mb-2" style="font-weight: bold;">Số lượng</p>
                  <select class="form-select form-select-quantity" name="sl" id="sl">
                      

                  </select>
                </div>
              </div>

          <?php
        }
      } else {
        echo "Không có record nào";
      }
          ?>

            </div>

            <!--them san pham  -->
            <div class="button mt-4">
              <div class="add row">
                <p style="font-size: 20px; color:blue" id="rs"></p>
                <div id="alert-addtocart-success" style="margin-bottom:20px;">
                  
                </div>
                <div class="col-lg-9">
                  <input type="submit" id="addToCartBtn" class="button add-to-cart" name="themgiohang" value="THÊM VÀO GIỎ HÀNG" style="height: 100%; font-weight: 700;"></input>

                </div>
                <div class="col-lg-3">
                  <div class="container-heart"><i class="like fa-regular fa-heart" style="color: #E91926;" onclick="like()"></i></div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <!-- <a href=""><button type="submit" name="muangay" class="buy-now" ><strong>MUA NGAY</strong></button></a> -->
                  <!-- <a href="../../index.php?quanly=giohang"><button type="button" name="submit" class="buy-now"><strong>MUA NGAY</strong></button></a> -->
                  <input type="submit" id="muangay" name="muangay" class="buy-now" value="MUA NGAY" style="font-weight: bold;">
                  <!-- sửa href link -->
                </div>
              </div>
            </div>
            <!-- Drop down -->
            <div id="accordion">
              <div class="card card-accordion">
                <div class="card-header card-header-accordion">
                  <a class="card-link card-link-accordion" data-toggle="collapse" href="#collapseOne">
                    THÔNG TIN SẢN PHẨM
                  </a>
                </div>
                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                  <div class="card-body card-body-accordion">
                    <p class="gender">Gender: Unisex</p>
                    <p class="size-run">Size run: 35 - 46</p>
                    <p class="upper">Upper: Canvas</p>
                    <p class="outsole">Outsole: Rubber</p>
                    <!-- <img class="img-size-chart" src="./assets/Ananas_SizeChart (1).jpg" alt="size chart"> -->
                  </div>
                </div>
              </div>
              <div class="card card-accordion">
                <div class="card-header card-header-accordion">
                  <a class="collapsed card-link card-link-accordion" data-toggle="collapse" href="#collapseTwo">
                    QUY ĐỊNH ĐỔI SẢN PHẨM
                  </a>
                </div>
                <div id="collapseTwo" class="collapse" data-parent="#accordion">
                  <div class="card-body card-body-accordion">
                    <p>Chỉ đổi hàng 1 lần duy nhất, mong bạn cân nhắc kĩ trước khi quyết định.</p>
                    <p>Thời hạn đổi sản phẩm khi mua trực tiếp tại cửa hàng là 07 ngày, kể từ ngày mua. Đổi sản phẩm khi mua online là 14 ngày, kể từ ngày nhận hàng.</p>
                    <p>Sản phẩm đổi phải kèm hóa đơn. Bắt buộc phải còn nguyên tem, hộp, nhãn mác.</p>
                    <p>Sản phẩm đổi không có dấu hiệu đã qua sử dụng, không giặt tẩy, bám bẩn, biến dạng.</p>
                    <p>
                      Chỉ ưu tiên hỗ trợ đổi size. Trong trường hợp sản phẩm hết size cần đổi, bạn có thể đổi sang 01 sản phẩm khác:
                      - Nếu sản phẩm muốn đổi ngang giá trị hoặc có giá trị cao hơn, bạn sẽ cần bù khoảng chênh lệch tại thời điểm đổi (nếu có).
                      - Nếu bạn mong muốn đổi sản phẩm có giá trị thấp hơn, chúng tôi sẽ không hoàn lại tiền.
                    </p>
                    <p> Trong trường hợp sản phẩm - size bạn muốn đổi không còn hàng trong hệ thống. Vui lòng chọn sản phẩm khác.</p>
                    <p>Không hoàn trả bằng tiền mặt dù bất cứ trong trường hợp nào. Mong bạn thông cảm.</p>

                  </div>
                </div>
              </div>
              <div class="card card-accordion">
                <div class="card-header card-header-accordion">
                  <a class="collapsed card-link card-link-accordion" data-toggle="collapse" href="#collapseThree">
                    BẢO HÀNH THẾ NÀO?
                  </a>
                </div>
                <div id="collapseThree" class="collapse" data-parent="#accordion">
                  <div class="card-body card-body-accordion">
                    <p>Mỗi đôi giày trước khi xuất xưởng đều trải qua nhiều khâu kiểm tra.
                      Tuy vậy, trong quá trình sử dụng, nếu nhận thấy các lỗi: gãy đế, hở đế, đứt chỉ may,...
                      trong thời gian 6 tháng từ ngày mua hàng, mong bạn sớm gửi sản phẩm về Ananas nhằm giúp
                      chúng tôi có cơ hội phục vụ bạn tốt hơn. Vui lòng gửi sản phẩm về bất kỳ cửa hàng Ananas nào,
                      hoặc gửi đến trung tâm bảo hành Ananas ngay trong trung tâm TP.HCM trong giờ hành chính:
                    </p>
                    <address>Địa chỉ: Đường số 6, P.Linh Trung, Q.Thủ Đức , TP. Hồ Chí Minh.</address>
                    <p>Hotline: 028 2222 0067</p>

                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
  </div>

  <hr class="dashed mt-4">
  <!---------------------- San pham lien quan ------------------------------------->
  <!-- ---------------------------chỉnh----------------------->
  <div class="related-product container">
    <div class=" splq col-lg-12">
      <h3 class="related-product-title">SẢN PHẨM LIÊN QUAN</h3>
      <div class="slider slide-show">
        <?php
        $str2 = "select productcolorid, img1, tensp, colorname, giasp from color, sanpham, productcolor, dongsp where sanpham.dongspid = dongsp.dongspid and sanpham.sanphamid = productcolor.productid and productcolor.colorid = color.colorid and dongsp.tendongsp = '$dongsp_tensp[0]';";
        $rs2 = $connect->query($str2);


        if ($rs2->num_rows > 0) {
          while ($row2 = $rs2->fetch_row()) {

        ?>
            <div class="img-wish">
              <a href="index.php?quanly=chitietsanpham&id=<?php echo $row2[0] ?>">
                <img src="uploads/<?php echo $row2[1] ?>">
              </a>
              <div class="related-content">
                <a class="related-name" href="index.php?quanly=chitietsanpham&id=<?php echo $row2[0] ?>">
                  <p class="related-name"><?php echo $row2[2] ?></p>
                </a>
                <p class="related-color"><?php echo $row2[3] ?></p>
                <p class="related-price curren-price"><?php echo number_format($row2[4], 0, ',', '.') . ' VND' ?></p>
              </div>
            </div>
        <?php
          }
        } else {
          echo "Không có record nào";
        }
        ?>
      </div>
    </div>
  </div>
  <hr class="dashed mt-4">
  <!-- ---------------------------chỉnh--------------------- -->
  <!-- ------------------------San pham da xem----------------- -------------->
  <!-- đang chỉnh php theo sản phẩm liên quan -->
  
  </div>



  <!--  -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <!-- slick -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js" integrity="sha512-eP8DK17a+MOcKHXC5Yrqzd8WI5WKh6F1TIk5QZ/8Lbv+8ssblcz7oGC8ZmQ/ZSAPa7ZmsCU4e/hcovqR8jfJqA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

  <script>
    $('.slide-show').slick({
      slidesToShow: 4,
      slidesToScroll: 4,
      arrows: true,
      dots: false,

    });
  </script>
  <script>
    
  </script>

  <script>
    Javascript:
      (function($) {
        $(function() {

          setTimeout(function() {
            $('.slick-prev').prepend('<div class="prev-slick-arrow arrow-icon"><span>&#60;</span></div><div class="prev-slick-img slick-thumb-nav"></div>');
            $('.slick-next').append('<div class="next-slick-arrow arrow-icon"><span>&#62;</span></div><div class="next-slick-img slick-thumb-nav"></div>');
            get_prev_slick_img();
            get_next_slick_img();
          }, 500);

          $('.slideshow__slides').on('click', '.slick-prev', function() {
            get_prev_slick_img();
          });
          $('.slideshow__slides').on('click', '.slick-next', function() {
            get_next_slick_img();
          });
          $('.slideshow__slides').on('swipe', function(event, slick, direction) {
            if (direction == 'left') {
              get_prev_slick_img();
            } else {
              get_next_slick_img();
            }
          });

          function get_prev_slick_img() {
            // For prev img
            var prev_slick_img = $('.slick-current').prev('.slider-image').find('img').attr('src');
            $('.prev-slick-img img').attr('src', prev_slick_img);
            $('.prev-slick-img').css('background-image', 'url(' + prev_slick_img + ')');
            // For next img
            var prev_next_slick_img = $('.slick-current').next('.slider-image').find('img').attr('src');
            $('.next-slick-img img').attr('src', prev_next_slick_img);
            $('.next-slick-img').css('background-image', 'url(' + prev_next_slick_img + ')');
          }

          function get_next_slick_img() {
            // For next img
            var next_slick_img = $('.slick-current').next('.slider-image').find('img').attr('src');
            $('.next-slick-img img').attr('src', next_slick_img);
            $('.next-slick-img').css('background-image', 'url(' + next_slick_img + ')');
            // For prev img
            var next_prev_slick_img = $('.slick-current').prev('.slider-image').find('img').attr('src');
            $('.prev-slick-img img').attr('src', next_prev_slick_img);
            $('.prev-slick-img').css('background-image', 'url(' + next_prev_slick_img + ')');
          }
          // End
        })
      })(jQuery);
  </script>
  <!--  -->
  <script>
    /* When the user clicks on the button,
        toggle between hiding and showing the dropdown content */
    function myFunction() {
      document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown menu if the user clicks outside of it
    window.onclick = function(event) {
      if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }
  </script>
  <!-- caroudel item -->
  <script type="text/javascript">
    $('.slider-for').slick({
      slidesToShow: 1,
      slidesToScroll: 4,
      arrows: false,
      fade: true,
      asNavFor: '.slider-nav'
    });
    $('.slider-nav').slick({
      slidesToShow: 4,
      slidesToScroll: 4,
      asNavFor: '.slider-for',
      centerMode: false,
      focusOnSelect: true,
      arrows: false
    });
  </script>

  <!-- dROP DOWN -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- ----------------------------------------------------------------------------- -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 4,
      spaceBetween: 30,
      slidesPerGroup: 4,
      loop: true,
      loopFillGroupWithBlank: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigator: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev"
      }
    });
  </script>
  <script>
    const relatedContainer = [...document.querySelectorAll('.related-container')];
    const nxtBtn = [...document.querySelectorAll('.next-btn')];
    const preBtn = [...document.querySelectorAll('.pre-btn')];

    relatedContainer.forEach((item, i) => {
      let containerDimensions = item.getBoundingClientRect();
      let containerWidth = containerDimensions.width;

      nxtBtn[i].addEventListener('click', () => {
        item.scrollLeft += containerWidth;
      })
      preBtn[i].addEventListener('click', () => {
        item.scrollLeft -= containerWidth;
      })
    })
  </script>
  <!-- Button like -->
  <script>
    $(".like").click(function() {
      if ($(this).hasClass('fa-solid')) {
        $(this).removeClass('fa-solid');
      } else {
        $(this).addClass('fa-solid');
      }
    });
  </script>
  <!-- link san pham radio mau sac -->
  <script>
    const radioButtons = document.querySelectorAll('input[type="radio"]');

    radioButtons.forEach((radioButton) => {
      radioButton.addEventListener('click', () => {
        const link = radioButton.getAttribute('data-link');
        window.location.href = link;
      });
    });
  </script>
  <!-- magnify -->
  <script src="../../js/chitietsp1.js" charset="UTF-8"></script>
  <script>
    $(document).ready(function() {
      $('.zoom').magnify();
    });
  </script>

<script>
        $(document).ready(function(){
            $("#Size").change(function(){
              var z = document.getElementById("sl");

              while(z.length > 0){
                z.remove(z.length-1);
              }

              size = document.getElementById('Size').value;
              id = <?php echo $_GET['id'] ?>;
              if(size == ""){
                
              }else{
                $.post("pages/main/chage_size_Ajax.php",
                  {
                      id:id,
                      size:size,
                  },
                  function(data,status){
                      if(status=="success")
                      {
                        if(data <= 8){
                          for(let i = 1; i <= data; i++) {
                            x = document.getElementById("sl");
                            var option = document.createElement("option");
                            option.text = i;
                            option.value = i;
                            x.add(option);
                          }
                        }else if(data > 8){
                          for(let i = 1; i <= 8; i++) {
                            x = document.getElementById("sl");
                            var option = document.createElement("option");
                            option.text = i;
                            option.value = i;
                            x.add(option);
                          }
                        }
                        

                          
                      }
                  }
              ); 
              }
              
            });

            $("#addToCartBtn").click(function(){
              id = <?php echo $_GET['id'] ?>;
              size = document.getElementById("Size").value;
              sl = document.getElementById("sl").value;

              if(size == "" || sl == ""){
                $("#alert-addtocart-success").html("<p style=\'color: red;font-weight:bold\'>" + "Vui lòng chọn size và số lượng" +"</p>").addClass("show");
                        setTimeout(function(){
                            $("#alert-addtocart-success").removeClass("show");
                        }, 3000);
              }else{
                ten = $("#tenSP").text();
                gia = document.getElementById("giaSP").value;
                img = document.getElementById("imgSP").value;
                
                $.post("pages/main/themGioHang_CTSP_Ajax.php",
                    {
                        id:id,
                        size:size,
                        sl:sl,
                        ten:ten,
                        gia:gia,
                        img:img,
                    },
                    function(data,status){
                        if(status=="success")
                        {
                          $("#alert-addtocart-success").html("<p style=\'color: red;font-weight:bold\'>" + data +"</p>").addClass("show");
                          setTimeout(function(){
                              $("#alert-addtocart-success").removeClass("show");
                          }, 3000);
                            
                        }
                    }
                ); 
              }

              
            });

            $("#muangay").click(function(){
              id = <?php echo $_GET['id'] ?>;
              size = document.getElementById("Size").value;
              sl = document.getElementById("sl").value;

              if(size == "" || sl == ""){
                $("#alert-addtocart-success").html("<p style=\'color: red;font-weight:bold\'>" + "Vui lòng chọn size và số lượng" +"</p>").addClass("show");
                        setTimeout(function(){
                            $("#alert-addtocart-success").removeClass("show");
                        }, 3000);
              }else{
                ten = $("#tenSP").text();
                gia = document.getElementById("giaSP").value;
                img = document.getElementById("imgSP").value;
                
                $.post("pages/main/themGioHang_CTSP_Ajax.php",
                    {
                        id:id,
                        size:size,
                        sl:sl,
                        ten:ten,
                        gia:gia,
                        img:img,
                    },
                    function(data,status){
                        if(status=="success")
                        {
                          location.replace("index.php?quanly=giohang")
                        }
                    }
                );
              }
               
            });
        });   
    </script>

</body>

</html>

<?php ob_end_flush(); ?>