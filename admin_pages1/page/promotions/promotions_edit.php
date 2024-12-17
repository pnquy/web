<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../dashboard/admin_dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- --sửa---bootstrap 4 w3shcool tạo gợi ý ajax-->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js" integrity="sha512-WW8/jxkELe2CAiE4LvQfwm1rajOS8PHasCCx+knHG0gBHt8EXxS6T6tJRTGuDQVnluuAvMxWF4j8SNFDKceLFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <title>Sửa khuyến mãi</title>
    <style>
        .section_suakhuyenmai {
            position: relative;
            left: 250px;
            height: 100vh;
            width: calc(100% - 250px);
            background: var(--body-color);
            transition: var(--tran-05);
        }

        .sidebar-hnm.close~.section_suakhuyenmai {
            left: 88px;
            width: calc(100% - 88px);
        }

        .section_suakhuyenmai .text-hnm {
            font-size: 30px;
            font-weight: 500;
            color: var(--text-color);
            padding: 8px 40px;
            caret-color: transparent;
        }

        .section_suakhuyenmai {
            display: flex;
            align-items: stretch;
        }

        .div_promotions_edit_1 {
            flex: 1;
            padding: 10px;
            align-items: center;
        }

        .div_promotions_edit_2 {
            flex: 2;
            padding: 10px;
        }

        #div_promotions_edit_enter {
            margin-left: 40px;
        }

        #div_suatenkhuyenmai,
        #div_sua_ngaybatdaukhuyenmai,
        #div_sua_ngayketthuckhuyenmai,
        #div_sua_discountpercentage {
            margin-bottom: 10px;
        }

        #label_sua_tenkhuyenmai,
        #label_sua_ngaybatdaukhuyenmai,
        #label_sua_ngayketthuckhuyenmai,
        #label_sua_discountpercentage,
        #label_sua_chonkhuyenmai {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        #input_sua_tenkhuyenmai {
            width: 100%;
            max-width: 317px;
            padding: 8px;
        }

        #input_sua_discountpercentage {
            width: 100%;
            max-width: 290px;
            padding: 8px;
        }

        #div_sua_ngaybatdaukhuyenmai_ngayketthuckhuyenmai {
            display: flex;
            flex-wrap: wrap;
        }


        #div_sua_ngaybatdaukhuyenmai {
            margin-right: 20px;
        }

        #input_sua_ngaybatdaukhuyenmai,
        #input_sua_ngayketthuckhuyenmai {
            padding: 8px;
        }

        #label_sua_chonkhuyenmai {
            margin-top: 72px;
        }

        .text-hnm {
            font-size: 1.5em;
            font-weight: bold;
            margin-bottom: 20px;
        }

        #div_radio_sua_chonkhuyenmai {
            margin-bottom: 20px;
        }

        #input_radio_sua_sanphamcuthe {
            margin-bottom: 10px;
        }

        #input_radio_sua_dongsanpham {
            margin-bottom: 10px;
        }

        #select_sua_khuyenmai_dongsanpham {
            padding: 4px;
            margin-left: 18px;
        }

        #id_table_sua_sanphamcuthe {
            border: solid 3px #ff5f17;
        }

        #id_table_sua_sanphamcuthe tr td #input_sua_nhapidsanphamcuthe {
            padding: 8px;
        }

        #id_table_sua_sanphamcuthe tr td {
            height: 130px;
            width: 130px;
            padding-left: 10px;
            padding-right: 10px;
            background-color: white;
            border: solid 3px #ff5f17;
        }

        #id_table_sua_sanphamcuthe tr td img {
            height: 90px;
            width: 120px;
        }

        .btn_suasanphamcuthe {
            display: none;
            height: 35px;
            padding: 0;
            background: #f1f1f1;
            border: none;
            outline: none;
            border-radius: 5px;
            overflow: hidden;
            font-family: "Quicksand", sans-serif;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            margin-bottom: 10px;
        }

        .btn_suasanphamcuthe-text {
            display: inline-flex;
            align-items: center;
            padding: 0 5px;
            color: #ff5f17;
            height: 100%;
        }

        #select_sua_khuyenmai_dongsanpham {
            display: none;
        }

        /* ------------------sửa--------------------- */
        .suakhuyenmai {
            padding: 10px;
        }

        .grid-container {
            display: grid;
            grid-template-columns: auto auto;
        }

        .searchsp {
            width: 20rem;
            height: 2rem;
            margin-top: 0.5rem;
            margin-bottom: 1rem;
        }

        .trangthai {
            /* margin-top: ; */
            margin-bottom: 1rem;
        }

        table {
            margin-bottom: 5px;
        }

        .list-group {
            position: relative;
            margin-left: 0px;
            margin-top: -16px;
            /* height: 1rem; */
        }

        /* ------------------sửa--------------------- */
    </style>
