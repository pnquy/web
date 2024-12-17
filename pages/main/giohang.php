<?php ob_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ----------------------------------------------------------- -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Giỏ Hàng</title>

    <!-- <link rel="stylesheet" href="/css/giohang.css"> -->
    <link rel="stylesheet" href="css/giohang.css">
    <!-- code chỉnh theo máy mình -->
    <style>
        #alert-update-size-quantity {
            display: none;
        }

        #alert-update-size-quantity.show {
            display: block;
        }
    </style>
</head>

<body>
    <div class="container" style="margin-top: 20px; margin-bottom: 60px;">
        <div class="row">
            <?php
            if (isset($_POST['xoahet'])) {
                unset($_SESSION['cart']);
            }
            ?>
            <!-- giỏ hàng demo  -->
            <?php
                
            // Nếu như đổi size của sản phẩm thì phải unset sản phẩm cũ vì pcs khác nhau
            if (isset($_COOKIE['masp'])) {
                if(isset($_SESSION['cart'])){
                    if (count($_SESSION['cart']) == 0) {
                        unset($_SESSION['cart']);
                    } else {
                        unset($_SESSION['cart'][$_COOKIE['masp']]);
                    }
                }
                
            }


            // test

            ?>
            <div class="col-lg-8">
                <h4 class="title-1" style="font-weight: bolder;">GIỎ HÀNG</h4>
                <p id="alert-update-size-quantity"></p>
                <table>
                    <form action="" method="post">
                        <?php
                        // Nếu như đổi size thì tạo ra 1 session của sản phẩm mới
                        if (isset($_COOKIE['size_change'])) {
                            echo '<script>
    $("#alert-update-size-quantity").html("<p style=\'color: red;font-weight:bold\'>Cập nhật kích thước thành công!</p>")
        .addClass("show");
    setTimeout(function(){
        $("#alert-update-size-quantity").removeClass("show");
    }, 3000);
</script>';
                            $masp = $_COOKIE['size_change'];
                            $size = $_COOKIE['masp_size'];
                            $sl = $_COOKIE['masp_sl'];
                            unset($_SESSION['cart'][$masp]);

                            $str = "select procolorid from procolorsize where procolorsizeid = '" . $masp . "'";
                            $rs = $connect->query($str);


                            if ($rs->num_rows > 0) {
                                while ($row = $rs->fetch_row()) {
                                    $procolorid = $row[0];
                                    $str1 = "select procolorsizeid from procolorsize where procolorid = '" . $procolorid . "' and size = '" . $size . "'";
                                    $rs1 = $connect->query($str1);


                                    if ($rs1->num_rows > 0) {
                                        while ($row1 = $rs1->fetch_row()) {
                                            $str2 = "select tensp, giasp, img1 from productcolor, sanpham where productcolor.productid = sanpham.sanphamid and productcolorid = '" . $procolorid . "'";
                                            $rs2 = $connect->query($str2);


                                            if ($rs2->num_rows > 0) {
                                                while ($row2 = $rs2->fetch_row()) {
                                                    if (!isset($_SESSION['cart'][$row1[0]])) {
                                                        $_SESSION['cart'][$row1[0]] = array(
                                                            'ten' => $row2[0],
                                                            'size' => $size,
                                                            'sl' => $sl,
                                                            'gia' => $row2[1],
                                                            'img' => $row2[2],
                                                            'productcolorsizeid' => $row1[0],
                                                            'productcolorid' => $row[0]
                                                        );
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        // Nếu như cập nhật số lượng thì mình set lại sl trong session của sp đó
                        if (isset($_COOKIE['masp_change'])) {
                            $_SESSION['cart'][$_COOKIE['masp_change']]['sl'] = $_COOKIE['masp_sl'];
                            echo '<script>
    $("#alert-update-size-quantity").html("<p style=\'color: red;font-weight:bold\'>Cập nhật số lượng thành công!</p>")
        .addClass("show");
    setTimeout(function(){
        $("#alert-update-size-quantity").removeClass("show");
    }, 3000);
</script>';
                        }
                        
                        if (!isset($_SESSION['cart'])) {
                            echo "<p> Chưa có sản phẩm </p>";
                        } else {
                            foreach ($_SESSION['cart'] as $pro) {


                        ?>
                                    <tr>
                                        <td>
                                            <div class="row cart-items">
                                                <div class="col-lg-3">
                                                    <a href="index.php?quanly=chitietsanpham&id=<?php echo $pro['productcolorid'] ?>"><img class="cart-item-img" src="uploads/<?php echo $pro['img'] ?>" width="100%"></a>
                                                    <span hidden id="productcolorsizrid"><?php echo $pro['productcolorsizeid'] ?></span>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="cart-item-info">
                                                        <a href="index.php?quanly=chitietsanpham&id=<?php echo $pro['productcolorid'] ?>" class="cart-item-name">
                                                            <h5 style="font-weight: bolder;"><?php echo $pro['ten'] ?></h5>
                                                        </a>
                                                        <div class="cart-item-price" aria-disabled="false">
                                                            <p class="text"><strong>MaSP: </strong>
                                                                <span>PCS</span>
                                                                <span class="masp" id="masp" data-automation=""><?php echo $pro['productcolorsizeid'] ?></span>
                                                            </p>
                                                            <p class="text"><strong>Giá: </strong>
                                                                <span class="price" id="price-item" data-automation=""><?php echo $pro['gia'] ?></span>
                                                            </p>

                                                        </div>
                                                        <div class="select-btn d-inline-flex">
                                                            <div class="mt-2 size">
                                                                <p class="text-muted mb-2">Kích thước</p>

                                                                <select class="form-select form-select-size" id="form-select-size" >
                                                                <?php
                                                                    $sq = "select size, sl, procolorsizeid from procolorsize where procolorid = '".$pro['productcolorid']."'";
                                                                    $res = $connect->query($sq);
                                                                    if ($res->num_rows > 0) {
                                                                    while ($rw = $res->fetch_row()) {
                                                                        if($rw[1] == 0){
                                                                            continue;
                                                                        }else{ ?> 
                                                                            <option value='<?php echo $rw[0] ?>' <?php if ($pro['productcolorsizeid'] == $rw[2]) echo ' selected="selected"'; ?>> <?php echo $rw[0] ?></option>                           
                                                                        <?php
                                                                            

                                                                        }
                                                                    }
                                                                    }
                                                                ?>
                                                                    
                                                                </select>
                                                            </div>

                                                            <div class="mt-2 quantity">
                                                                <p class="text-muted mb-2">Số lượng</p>
                                                                <select class="form-select form-select-quantity" id="form-select-quantity">
                                                                    
                                                                    <option value="1" <?php if ($pro['sl'] == '1') echo ' selected="selected"'; ?>>1</option>
                                                                    <option value="2" <?php if ($pro['sl'] == '2') echo ' selected="selected"'; ?>>2</option>
                                                                    <option value="3" <?php if ($pro['sl'] == '3') echo ' selected="selected"'; ?>>3</option>
                                                                    <option value="4" <?php if ($pro['sl'] == '4') echo ' selected="selected"'; ?>>4</option>
                                                                    <option value="5" <?php if ($pro['sl'] == '5') echo ' selected="selected"'; ?>>5</option>
                                                                    <option value="6" <?php if ($pro['sl'] == '6') echo ' selected="selected"'; ?>>6</option>
                                                                    <option value="7" <?php if ($pro['sl'] == '7') echo ' selected="selected"'; ?>>7</option>
                                                                    <option value="8" <?php if ($pro['sl'] == '8') echo ' selected="selected"'; ?>>8</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 right-cart-item">
                                                    <h5 class="total-price-item" style="font-weight: bolder;"></h5>
                                                    <p class="status"><i>Còn hàng</i> </p>

                                                    <div class="cart-btn">
                                                        <div class="container-heart"><i class="like fa-regular fa-heart" style="color: #E91926;" onclick="like()"></i></div>
                                                        <br /> <br />
                                                        <!-- <a href="/DoAN/pages/main/giohang.php?xoa=<?php echo $pro['productcolorsizeid'] ?>"> -->
                                                        <div class="container-trash btnXoaSP"><i class="fa-regular fa-trash-can" id="btn-xoa" style="color: #ffffff;"></i></div>

                                                        <!-- </a> -->
                                                    </div>

                                                </div>
                    </form>

            </div>
            <hr class="dashed">
            </td>
            </tr>

<?php

                                
                            }
                        }
?>


</table>
<!-- button quay lai va xoa het cuoi bang -->
<!-- <hr /> -->







<div class="btn-fi mt-4 mb-3">
    <form method="post">
        <a href="index.php?quanly=giohang"><button class="btn-clearAll" name="xoahet">XÓA HẾT</button></a>
    </form>

    <!-- Button xoá hết -->
    <?php
    if (isset($_POST['xoahet'])) {
        unset($_SESSION['cart']);
    }

    ?>


    <script>
        <!-- -----chỉnh sửa xóa tất cả-- 
        -->
        $(".btn-clearAll").click(function()
        {
        history.go(0);
        })


    </script>


</div>
        </div>
        <!-- end cart-item -->

        <!-- -------------------------------------------------- -->
        <!-- ------------------------chỉnh sửa khi nhập mã giảm giá ---------------------------------------------- -->
        <div class="col-lg-4">
            <div class="form-don-hang">
                <h4 class="title-2" style="font-weight: bolder;"> ĐƠN HÀNG</h4>
                <hr style="border-top: 2px solid black;" />
                <div class="maKM">
                    <h5 class="title-KM" style="font-weight: bolder;">NHẬP MÃ KHUYẾN MÃI</h5>
                    <form method="post">
                        <div class="input-group">
                            <input type="text" class="discount-code" name="codegiamgia">
                            <button type="submit" class="btn btnKm" name="btnKM" style="font-size: small;">ÁP DỤNG</button>
                        </div>
                    </form>
                    <?php
                    $giatrigiam = 0;
                    $giatrigiam1 = 0;
                    // Nếu như đã có mã giảm giá add trước rồi thì hiển thị lại mã giảm giá đã có
                    if (isset($_SESSION['magiamgia'])) {
                        $sql_giamgia1 = "SELECT DISTINCT giatrigiam from magiamgia where codemagiamgia = '" . $_SESSION['magiamgia'] . "';";
                        $row_giamgia1 = $connect->query($sql_giamgia1);
                        if ($row_giamgia1->num_rows > 0) {
                            $giamgia1 = $row_giamgia1->fetch_row();
                            $giatrigiam1 = round((float)$giamgia1[0] * 100) . '%';
                        }
                    }
                    // Nếu chọn btn áp dụng thì tạo ra 1 session mới của mã giảm giá đó
                    if (isset($_POST['btnKM'])) {
                        if (isset($_SESSION['cart'])) {
                            $codegiamgia = $_POST['codegiamgia'];
                            if ($codegiamgia == "") {
                                echo "Vui lòng nhập mã giảm giá!";
                            } else {
                                $sql_giamgia = "SELECT DISTINCT giatrigiam from magiamgia where codemagiamgia = '" . $codegiamgia . "';";
                                $row_giamgia = $connect->query($sql_giamgia);
                                if ($row_giamgia->num_rows > 0) {
                                    $giamgia = $row_giamgia->fetch_row();
                                    $giatrigiam = round((float)$giamgia[0] * 100) . '%';

                                    if (isset($_SESSION['magiamgia'])) {
                                        unset($_SESSION['magiamgia']);
                                    }

                                    if (!isset($_SESSION['magiamgia'])) {
                                        $_SESSION['magiamgia'] = $codegiamgia;
                                    }
                                } else {
                                    echo "Mã giảm giá không tồn tại!";
                                }
                            }
                        } else {
                            echo "Vui lòng thêm sản phẩm vào giỏ hàng!";
                        }
                    }
                    ?>

                    <!-- ------------------------kết thúc ---------------------------------------------- -->
                </div>
                <hr class="dashed">
                <div class="order-group mt-4">
                    <div class="group-1" disabled>
                        <p>Đơn hàng</p>
                        <p class="total-price" data-automation=""></p>
                    </div>
                    <div class="group-2">
                        <p>Giảm</p>
                        <p class="discount"><?php
                                            if ($giatrigiam != 0) {
                                                echo $giatrigiam;
                                            } else if ($giatrigiam1 != 0) {
                                                echo $giatrigiam1;
                                            } else {
                                                echo "0";
                                            }


                                            ?></p>
                        <!-- <p class="discount">0</p>  -->
                    </div>
                    <hr class="dashed">
                    <div class="group-3 mt-4">
                        <h5 style="font-weight: bolder;">TẠM TÍNH</h5>
                        <h5 class="finalPrice" style="font-weight: bolder;">0</h5>
                    </div>
                    <div class="btn-thanh-toan mt-3">
                        <a href="index.php?quanly=thanhtoan"><button type="submit" class="btnThanhToan">TIẾP TỤC THANH TOÁN</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!----------------------Script ----------------------->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="jquery-3.7.1.min.js"></script>


    <script>
        // -----------------------chỉnh sửa nút xóa từng sản phẩm thep jquery-----------------
        $(document).ready(function() {
            $(document).on('click', '#btn-xoa', function(event) {
                $(this).parents("tr").remove();
                TongGioHang();
                masp = $(this).parents("tr").find("#masp").text();
                createCookie("masp", masp, "10");
                history.go(0);
            })
            // ---------end--------------chỉnh nút xóa từng sản phẩm thep jquery-----------------
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



            TongGioHang();

            function TongGioHang() {
                var total = 0;
                // tổng tiền từng loại sản phẩm ban đầu
                //-------------chỉnh sửa xóa format int sang chuỗi giá VND
                $(".total-price-item").each(function() {
                    var selectedQuantity = $(this).closest(".cart-items").find(".form-select-quantity").val();
                    var price = $(this).closest(".cart-items").find(".price").text();
                    var totalPrice = selectedQuantity * parseFloat(price);

                    $(this).html(totalPrice);
                    total = total + parseFloat(totalPrice);

                    // code cũ format gia tien vd: 1.000.000VND
                    // var format = totalPrice.toFixed(3).replace(/(\d)(?=(\d{3})+\.)/g, "$1.").toString();
                    // $(this).html(format + " VND");

                })
                $(".total-price").html(total);
                var discount = $('.discount').text();
                if (discount != 0) {
                    discount = discount.substring(0, discount.length - 1);
                }
                var temp = total - total * parseFloat(discount) / 100;
                $(".finalPrice").html(temp);
                // code cũ
                // $(".total-price").html(total.toFixed(3).replace(/(\d)(?=(\d{3})+\.)/g, "$1.").toString()+ " VND");  
                // var temp = total - parseFloat($('.discount').text());
                // $(".finalPrice").html(temp.toFixed(3).replace(/(\d)(?=(\d{3})+\.)/g, "$1.").toString()+ " VND");    
            }
            // <!-- -----------tổng giá tiền cho từng loại sản phẩm khi thay đổi số lượng -------------- -->
            $(".form-select-quantity").change(function() {
                masp = $(this).closest(".cart-items").find("#masp").text();

                var selectedQuantity = $(this).val();
                
                createCookie('masp_change', masp, "10");
                createCookie('masp_sl', selectedQuantity, "10");
                history.go(0);

                
                var price = $(this).closest(".cart-items").find(".price").text();
                var totalPrice = selectedQuantity * parseInt(price);
                // var format =  totalPrice.toFixed(3).replace(/(\d)(?=(\d{3})+\.)/g, "$1.").toString();
                $(this).closest(".cart-items").find(".total-price-item").html(totalPrice);
                TongGioHang();
            })

            $(".form-select-size").change(function() {
                masp = $(this).closest(".cart-items").find("#masp").text();
                var selectedSize = $(this).val();

                selectElement = document.querySelector('.form-select-quantity');
                sl = selectElement.value;


                createCookie('size_change', masp, "10");
                createCookie('masp_size', selectedSize, "10");
                createCookie('masp_sl', sl, "10");
                history.go(0);

            })

        });

        $(".like").click(function() {
            if ($(this).hasClass('fa-solid')) {
                $(this).removeClass('fa-solid');
            } else {
                $(this).addClass('fa-solid');
            }
        });
    </script>


</body>

</html>
<?php ob_end_flush(); ?>