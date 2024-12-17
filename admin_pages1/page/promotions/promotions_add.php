<?php session_start(); ?>
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

    <title>Thêm khuyến mãi</title>
    <style>
        .section_themkhuyenmai {
            position: relative;
            left: 250px;
            height: 100vh;
            width: calc(100% - 250px);
            background: var(--body-color);
            transition: var(--tran-05);
        }

        .sidebar-hnm.close~.section_themkhuyenmai {
            left: 88px;
            width: calc(100% - 88px);
        }

        .section_themkhuyenmai .text-hnm {
            font-size: 30px;
            font-weight: 500;
            color: var(--text-color);
            padding: 8px 40px;
            caret-color: transparent;
        }

        .section_themkhuyenmai {
            display: flex;
            align-items: stretch;
        }

        .div_promotions_add_1 {
            flex: 1;
            padding: 10px;
            align-items: center;
        }

        .div_promotions_add_2 {
            flex: 2;
            padding: 10px;
        }

        #div_promotions_add_enter {
            margin-left: 40px;
        }

        #div_themtenkhuyenmai,
        #div_themngaybatdaukhuyenmai,
        #div_themdiscountpercentage {
            margin-bottom: 10px;
        }

        #label_tenkhuyenmai,
        #label_ngaybatdaukhuyenmai,
        #label_ngayketthuckhuyenmai,
        #label_discountpercentage,
        #label_chonkhuyenmai {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        #input_tenkhuyenmai {
            width: 100%;
            max-width: 317px;
            padding: 8px;
        }

        #input_discountpercentage {
            width: 100%;
            max-width: 290px;
            padding: 8px;
        }

        #div_ngaybatdaukhuyenmai_ngayketthuckhuyenmai {
            display: flex;
            flex-wrap: wrap;
        }


        #div_themngaybatdaukhuyenmai {
            margin-right: 20px;
        }

        #input_ngaybatdaukhuyenmai,
        #input_ngayketthuckhuyenmai {
            padding: 8px;
        }

        #label_chonkhuyenmai {
            margin-top: 72px;
        }

        .text-hnm {
            font-size: 1.5em;
            font-weight: bold;
            margin-bottom: 20px;
        }

        #div_radio_chonkhuyenmai {
            margin-bottom: 20px;
        }

        #input_radio_sanphamcuthe {
            margin-bottom: 10px;
        }

        #input_radio_dongsanpham {
            margin-bottom: 10px;
        }

        #select_khuyenmai_dongsanpham {
            padding: 4px;
            margin-left: 18px;
        }

        .btn-themkhuyenmai {
            display: flex;
            height: 35px;
            padding: 0;
            background: #ff5f17;
            border: none;
            outline: none;
            border-radius: 5px;
            overflow: hidden;
            font-family: "Quicksand", sans-serif;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
        }

        .btn-themkhuyenmai:hover {
            background: #d54e10;
        }

        .btn-themkhuyenmai-text {
            display: inline-flex;
            align-items: center;
            padding: 0 5px;
            color: #fff;
            height: 100%;
        }

        #id_table_sanphamcuthe {
            border: solid 3px #ff5f17;
        }

        #id_table_sanphamcuthe tr td #input_nhapidsanphamcuthe {
            padding: 8px;
        }

        #id_table_sanphamcuthe tr td {
            height: 130px;
            width: 130px;
            padding-left: 10px;
            padding-right: 10px;
            background-color: white;
            border: solid 3px #ff5f17;
        }

        #id_table_sanphamcuthe tr td img {
            height: 90px;
            width: 120px;
        }
/* ------------------sửa--------------------- */

        /* .btn_themsanphamcuthe {
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

        .btn_themsanphamcuthe-text {
            display: inline-flex;
            align-items: center;
            padding: 0 5px;
            color: #ff5f17;
            height: 100%;
        } */
/* ------------------sửa--------------------- */

        #select_khuyenmai_dongsanpham {
            display: none;
        }