</head>

<body>
    <?php
    include('../../navigation/menu_navigation.php');
    include('../../../config/config.php');
    ?>
    <?php
    if (isset($_POST['suakhuyenmai'])) {
        //khi nhấn nút update thì mặc định xóa hết tất cả kmct rồi thêm mới
        // $tenkm = $_POST['input_tenkhuyenmai'];
        $ngaybd = $_POST['input_sua_ngaybatdaukhuyenmai'];
        $ngaykt = $_POST['input_sua_ngayketthuckhuyenmai'];
        $giatri = $_POST['input_sua_discountpercentage'];
        $saleoffid = $_GET['edit'];
        $sql_xoa = "DELETE FROM saleoffct WHERE saleoffid = '$saleoffid'";
        $rs_sql_xoa = $mysqli->query($sql_xoa);

        //nếu chọn sale theo dòng sản phẩm
        if (isset($_POST['input_radio_sua_dongsanpham'])) {
            // lấy dòng sản phẩm
            $dongsp = $_POST['select_sua_khuyenmai_dongsanpham'];
            // productcolorid từ dòng sản phẩm nhập vào
            $sql3 = "SELECT productcolorid FROM sanpham, productcolor, dongsp WHERE sanpham.sanphamid = productcolor.productid and sanpham.dongspid = dongsp.dongspid and tendongsp = '$dongsp';";
            $rs3 = $mysqli->query($sql3);
            if ($rs3->num_rows <= 0) {
                // Không có sản phẩm, không thêm khuyến mãi và kmct
                echo "<script> alert(Chưa có sản phẩm nào thuộc dòng '$dongsp'!)</script>";
            } else {

                $sql2 = "UPDATE saleoff  SET ngaybd ='$ngaybd', ngaykt ='$ngaykt', giatrigiam ='$giatri',loaisp ='$dongsp' WHERE saleoffid = '$saleoffid';";
                $mysqli->query($sql2);
                while ($row3 = $rs3->fetch_row()) {
                    //nhập id cho từng chi tiết sản phẩm
                    $sql5 = "INSERT INTO saleoffct(saleoffid, procolorid) VALUES ('$saleoffid','$row3[0]')";
                    $mysqli->query($sql5);
                }
            }

        } else if (isset($_POST['input_radio_sua_sanphamcuthe']) && !isset($_POST['input_radio_sua_dongsanpham'])) {
            $tensp = $_POST['showtensp'];
            if (count($tensp) <= 0) {
                echo "Vui lòng nhập sản phẩm!";
            } else {

                $sql2 = "UPDATE saleoff  SET ngaybd ='$ngaybd', ngaykt ='$ngaykt', giatrigiam ='$giatri'WHERE saleoffid = '$saleoffid';";
                $mysqli->query($sql2);
                $i = 0;
                while ($i < count($tensp)) {
                    $sql3 = "SELECT productcolorid FROM sanpham, productcolor WHERE sanpham.sanphamid = productcolor.productid and tensp = '$tensp[$i]';";
                    $rs3 = $mysqli->query($sql3);
                    $row3 = $rs3->fetch_row();

                    $sql5 = "INSERT INTO saleoffct(saleoffid, procolorid) VALUES ('$saleoffid','$row3[0]')";
                    $mysqli->query($sql5);

                    $i++;
                }
            }
        }
    }
    ?>
    <?php
    $editval = $_GET["edit"];
    $sql = "SELECT * FROM saleoff WHERE saleoffid = '$editval'";
    $rs = $mysqli->query($sql);
    $row = $rs->fetch_assoc();
    $ngayBD = date("Y-m-d", strtotime($row['ngaybd']));
    $ngayKT = date("Y-m-d", strtotime($row['ngaykt']));
    ?>

    <section class="section_suakhuyenmai">
        <form action="" method="post">
            <div class="grid-container">
                <div class="grid-item">
                    <div class="div_promotions_edit_1">
                        <p class="text text-hnm">Sửa khuyến mãi</p>
                        <div id="div_promotions_edit_enter">
                            <!-- <div id="div_suatenkhuyenmai">
                            <label id="label_sua_tenkhuyenmai">Tên khuyến mãi</label>
                            <input type="text" id="input_sua_tenkhuyenmai" name="input_sua_tenkhuyenmai" placeholder="Nhập tên khuyến mãi" value="">
                        </div> -->
                            <div id="div_sua_ngaybatdaukhuyenmai_ngayketthuckhuyenmai">
                                <div id="div_sua_ngaybatdaukhuyenmai">
                                    <label id="label_sua_ngaybatdaukhuyenmai">Ngày bắt đầu</label>
                                    <input type="date" id="input_sua_ngaybatdaukhuyenmai" name="input_sua_ngaybatdaukhuyenmai" min="2023-11-17" <?php echo "value='$ngayBD'" ?>>
                                </div>
                                <div id="div_sua_ngayketthuckhuyenmai">
                                    <label id="label_sua_ngayketthuckhuyenmai">Ngày kết thúc</label>
                                    <input type="date" id="input_sua_ngayketthuckhuyenmai" name="input_sua_ngayketthuckhuyenmai" min="2023-11-18" <?php echo "value='$ngayKT'" ?>>
                                </div>
                            </div>

                            <div id="div_sua_discountpercentage">
                                <label id="label_sua_discountpercentage">% giảm giá</label>
                                <input type="number" id="input_sua_discountpercentage" name="input_sua_discountpercentage" min=0 step="1" max=100 value="<?php echo $row['giatrigiam'] ?>">
                            </div>

                            <input type="submit" class="suakhuyenmai" name="suakhuyenmai" value="Sửa khuyến mãi">
                        </div>
                    </div>
                </div>

                <div class="grid-item" style="margin-left: 30px">
                    <div class="div_promotions_add_2" style="margin-top: 80px">
                        <label id="label_chonkhuyenmai"><b>Khuyến mãi theo:</b></label>
                        <div id="div_radio_chonkhuyenmai">
                            <input id="input_radio_sua_sanphamcuthe" name="input_radio_sua_sanphamcuthe" <?php echo ($row['loaisp'] == "") ? 'checked' : ''; ?> type="radio">Sản phẩm cụ thể</input><br>
                            <input type="text" class="searchsp" id="searchsp" name="searchsp" style="<?php echo ($row['loaisp'] == "") ? 'display:block' : 'display:none'; ?>">
                            <!-- input_radio_sua_sanphamcuthe -->
                            <!-- ---------sửa-------------- -->
                            <div class="list-group" id="show-list">

                            </div>
                            <!-- ---------sửa-------------- -->

                            <div class="trangthai" <?php echo ($row['loaisp'] == "") ? 'display:block' : 'display:none'; ?>></div>
                            <table id="id_table_sua_sanphamcuthe" name="id_table_sua_sanphamcuthe" border="1" style="border-collapse:collapse;">
                                <?php
                                if ($row['loaisp'] == "") {
                                    $sql1 = "SELECT tensp, img1, productcolor.productcolorid FROM saleoffct, sanpham, productcolor WHERE saleoffid = '$_GET[edit]' and sanpham.sanphamid = productcolor.productid and saleoffct.procolorid = productcolor.productcolorid;";
                                    $rs1 = $mysqli->query($sql1);
                                    while ($row1 = $rs1->fetch_row()) {
                                        $str = '';
                                        $str .= '<tr>';
                                        $str .= '<td><div><input type="hidden" name="showtensp[]" value="' . $row1[0] . '">' . $row1[0] . '</div></td>';
                                        $str .= '<td><div class="hinhanhsp"><img src="../products/uploads/' . $row1[1] . '"></div></td>';
                                        $str .= '<td><button proid="' . $row1[2] . '" tensp="' . $row1[0] . '" class="delete">Xóa</button></td>';
                                        $str .= '</tr>';
                                        echo $str;
                                    }
                                }
                                ?>
                            </table>
                        </div>
                        <div id="div_promotion_select_dongsanpham" name="div_promotion_select_dongsanpham">
                            <!-- input_radio_sua_dongsanpham -->
                            <input type="radio" id="input_radio_sua_dongsanpham" name="input_radio_sua_dongsanpham" <?php echo ($row['loaisp'] != "") ? "checked" : ""; ?>>Dòng sản phẩm</input>

                            <select id="select_sua_khuyenmai_dongsanpham" name="select_sua_khuyenmai_dongsanpham" style="<?php echo ($row['loaisp'] != "") ? "display:block" : "display:none"; ?>">
                                <?php if ($row['loaisp'] != "") { ?>
                                    <option name="Nike" value="Nike" <?php echo ($row['loaisp'] == "Nike") ? 'selected' : ''; ?>>Nike</option>
                                    <option name="Adidas" value="Adidas" <?php echo ($row['loaisp'] == "Adidas") ? 'selected' : ''; ?>>Adidas</option>
                                    <option name="Bitis" value="Bitis" <?php echo ($row['loaisp'] == "Bitis") ? 'selected' : ''; ?>>Biti's</option>
                                    <option name="Puma" value="Puma" <?php echo ($row['loaisp'] == "Puma") ? 'selected' : ''; ?>>Puma</option>

                                <?php } ?>
                            </select>
                        </div>


                    </div>
                </div>

            </div>
        </form>
    </section>
