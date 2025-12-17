<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Khuyến Mãi - Admin MoveMax</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../dashboard/admin_dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
        
        .search-box-container { position: relative; }
        #show-list {
            position: absolute;
            z-index: 1000;
            width: 100%;
            background: white;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            border-radius: 0 0 10px 10px;
            max-height: 250px;
            overflow-y: auto;
        }
        #show-list a {
            display: block;
            padding: 10px 15px;
            text-decoration: none;
            color: #333;
            border-bottom: 1px solid #eee;
            transition: 0.2s;
        }
        #show-list a:hover {
            background-color: #f8f9fa;
            color: #CF7486;
            padding-left: 20px;
        }
        
        
        #id_table_sanphamcuthe img {
            width: 50px; height: 50px; 
            object-fit: cover; 
            border-radius: 8px; 
            border: 1px solid #eee; 
        }
    </style>
</head>

<body>
    <?php
    include('../../navigation/menu_navigation.php');
    include('../../../config/config.php');

    if (isset($_POST['themkhuyenmai'])) {
        $ngaybd = $_POST['input_ngaybatdaukhuyenmai'];
        $ngaykt = $_POST['input_ngayketthuckhuyenmai'];
        $giatri = $_POST['input_discountpercentage'];
        
        $scope = $_POST['scope'];

        if ($scope == 'line') {
            $dongsp = $_POST['select_khuyenmai_dongsanpham'];
            
            $sql_find = "SELECT pc.productcolorid 
                         FROM sanpham sp
                         JOIN productcolor pc ON sp.sanphamid = pc.productid
                         JOIN dongsp dsp ON sp.dongspid = dsp.dongspid 
                         WHERE dsp.tendongsp = '$dongsp'";
            $rs_find = $mysqli->query($sql_find);

            if ($rs_find->num_rows > 0) {
                $sql_insert_km = "INSERT INTO saleoff(ngaybd, ngaykt, giatrigiam, loaisp) VALUES ('$ngaybd','$ngaykt', '$giatri' , '$dongsp')";
                
                if ($mysqli->query($sql_insert_km)) {
                    $kmid = $mysqli->insert_id;

                    while ($row = $rs_find->fetch_assoc()) {
                        $procolorid = $row['productcolorid'];
                        $mysqli->query("INSERT INTO saleoffct(saleoffid, procolorid) VALUES ('$kmid', '$procolorid')");
                    }
                    echo "<script>alert('Thêm khuyến mãi thành công cho dòng $dongsp!'); window.location.href='promotions_management.php';</script>";
                } else {
                    echo "<script>alert('Lỗi: " . $mysqli->error . "');</script>";
                }
            } else {
                echo "<script>alert('Dòng sản phẩm $dongsp chưa có sản phẩm nào!');</script>";
            }

        } else {
            if (isset($_POST['showtensp']) && count($_POST['showtensp']) > 0) {
                $list_tensp = $_POST['showtensp'];

                $sql_insert_km = "INSERT INTO saleoff(ngaybd, ngaykt, giatrigiam) VALUES ('$ngaybd','$ngaykt', '$giatri')";
                
                if ($mysqli->query($sql_insert_km)) {
                    $kmid = $mysqli->insert_id;

                    foreach ($list_tensp as $ten) {
                        $sql_find_id = "SELECT pc.productcolorid 
                                        FROM sanpham sp
                                        JOIN productcolor pc ON sp.sanphamid = pc.productid 
                                        WHERE sp.tensp = '$ten'";
                        
                        $rs_id = $mysqli->query($sql_find_id);
                        if ($rs_id->num_rows > 0) {
                            while($r = $rs_id->fetch_assoc()){
                                $pid = $r['productcolorid'];
                                $mysqli->query("INSERT INTO saleoffct(saleoffid, procolorid) VALUES ('$kmid', '$pid')");
                            }
                        }
                    }
                    echo "<script>alert('Thêm khuyến mãi sản phẩm cụ thể thành công!'); window.location.href='promotions_management.php';</script>";
                }
            } else {
                echo "<script>alert('Vui lòng chọn ít nhất một sản phẩm!');</script>";
            }
        }
    }
    ?>

    <section class="home-section">
        <div class="container-fluid">
            <div class="admin-card">
                <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                    <h2 class="admin-title border-0 mb-0">Thêm Khuyến Mãi Mới</h2>
                    <a href="promotions_management.php" class="btn btn-outline-secondary rounded-pill px-3">
                        <i class='bx bx-arrow-back'></i> Quay lại
                    </a>
                </div>

                <form action="" method="post" id="form-add-promotion">
                    <div class="row">
                        <div class="col-lg-5 border-end pe-lg-4">
                            <h5 class="fw-bold text-primary mb-3"><i class='bx bx-time-five'></i> Thời Gian & Giá Trị</h5>
                            
                            <div class="mb-3">
                                <label class="form-label">Ngày bắt đầu</label>
                                <input type="date" class="form-control" name="input_ngaybatdaukhuyenmai" id="input_ngaybatdaukhuyenmai" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Ngày kết thúc</label>
                                <input type="date" class="form-control" name="input_ngayketthuckhuyenmai" id="input_ngayketthuckhuyenmai" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Phần trăm giảm (%)</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="input_discountpercentage" id="input_discountpercentage" min="1" max="100" placeholder="Ví dụ: 20" required>
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7 ps-lg-4">
                            <h5 class="fw-bold text-primary mb-3"><i class='bx bx-target-lock'></i> Phạm Vi Áp Dụng</h5>

                            <div class="d-flex gap-4 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="scope" id="radio_sp_cuthe" value="specific" checked>
                                    <label class="form-check-label fw-bold" for="radio_sp_cuthe">Sản phẩm cụ thể</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="scope" id="radio_dong_sp" value="line">
                                    <label class="form-check-label fw-bold" for="radio_dong_sp">Dòng sản phẩm</label>
                                </div>
                            </div>

                            <div id="box_sp_cuthe">
                                <div class="search-box-container mb-3">
                                    <input type="text" class="form-control rounded-pill ps-4" id="searchsp" placeholder="Nhập tên sản phẩm để tìm kiếm...">
                                    <div class="list-group" id="show-list"></div>
                                </div>
                                
                                <div class="trangthai text-danger small mb-2 fw-bold"></div>

                                <div class="table-responsive border rounded p-2" style="max-height: 400px; overflow-y: auto;">
                                    <table class="table table-hover mb-0 align-middle" id="id_table_sanphamcuthe">
                                        <thead class="table-light sticky-top">
                                            <tr>
                                                <th>Tên sản phẩm</th>
                                                <th style="width: 100px;">Hình ảnh</th>
                                                <th class="text-center" style="width: 80px;">Xóa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            </tbody>
                                    </table>
                                </div>
                                <div class="form-text mt-2"><i class='bx bx-info-circle'></i> Các sản phẩm trong bảng trên sẽ được áp dụng mức giảm giá.</div>
                            </div>

                            <div id="box_dong_sp" style="display: none;">
                                <div class="bg-light p-3 rounded">
                                    <label class="form-label fw-bold">Chọn dòng sản phẩm:</label>
                                    <select class="form-select" name="select_khuyenmai_dongsanpham">
                                        <option value="Nike">Nike</option>
                                        <option value="Adidas">Adidas</option>
                                        <option value="Bitis">Biti's</option>
                                        <option value="Puma">Puma</option>
                                    </select>
                                    <div class="form-text mt-2 text-primary">
                                        <i class='bx bx-check-double'></i> Tất cả sản phẩm thuộc thương hiệu này sẽ được giảm giá.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">
                    
                    <div class="text-center">
                        <button type="submit" name="themkhuyenmai" class="btn-admin btn-lg px-5">
                            <i class='bx bx-plus-circle'></i> TẠO KHUYẾN MÃI
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../../../jq.js"></script>
    <script src="../dashboard/admin_dashboard.js"></script>

    <script>
        $(document).ready(function() {
            const body = document.querySelector('body'),
            sidebar = body.querySelector('nav'),
            toggle = body.querySelector(".toggle-hnm");
            if(toggle){
                toggle.addEventListener("click", () =>{ sidebar.classList.toggle("close"); });
            }

            $('input[name="scope"]').change(function() {
                if ($('#radio_sp_cuthe').is(':checked')) {
                    $('#box_sp_cuthe').show();
                    $('#box_dong_sp').hide();
                } else {
                    $('#box_sp_cuthe').hide();
                    $('#box_dong_sp').show();
                }
            });

            $('#searchsp').keyup(function(){
                var searchText = $(this).val();
                if(searchText != ''){
                    $.ajax({
                        url: 'action.php',
                        method: 'post',
                        data: {query: searchText},
                        success: function(response){
                            $('#show-list').html(response);
                        }
                    });
                } else {
                    $('#show-list').html('');
                }
            });

            $(document).on('click', '#show-list a', function(e){
                e.preventDefault();
                var tenSP = $(this).text();
                $('#searchsp').val('');
                $('#show-list').html('');

                var exists = false;
                $('#id_table_sanphamcuthe input[name="showtensp[]"]').each(function(){
                    if($(this).val() === tenSP) exists = true;
                });

                if(exists){
                    $('.trangthai').text("Sản phẩm này đã được thêm rồi!");
                    setTimeout(() => $('.trangthai').text(''), 3000);
                } else {
                    $.post("timsp_post_ajax.php", { ten: tenSP }, function(data){
                        $('#id_table_sanphamcuthe tbody').append(data);
                    });
                }
            });

            $(document).on('click', '.delete', function(e) {
                e.preventDefault();
                $(this).closest("tr").remove();
            });

            $('#form-add-promotion').submit(function() {
                var ngaybd = $('#input_ngaybatdaukhuyenmai').val();
                var ngaykt = $('#input_ngayketthuckhuyenmai').val();
                var giatri = $('#input_discountpercentage').val();
                
                if(ngaybd === '' || ngaykt === '' || giatri === '') {
                    alert("Vui lòng điền đầy đủ thông tin thời gian và giá trị!"); 
                    return false;
                }
                
                if(new Date(ngaykt) <= new Date(ngaybd)) {
                    alert("Ngày kết thúc phải sau ngày bắt đầu!"); 
                    return false;
                }

                if ($('#radio_sp_cuthe').is(':checked')) {
                    if ($('#id_table_sanphamcuthe tbody tr').length === 0) {
                        alert("Vui lòng chọn ít nhất 1 sản phẩm để khuyến mãi!"); 
                        return false;
                    }
                }
                
                return true;
            });
        });
    </script>
</body>
</html>