/* ------------------sửa--------------------- */
        .grid-container {
            display: grid;
            grid-template-columns: auto auto;
        }
        .themkhuyenmai{
            padding: 10px;
            margin-left: 30%;
        }

        .searchsp
        {
            width: 20rem;
            height: 2rem;
            margin-top: 0.5rem;
            margin-bottom: 1rem;
        }
        .trangthai
        {
            margin-bottom: 1rem;
        }
        table
        {
            margin-bottom: 5px;
        }

        .list-group{
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
    // -------------------bat dau---------------//
    // lấy id dòng cuối cùng được thêm vào
    // SELECT id FROM ten_bang ORDER BY id DESC LIMIT 1
    if(isset($_POST['themkhuyenmai']) && isset($_COOKIE['flag']) )
    {

                //lấy giá trị từ form
                // $tenkm = $_POST['input_tenkhuyenmai'];
                $ngaybd = $_POST['input_ngaybatdaukhuyenmai'];
                $ngaykt = $_POST['input_ngayketthuckhuyenmai'];
                $giatri = $_POST['input_discountpercentage'];


                //nếu chọn sale theo dòng sản phẩm
                if (isset($_POST['input_radio_dongsanpham']))
                {
                    // lấy dòng sản phẩm
                    $dongsp = $_POST['select_khuyenmai_dongsanpham'];
                    // productcolorid từ dòng sản phẩm nhập vào
                    $sql3 = "SELECT productcolorid FROM sanpham, productcolor, dongsp WHERE sanpham.sanphamid = productcolor.productid and sanpham.dongspid = dongsp.dongspid and tendongsp = '$dongsp';";
                    $rs3 = $mysqli->query($sql3);
                    if ($rs3->num_rows <= 0) {
                        // Không có sản phẩm, không thêm khuyến mãi và kmct
                        echo "<script> alert(Chưa có sản phẩm nào thuộc dòng '$dongsp'!)</script>";
                    } else {
                        // $sql = "SELECT saleoffid FROM saleofff ORDER BY id DESC LIMIT 1";

                        $sql2 = "INSERT INTO saleoff(ngaybd, ngaykt, giatrigiam, loaisp) VALUES ('$ngaybd','$ngaykt', '$giatri' , '$dongsp');";
                        $mysqli->query($sql2);
                        //lấy giá trị khuyến mãi id vừa được thêm vào
                        $sql = "SELECT MAX(saleoffid) as kmid FROM saleoff";
                        $rs = $mysqli->query($sql);
                        $row = $rs->fetch_assoc();
                        $kmid = $row['kmid'];
                        while ($row3 = $rs3->fetch_row()) {
                            //nhập kmct cho từng chi tiết sản phẩm

                            $sql5 = "INSERT INTO saleoffct(saleoffid, procolorid) VALUES ($kmid,$row3[0])";
                            $mysqli->query($sql5);

                        }
                    }
                } else if (isset($_POST['input_radio_sanphamcuthe']) && !isset($_POST['input_radio_dongsanpham']))
                {
                    $tensp = $_POST['showtensp']; //file timsp_post_ajax
                    // đếm đã nhập sản phẩm vào bảng chưa
                    if (count($tensp) <= 0) {
                        echo "Vui lòng nhập sản phẩm!";
                    } else {

                        $sql2 = "INSERT INTO saleoff(ngaybd, ngaykt, giatrigiam) VALUES ('$ngaybd','$ngaykt' , '$giatri');";
                        $mysqli->query($sql2);
                        //lấy giá trị khuyến mãi id vừa được thêm vào
                        $sql = "SELECT MAX(saleoffid) as kmid FROM saleoff";
                        $rs = $mysqli->query($sql);
                        $row = $rs->fetch_assoc();
                        $kmid = $row['kmid'];

                        $i = 0;
                        while ($i < count($tensp)) {
                            //lấy product colorid của từng sản phẩm được chọn trong bảng
                            $sql3 = "SELECT productcolorid FROM sanpham, productcolor WHERE sanpham.sanphamid = productcolor.productid and tensp = '$tensp[$i]';";
                            $rs3 = $mysqli->query($sql3);
                            $row3 = $rs3->fetch_assoc();
                            // thêm khuyến mãi chi tiết cho từng sản phẩm
                            $sql5 = "INSERT INTO saleoffct(saleoffid, procolorid) VALUES ($kmid, '".$row3['productcolorid']."')";
                            $mysqli->query($sql5);

                            $i++;
                        }
                    }

            }


    }
    ?>
    <section class="section_themkhuyenmai">
        <form method="post" onsubmit="return validateSaleForm()">
            <div class="grid-container">
                <div class="grid-item">
                    <div class="div_promotions_add_1">
                        <p class="text text-hnm">Thêm khuyến mãi</p>
                        <div id="div_promotions_add_enter">
                            <!-- <div id="div_themtenkhuyenmai">
                                <label id="label_tenkhuyenmai">Tên khuyến mãi</label>
                                <input type="text" id="input_tenkhuyenmai" name="input_tenkhuyenmai" placeholder="Nhập tên khuyến mãi">
                            </div> -->
                            <div id="div_ngaybatdaukhuyenmai_ngayketthuckhuyenmai">
                                <div id="div_themngaybatdaukhuyenmai">
                                    <label id="label_ngaybatdaukhuyenmai">Ngày bắt đầu</label>
                                    <input type="date" id="input_ngaybatdaukhuyenmai" name="input_ngaybatdaukhuyenmai" min="2023-11-17">
                                </div>
                                <div id="div_themngayketthuckhuyenmai">
                                    <label id="label_ngayketthuckhuyenmai">Ngày kết thúc</label>
                                    <input type="date" id="input_ngayketthuckhuyenmai" name="input_ngayketthuckhuyenmai" min="2023-11-18">
                                </div>
                            </div>

                            <div id="div_themdiscountpercentage">
                                <label id="label_discountpercentage">% giảm giá</label>
                                <input type="number" id="input_discountpercentage" name="input_discountpercentage" min = 0 step="1" max=100 placeholder="Nhập phần trăm giảm giá">
                            </div>
                            <input type="submit" class="themkhuyenmai" name="themkhuyenmai" value="Thêm khuyến mãi" >

                        </div>

                    </div>
                    <br>
                    <div class="check"></div>
                </div>

                <div class="grid-item">
                    <div class="div_promotions_add_2">
                    <div class="error"></div>
                        <div id="error-alert" ></div>
                        <label id="label_chonkhuyenmai">Khuyến mãi theo:</label>
                        <div id="div_radio_chonkhuyenmai">
                            <input id="input_radio_sanphamcuthe" name="input_radio_sanphamcuthe" type="radio">Sản phẩm cụ thể</input><br>
                            <input type="text" class="searchsp" id="searchsp" name="searchsp" style="display:none">
                            <!-- ---------sửa-------------- -->
                            <div class="list-group" id="show-list">

                            </div>
                            <!-- ---------sửa-------------- -->
                            <div class="trangthai" style="display:none"></div>
                            <table id="id_table_sanphamcuthe" class="table" name="id_table_sanphamcuthe" border="1" style="border-collapse:collapse;">

                            </table>
                        </div>
                        <div id="div_promotion_select_dongsanpham" name="div_promotion_select_dongsanpham">
                            <input type="radio" id="input_radio_dongsanpham" name="input_radio_dongsanpham">Dòng sản phẩm</input>
                            <select id="select_khuyenmai_dongsanpham" name="select_khuyenmai_dongsanpham">
                                <option name="Nike" value="Nike">Nike</option>
                                <option name="Adidas" value="Adidas">Adidas</option>
                                <option name="Bitis" value="Bitis">Biti's</option>
                                <option name="Puma" value="Puma">Puma</option>

                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</body>
<script src="../../../jq.js"></script>
<script src="../dashboard/admin_dashboard.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        /* ------------------sửa--------------------- */
        var radioSanPhamCuthe = document.getElementById("input_radio_sanphamcuthe");
        var radioDongSanPham = document.getElementById("input_radio_dongsanpham");
        // var btnThemSanPhamCuthe = document.querySelector('.btn_themsanphamcuthe');
        var tableSanPhamCuthe = document.querySelector('#id_table_sanphamcuthe');
        var selectDongSanPham = document.querySelector('#select_khuyenmai_dongsanpham');
        var searchsp = document.querySelector('.searchsp');
        var trangthai = document.querySelector('.trangthai');
        radioSanPhamCuthe.addEventListener("change", function() {
            if (radioSanPhamCuthe.checked) {
                radioDongSanPham.checked = false;
                // btnThemSanPhamCuthe.style.display = 'flex';
                searchsp.style.display = 'block';
                trangthai.style.display = 'block';
                selectDongSanPham.style.display = 'none';
                resetSelect();
            }
            /* ------------------sửa--------------------- */

        });

        radioDongSanPham.addEventListener("change", function() {
            if (radioDongSanPham.checked) {
                selectDongSanPham.style.display = 'flex';
                radioSanPhamCuthe.checked = false;
                // btnThemSanPhamCuthe.style.display = 'none'; // Ẩn nút khi chọn radio "Dòng sản phẩm"
                searchsp.style.display = 'none';
                trangthai.style.display = 'none';
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

        //sửa-----------------------------------------------------------------------------------------------------------
    });

</script>

<script>
    var table = document.querySelector('#id_table_sanphamcuthe');
    $(document).ready(function() {

        $('form').submit(function() {
            return validateSaleForm();
        });

    function validateSaleForm() {
        var vngaybd = $('#input_ngaybatdaukhuyenmai').val();
        var vngaykt = $('#input_ngayketthuckhuyenmai').val();
        var vgiatrigiam = $('#input_discountpercentage').val();
        var vtable = $('#id_table_sanphamcuthe').html();

         // Kiểm tra xem radio button có được chọn hay không
         var vdongsp = $('input[name="input_radio_dongsanpham"]:checked').val();

        var vspcuthe = $('input[name="input_radio_sanphamcuthe"]:checked').val();
        flag = false;
        if (vngaybd === '' || vngaykt === '' || vgiatrigiam === '') {
            flag = true;
            alert("Vui lòng điền đầy đủ thông tin");
        }
        else if(vdongsp === '' && vspcuthe ==='')
        {
            flag = true;
            alert("Vui lòng chọn sản phẩm.");
        }
        else if (isNegativeNumber(vgiatrigiam)) {
            flag = true;
            alert("Giá trị giảm giá không hợp lệ.")
        }

        else if (!isDateGreaterThanToday(vngaybd)) {
            flag = true;
            alert( "Ngày bắt đầu phải lớn hơn hôm nay.")
        }

        else if (!isDateGreaterThanToday(vngaykt)) {
            flag = true;
            alert("Ngày kết thúc không hợp lệ.")
        }

        else if (!isEndDateAfterStartDate(vngaybd, vngaykt)) {
            flag = true;
            alert("Ngày kết thúc phải sau ngày bắt đầu.")
        }
        // else if (!vdongsp && !vspcuthe) {
        //     flag = true;
        //     alert("Vui lòng chọn đồng sản phẩm hoặc sản phẩm cụ thể.")
        // }

        if (flag) {
            history.go(0);
            return false;
        }

        createCookie("flag", flag, 10);

        // Nếu không có lỗi, cho phép gửi biểu mẫu
        alert("Thêm khuyến mãi thành công.");
        return true;
    }

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
    // Replace the following functions with your actual validation functions
    function isNegativeNumber(value)
        {
            return typeof value === 'number' && value < 0;
        }

    function isDateGreaterThanToday(inputDate)
        {
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

        $('#searchsp').keyup(function(){
            var searchText = $(this).val();
            if(searchText!=''){
                $.ajax({
                    url: 'action.php',
                    method: 'post',
                    data: {query: searchText},
                    success: function(response){
                        $('#show-list').html(response);
                    }
                })
            }
            else{
                $('#show-list').html('');
            }
        });
        $(document).on('click','a', function(){
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
        $(document).on('click', '.delete', function() {
            $(this).parents("tr").remove();
        })

        $("#input_ngaybatdaukhuyenmai, #input_ngayketthuckhuyenmai").on("input", function () {
            validateDates();
        });

    });

</script>

</html>