</body>
<script src="../../../jq.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="../dashboard/admin_dashboard.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var radioSanPhamCuthe = document.getElementById("input_radio_sua_sanphamcuthe");
        var radioDongSanPham = document.getElementById("input_radio_sua_dongsanpham");
        var radiosua = document.getElementsByName("sua");
        var tableSanPhamCuthe = document.querySelector('#id_table_sua_sanphamcuthe');
        var selectDongSanPham = document.querySelector('#select_sua_khuyenmai_dongsanpham');
        var searchsp = document.querySelector('.searchsp');
        var trangthai = document.querySelector('.trangthai');
        radioSanPhamCuthe.addEventListener("change", function() {
            if (radioSanPhamCuthe.checked) {
                radioDongSanPham.checked = false;
                selectDongSanPham.style.display = 'none';
                searchsp.style.display = 'block';
                trangthai.style.display = 'block';
                resetSelect();
            }
        });

        radioDongSanPham.addEventListener("change", function() {
            if (radioDongSanPham.checked) {
                selectDongSanPham.style.display = 'block';
                radioSanPhamCuthe.checked = false;
                searchsp.style.display = 'none';
                trangthai.style.display = 'none';
                trangthai.innerHTML = '';
                // -----chưa xóa được search trước đó
                // searchsp.val = "";
                resetTable(); // Gọi hàm để reset bảng
            }
        });
        // Hàm để reset bảng
        function resetTable() {
            tableSanPhamCuthe.innerHTML = ''; // Xóa nội dung bảng

            // Các bước khác để reset dữ liệu theo nhu cầu của bạn
        }
        // Hàm để reset select
        function resetSelect() {
            selectDongSanPham.selectedIndex = 0; // Đặt lại index về giá trị mặc định (hoặc giá trị mong muốn khác)
            // Các bước khác để reset dữ liệu select theo nhu cầu của bạn
        }
    });
