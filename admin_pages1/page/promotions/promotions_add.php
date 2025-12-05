<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Khuyến Mãi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dashboard/admin_dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
    <?php include('../../navigation/menu_navigation.php'); ?>

    <section class="home-section">
        <div class="container-fluid">
            <div class="admin-card">
                <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                    <h2 class="admin-title border-0 mb-0">Thêm Khuyến Mãi Mới</h2>
                    <a href="promotions_management.php" class="btn btn-outline-secondary rounded-pill px-3"><i class='bx bx-arrow-back'></i> Quay lại</a>
                </div>

                <form method="post" id="promoForm" onsubmit="return validateSaleForm()">
                    <div class="row">
                        <div class="col-lg-5 border-end pe-lg-4">
                            <h5 class="fw-bold text-primary mb-3">1. Thông tin chung</h5>
                            <div class="mb-3">
                                <label class="form-label">Ngày bắt đầu</label>
                                <input type="date" class="form-control" id="input_ngaybatdaukhuyenmai" name="input_ngaybatdaukhuyenmai" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ngày kết thúc</label>
                                <input type="date" class="form-control" id="input_ngayketthuckhuyenmai" name="input_ngayketthuckhuyenmai" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Mức giảm giá (%)</label>
                                <input type="number" class="form-control" id="input_discountpercentage" name="input_discountpercentage" min="1" max="100" placeholder="VD: 20" required>
                            </div>
                            <div class="mt-4">
                                <input type="submit" class="btn-admin w-100" name="themkhuyenmai" value="Xác Nhận Thêm">
                            </div>
                        </div>

                        <div class="col-lg-7 ps-lg-4">
                            <h5 class="fw-bold text-primary mb-3">2. Phạm vi áp dụng</h5>
                            
                            <div class="mb-3 p-3 bg-light rounded border">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="scope_type" id="radio_sp" value="sp" checked>
                                    <label class="form-check-label fw-bold" for="radio_sp">Theo sản phẩm cụ thể</label>
                                </div>
                                <div id="scope_sp_content" class="mt-3 ms-4">
                                    <input type="text" class="form-control mb-2" id="searchsp" placeholder="Gõ tên sản phẩm để tìm...">
                                    <div class="list-group mb-2" id="show-list" style="max-height: 200px; overflow-y: auto;"></div>
                                    
                                    <table class="table table-sm table-bordered bg-white" id="id_table_sanphamcuthe">
                                        </table>
                                    <input type="hidden" name="input_radio_sanphamcuthe" value="1"> 
                                </div>
                            </div>

                            <div class="mb-3 p-3 bg-light rounded border">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="scope_type" id="radio_dong" value="dong">
                                    <label class="form-check-label fw-bold" for="radio_dong">Theo dòng sản phẩm (Thương hiệu)</label>
                                </div>
                                <div id="scope_dong_content" class="mt-3 ms-4" style="display:none;">
                                    <select class="form-select" name="select_khuyenmai_dongsanpham" id="select_khuyenmai_dongsanpham">
                                        <option value="Nike">Nike</option>
                                        <option value="Adidas">Adidas</option>
                                        <option value="Bitis">Biti's</option>
                                        <option value="Puma">Puma</option>
                                    </select>
                                    <input type="hidden" name="input_radio_dongsanpham" id="real_radio_dong" disabled> 
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="../../../jq.js"></script>
    <script src="../dashboard/admin_dashboard.js"></script>
    <script>
        $(document).ready(function() {
            // Xử lý chuyển đổi loại khuyến mãi
            $('input[name="scope_type"]').change(function(){
                if($('#radio_sp').is(':checked')) {
                    $('#scope_sp_content').slideDown();
                    $('#scope_dong_content').slideUp();
                    $('input[name="input_radio_sanphamcuthe"]').prop('disabled', false);
                    $('#real_radio_dong').prop('disabled', true);
                } else {
                    $('#scope_sp_content').slideUp();
                    $('#scope_dong_content').slideDown();
                    $('input[name="input_radio_sanphamcuthe"]').prop('disabled', true);
                    $('#real_radio_dong').prop('disabled', false);
                }
            });

            // Tìm kiếm sản phẩm (Giữ logic cũ)
            $('#searchsp').keyup(function(){
                var searchText = $(this).val();
                if(searchText != ''){
                    $.ajax({
                        url: 'action.php', method: 'post', data: {query: searchText},
                        success: function(response){ $('#show-list').html(response); }
                    });
                } else { $('#show-list').html(''); }
            });

            // Chọn sản phẩm từ list gợi ý
            $(document).on('click', '#show-list a', function(e){
                e.preventDefault();
                var tensp = $(this).text();
                $('#searchsp').val('');
                $('#show-list').html('');
                
                // Logic thêm vào bảng (Giữ nguyên logic PHP gọi ajax của bạn)
                $.post("timsp_post_ajax.php", { ten: tensp }, function(data, status) {
                    if (status == "success" && data != "") {
                        $('#id_table_sanphamcuthe').append(data);
                    }
                });
            });

            // Xóa sản phẩm khỏi bảng
            $(document).on('click', '.delete', function() {
                $(this).closest("tr").remove();
            });
        });

        // Validate Form
        function validateSaleForm() {
            var ngaybd = $('#input_ngaybatdaukhuyenmai').val();
            var ngaykt = $('#input_ngayketthuckhuyenmai').val();
            var giatri = $('#input_discountpercentage').val();
            
            if(ngaybd == "" || ngaykt == "" || giatri == "") { alert("Vui lòng nhập đầy đủ thông tin!"); return false; }
            if(new Date(ngaybd) < new Date().setHours(0,0,0,0)) { alert("Ngày bắt đầu phải từ hôm nay!"); return false; }
            if(new Date(ngaykt) <= new Date(ngaybd)) { alert("Ngày kết thúc phải sau ngày bắt đầu!"); return false; }
            
            return true;
        }
    </script>
    
    <?php
    // XỬ LÝ THÊM KHUYẾN MÃI
    if (isset($_POST['themkhuyenmai'])) {
        $ngaybd = $_POST['input_ngaybatdaukhuyenmai'];
        $ngaykt = $_POST['input_ngayketthuckhuyenmai'];
        $giatri = $_POST['input_discountpercentage'];

        // TRƯỜNG HỢP 1: Theo Dòng Sản Phẩm
        if (isset($_POST['input_radio_dongsanpham'])) {
            $dongsp = $_POST['select_khuyenmai_dongsanpham'];
            
            // Tìm tất cả sản phẩm thuộc dòng này
            $sql_find = "SELECT pc.productcolorid 
                         FROM sanpham sp
                         JOIN productcolor pc ON sp.sanphamid = pc.productid
                         JOIN dongsp dsp ON sp.dongspid = dsp.dongspid 
                         WHERE dsp.tendongsp = '$dongsp'";
            $rs_find = $mysqli->query($sql_find);

            if ($rs_find->num_rows > 0) {
                // 1. Tạo khuyến mãi cha
                $sql_insert_km = "INSERT INTO saleoff(ngaybd, ngaykt, giatrigiam, loaisp) VALUES ('$ngaybd','$ngaykt', '$giatri' , '$dongsp')";
                if ($mysqli->query($sql_insert_km)) {
                    $kmid = $mysqli->insert_id; // Lấy ID vừa tạo

                    // 2. Tạo chi tiết khuyến mãi cho từng màu sản phẩm
                    while ($row = $rs_find->fetch_assoc()) {
                        $procolorid = $row['productcolorid'];
                        $mysqli->query("INSERT INTO saleoffct(saleoffid, procolorid) VALUES ('$kmid', '$procolorid')");
                    }
                    echo "<script>alert('Thêm khuyến mãi cho dòng $dongsp thành công!'); window.location.href='promotions_management.php';</script>";
                } else {
                    echo "<script>alert('Lỗi hệ thống: " . $mysqli->error . "');</script>";
                }
            } else {
                echo "<script>alert('Không tìm thấy sản phẩm nào thuộc dòng $dongsp!');</script>";
            }

        // TRƯỜNG HỢP 2: Theo Sản Phẩm Cụ Thể
        } else if (isset($_POST['input_radio_sanphamcuthe'])) {
            if (isset($_POST['showtensp']) && count($_POST['showtensp']) > 0) {
                $list_tensp = $_POST['showtensp'];

                // 1. Tạo khuyến mãi cha (loaisp để trống hoặc NULL)
                $sql_insert_km = "INSERT INTO saleoff(ngaybd, ngaykt, giatrigiam) VALUES ('$ngaybd','$ngaykt', '$giatri')";
                
                if ($mysqli->query($sql_insert_km)) {
                    $kmid = $mysqli->insert_id;

                    // 2. Lặp qua danh sách tên sản phẩm được gửi lên
                    foreach ($list_tensp as $ten) {
                        // Tìm ID sản phẩm dựa trên tên (Lưu ý: nên dùng ID để chính xác hơn, nhưng theo code cũ của bạn đang dùng tên)
                        $sql_find_id = "SELECT pc.productcolorid 
                                        FROM sanpham sp
                                        JOIN productcolor pc ON sp.sanphamid = pc.productid 
                                        WHERE sp.tensp = '$ten'"; // Có thể cần LIMIT 1 nếu 1 tên có nhiều màu và bạn muốn add hết
                        
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
</body>
</html>