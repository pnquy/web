<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../dashboard/admin_dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Thêm khách hàng</title>
    <style>
        .section_themkhachhang {
            position: relative;
            left: 250px;
            height: 100vh;
            width: calc(100% - 250px);
            background: var(--body-color);
            transition: var(--tran-05);
        }

        .sidebar-hnm.close~.section_themkhachhang {
            left: 88px;
            width: calc(100% - 88px);
        }

        .section_themkhachhang .text-hnm {
            font-size: 30px;
            font-weight: 500;
            color: var(--text-color);
            padding: 8px 40px;
            caret-color: transparent;
        }

        .section_themkhachhang {
            display: flex;
            align-items: stretch;
        }

        #div_customers_add_enter {
            margin-left: 40px;
        }

        .text-hnm {
            font-size: 1.5em;
            font-weight: bold;
            margin-bottom: 20px;
        }

        #label_tenkhachhang,
        #label_gioitinh,
        #label_sdt,
        #label_email,
        #label_diachi,
        #label_matkhau,
        #label_xacnhan_matkhau {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        #input_tenkhachhang,
        #input_email,
        #input_diachi,
        #input_sdt,
        #input_matkhau,
        #input_xacnhan_matkhau {
            width: 100%;
            max-width: 460px;
            padding: 8px;
        }

        #div_themtenkhachhang,
        #div_themgioitinh,
        #div_themsdt,
        #div_thememail,
        #div_themdiachi,
        #div_themmatkhau,
        #div_themxacnhan_matkhau,#div_themmatkhau,#div_themxacnhan_matkhau {
            margin-bottom: 10px;
        }

        #div_gioitinh_sdt {
            display: flex;
            flex-wrap: wrap;
        }
        #div_themmatkhau_themxacnhan_matkhau{
            display: flex;
            flex-wrap: wrap;
        }

        #div_themgioitinh,
        #div_themsdt {
            flex: 1;
            margin-right: 0px;
        }

        #div_themmatkhau,#div_themxacnhan_matkhau{
            flex: 1;
            margin-right: 0px;
        }

        #select_gioitinh {
            padding: 8px;
        }

        .div_customers_add_1 {
            max-width: 500px;
            width: 100%;
        }
        #input_matkhau{
            max-width: 200px;
            width: 100%;
        }
        .btn-themkhachhang {
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

        .btn-themkhachhang:hover {
            background: #d54e10;
        }

        .btn-themkhachhang-text {
            display: inline-flex;
            align-items: center;
            padding: 0 5px;
            color: #fff;
            height: 100%;
        }
    </style>

</head>

<body>
    <?php
    include('../../navigation/menu_navigation.php');
    ?>
    <section class="section_themkhachhang">
        <div class="div_customers_add_1">
            <p class="text text-hnm">Thêm khách hàng</p>
            <div id="div_customers_add_enter">
                <div id="div_themtenkhachhang">
                    <label id="label_tenkhachhang">Tên khách hàng</label>
                    <input type="text" id="input_tenkhachhang" name="input_tenkhachhang" placeholder="Nhập tên khách hàng">
                </div>
                <br>

                <div id="div_gioitinh_sdt">
                    <div id="div_themgioitinh">
                        <label id="label_gioitinh">Giới tính</label>
                        <select id="select_gioitinh" name="select_gioitinh">
                            <option name="gioitinh_nam">Nam</option>
                            <option name="gioitinh_nu">Nữ</option>
                        </select>
                    </div>
                    <div id="div_themsdt">
                        <label id="label_sdt">Số điện thoại</label>
                        <input type="text" id="input_sdt" name="input_sdt" placeholder="Nhập số điện thoại">
                    </div>
                </div>
                <br>
                <div id="div_thememail">
                    <label id="label_email">Email</label>
                    <input type="text" id="input_email" name="input_email" placeholder="Nhập email">
                </div>
                <br>
                <div id="div_themdiachi">
                    <label id="label_diachi">Địa chỉ</label>
                    <input type="text" id="input_diachi" name="input_diachi" placeholder="Nhập địa chỉ">
                </div>
                <br>
                <div id="div_themmatkhau_themxacnhan_matkhau">
                    <div id="div_themmatkhau">
                        <label id="label_matkhau">Mật khẩu</label>
                        <input type="text" id="input_matkhau" name="input_matkhau" placeholder="Nhập mật khẩu">
                    </div>
                    <div id="div_themxacnhan_matkhau">
                        <label id="label_xacnhan_matkhau">Xác nhận mật khẩu</label>
                        <input type="text" id="input_xacnhan_matkhau" name="input_xacnhan_matkhau" placeholder="Xác nhận mật khẩu">
                    </div>
                </div>
                <br>
                <button type="button" class="btn-themkhachhang">
                    <span class="btn-themkhachhang-text" name="btn-themkhachhang-text"><b>Thêm khách hàng</b></span>
                </button>
            </div>
        </div>
    </section>
</body>
<script src="../../../jq.js"></script>
<script src="../dashboard/admin_dashboard.js"></script>

</html>