</script>

<script>
    let table = document.querySelector('#id_table_sua_sanphamcuthe');
    $(document).ready(function() {

        $('form').submit(function() {
            return validateSaleForm();
        });

        function validateSaleForm() {
            var vngaybd = $('#input_sua_ngaybatdaukhuyenmai').val();
            var vngaykt = $('#input_sua_ngayketthuckhuyenmai').val();
            var vgiatrigiam = $('#input_sua_discountpercentage').val();
            var vtable = $('#id_table_sua_sanphamcuthe').html();

            // Kiểm tra xem radio button có được chọn hay không
            var vdongsp = $('input[name="input_radio_sua_dongsanpham"]:checked').val();

            var vspcuthe = $('input[name="input_radio_sua_sanphamcuthe"]:checked').val();

            if (vngaybd === '' || vngaykt === '' || vgiatrigiam === '') {
                flag = true;
                alert("Vui lòng điền đầy đủ thông tin");
            } else if (vdongsp === '' && vspcuthe === '') {
                flag = true;
                alert("Vui lòng chọn sản phẩm.");
            } else if (isNegativeNumber(vgiatrigiam)) {
                flag = true;
                alert("Giá trị giảm giá không hợp lệ.")
            } else if (!isDateGreaterThanToday(vngaybd)) {
                flag = true;
                alert("Ngày bắt đầu phải lớn hơn hôm nay.")
            } else if (!isDateGreaterThanToday(vngaykt)) {
                flag = true;
                alert("Ngày kết thúc không hợp lệ.")
            } else if (!isEndDateAfterStartDate(vngaybd, vngaykt)) {
                flag = true;
                alert("Ngày kết thúc phải sau ngày bắt đầu.")
            }


            if (flag) {
                return false;
            }

            // Nếu không có lỗi, cho phép gửi biểu mẫu
            alert("Sửa thành công");
            return true;
        }

        function isNegativeNumber(value) {
            return typeof value === 'number' && value < 0;
        }

        function isDateGreaterThanToday(inputDate) {
            // Chuyển đổi ngày nhập vào thành đối tượng Date
            var inputDateObject = new Date(inputDate);
            // alert (inputDateObject);

            // Kiểm tra xem ngày nhập vào có lớn hơn ngày hiện tại hay không
            return inputDateObject > new Date();
        }

        function isEndDateAfterStartDate(startDate, endDate) {
            // Chuyển đổi ngày bắt đầu và ngày kết thúc thành đối tượng Date
            var startDateObject = new Date(startDate);
            var endDateObject = new Date(endDate);
            // Kiểm tra xem ngày kết thúc có lớn hơn ngày bắt đầu hay không
            return endDateObject > startDateObject;
        }

        $('#searchsp').keyup(function() {
            var searchText = $(this).val();
            if (searchText != '') {
                $.ajax({
                    url: 'action.php',
                    method: 'post',
                    data: {
                        query: searchText
                    },
                    success: function(response) {
                        $('#show-list').html(response);
                    }
                })
            } else {
                $('#show-list').html('');
            }
        });
        $(document).on('click', 'a', function() {
            $('#searchsp').val($(this).text());
            $('#show-list').html('');
            $('.trangthai').empty();
            input_nhaptensanphamcuthe = $(this).text();
            var flag = 0;
            $('table').find('tr').each(function() {
                if ($(this).find('td').eq(0).text() == input_nhaptensanphamcuthe) {
                    flag = 1;
                    return false;
                }
            });
            if (flag == 1) {
                $('.trangthai').html("Sản phẩm đã nhập. Vui lòng nhập sản phẩm khác");
            } else {
                $.post("timsp_post_ajax.php", {
                        ten: input_nhaptensanphamcuthe
                    },
                    function(data, status) {
                        if (status == "success") {
                            if (data == "") {
                                $('.trangthai').html("Không tìm thấy");
                            } else {

                                table.innerHTML += data;

                            }
                        }
                    });
            }
        })

        // $(document).on('click', '.delete', function() {
        // $(this).parents("tr").remove();
        // $('.delete').click(function() {
        //     tensp = $(this).attr('tensp');
        //     proid = $(this).attr('proid');
        //     makm = <?php $_GET['edit'] ?>;
        //     $(this).parents("tr").remove();
        //     $.post("xoaKM_ajax.php", {
        //             sua: 1,
        //             tensp: text,
        //             makm: makm,
        //             proid: proid
        //         },
        //         function(data, status) {
        //             if (status == "success") {

        //             }
        //         });
        // })
        // })
        $(document).on('click', '.delete', function() {
            $(this).parents("tr").remove();

        })

    });
</script>

</html>
