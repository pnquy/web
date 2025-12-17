<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Khuyến Mãi - Admin MTP</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../dashboard/admin_dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <style>
        
        .search-box-container {
            position: relative;
        }
        #show-list {
            position: absolute;
            z-index: 999;
            width: 100%;
            background: white;
            box-shadow: 0 5px 10px rgba(0,0,0,0.1);
            max-height: 200px;
            overflow-y: auto;
        }
        #id_table_sua_sanphamcuthe img {
            width: 50px; height: 50px; object-fit: cover; border-radius: 5px;
        }
        .delete {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <?php
    include('../../navigation/menu_navigation.php');
    include('../../../config/config.php');

    if (isset($_POST['suakhuyenmai'])) {
        $ngaybd = $_POST['input_sua_ngaybatdaukhuyenmai'];
        $ngaykt = $_POST['input_sua_ngayketthuckhuyenmai'];
        $giatri = $_POST['input_sua_discountpercentage'];
        $saleoffid = $_GET['edit'];

        $mysqli->query("DELETE FROM saleoffct WHERE saleoffid = '$saleoffid'");

        if (isset($_POST['input_radio_sua_dongsanpham'])) {
            $dongsp = $_POST['select_sua_khuyenmai_dongsanpham'];
            $sql_update = "UPDATE saleoff SET ngaybd ='$ngaybd', ngaykt ='$ngaykt', giatrigiam ='$giatri', loaisp ='$dongsp' WHERE saleoffid = '$saleoffid'";
            $mysqli->query($sql_update);

            $sql_find = "SELECT productcolorid FROM sanpham sp 
                         JOIN productcolor pc ON sp.sanphamid = pc.productid 
                         JOIN dongsp dsp ON sp.dongspid = dsp.dongspid 
                         WHERE dsp.tendongsp = '$dongsp'";
            $rs_find = $mysqli->query($sql_find);
            
            if ($rs_find->num_rows > 0) {
                while ($row = $rs_find->fetch_row()) {
                    $mysqli->query("INSERT INTO saleoffct(saleoffid, procolorid) VALUES ('$saleoffid','$row[0]')");
                }
                echo "<script>alert('Cập nhật khuyến mãi thành công!'); window.location.href='promotions_management.php';</script>";
            } else {
                echo "<script>alert('Dòng sản phẩm này chưa có sản phẩm nào!');</script>";
            }

        } else {
            $list_sp = isset($_POST['showtensp']) ? $_POST['showtensp'] : [];
            
            if (count($list_sp) > 0) {
                $sql_update = "UPDATE saleoff SET ngaybd ='$ngaybd', ngaykt ='$ngaykt', giatrigiam ='$giatri', loaisp = NULL WHERE saleoffid = '$saleoffid'";
                $mysqli->query($sql_update);

                foreach ($list_sp as $ten) {
                    $sql_find = "SELECT productcolorid FROM sanpham sp 
                                 JOIN productcolor pc ON sp.sanphamid = pc.productid 
                                 WHERE sp.tensp = '$ten'";
                    $rs_find = $mysqli->query($sql_find);
                    while ($row = $rs_find->fetch_row()) {
                        $mysqli->query("INSERT INTO saleoffct(saleoffid, procolorid) VALUES ('$saleoffid','$row[0]')");
                    }
                }
                echo "<script>alert('Cập nhật khuyến mãi thành công!'); window.location.href='promotions_management.php';</script>";
            } else {
                echo "<script>alert('Vui lòng chọn ít nhất 1 sản phẩm!');</script>";
            }
        }
    }

    $editval = $_GET["edit"];
    $sql_old = "SELECT * FROM saleoff WHERE saleoffid = '$editval'";
    $rs_old = $mysqli->query($sql_old);
    $row = $rs_old->fetch_assoc();
    
    $ngayBD = date("Y-m-d", strtotime($row['ngaybd']));
    $ngayKT = date("Y-m-d", strtotime($row['ngaykt']));
    $loaisp = $row['loaisp'];
    ?>

    <section class="home-section">
        <div class="container-fluid">
            <div class="admin-card">
                <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                    <h2 class="admin-title border-0 mb-0">Sửa Khuyến Mãi #<?php echo $editval; ?></h2>
                    <a href="promotions_management.php" class="btn btn-outline-secondary rounded-pill px-3">
                        <i class='bx bx-arrow-back'></i> Quay lại
                    </a>
                </div>

                <form action="" method="post" id="form-edit-promotion">
                    <div class="row">
                        <div class="col-lg-5 border-end pe-lg-4">
                            <h5 class="fw-bold text-primary mb-3"><i class='bx bx-time-five'></i> Thời Gian & Giá Trị</h5>
                            
                            <div class="mb-3">
                                <label class="form-label">Ngày bắt đầu</label>
                                <input type="date" class="form-control" name="input_sua_ngaybatdaukhuyenmai" id="input_sua_ngaybatdaukhuyenmai" value="<?php echo $ngayBD; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Ngày kết thúc</label>
                                <input type="date" class="form-control" name="input_sua_ngayketthuckhuyenmai" id="input_sua_ngayketthuckhuyenmai" value="<?php echo $ngayKT; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Phần trăm giảm (%)</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="input_sua_discountpercentage" id="input_sua_discountpercentage" min="1" max="100" value="<?php echo $row['giatrigiam']; ?>" required>
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7 ps-lg-4">
                            <h5 class="fw-bold text-primary mb-3"><i class='bx bx-target-lock'></i> Phạm Vi Áp Dụng</h5>

                            <div class="d-flex gap-4 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sua_scope" id="radio_sp_cuthe" 
                                           <?php echo ($loaisp == "") ? 'checked' : ''; ?>>
                                    <label class="form-check-label fw-bold" for="radio_sp_cuthe">Sản phẩm cụ thể</label>
                                    <input type="hidden" name="input_radio_sua_sanphamcuthe" id="hidden_radio_sp" <?php echo ($loaisp == "") ? '' : 'disabled'; ?>>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sua_scope" id="radio_dong_sp"
                                           <?php echo ($loaisp != "") ? 'checked' : ''; ?>>
                                    <label class="form-check-label fw-bold" for="radio_dong_sp">Dòng sản phẩm</label>
                                    <input type="hidden" name="input_radio_sua_dongsanpham" id="hidden_radio_dong" <?php echo ($loaisp != "") ? '' : 'disabled'; ?>>
                                </div>
                            </div>

                            <div id="box_dong_sp" style="display: <?php echo ($loaisp != "") ? 'block' : 'none'; ?>;">
                                <label class="form-label">Chọn dòng sản phẩm:</label>
                                <select class="form-select" name="select_sua_khuyenmai_dongsanpham">
                                    <option value="Nike" <?php echo ($loaisp == "Nike") ? 'selected' : ''; ?>>Nike</option>
                                    <option value="Adidas" <?php echo ($loaisp == "Adidas") ? 'selected' : ''; ?>>Adidas</option>
                                    <option value="Bitis" <?php echo ($loaisp == "Bitis") ? 'selected' : ''; ?>>Biti's</option>
                                    <option value="Puma" <?php echo ($loaisp == "Puma") ? 'selected' : ''; ?>>Puma</option>
                                </select>
                            </div>

                            <div id="box_sp_cuthe" style="display: <?php echo ($loaisp == "") ? 'block' : 'none'; ?>;">
                                <div class="search-box-container mb-3">
                                    <input type="text" class="form-control searchsp" id="searchsp" placeholder="Gõ tên sản phẩm để tìm...">
                                    <div class="list-group" id="show-list"></div>
                                </div>
                                
                                <div class="trangthai text-danger small mb-2"></div>

                                <div class="table-responsive border rounded">
                                    <table class="table table-hover mb-0" id="id_table_sua_sanphamcuthe">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Tên sản phẩm</th>
                                                <th>Hình ảnh</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($loaisp == "") {
                                                $sql_detail = "SELECT DISTINCT sp.tensp, pc.img1 
                                                               FROM saleoffct sct
                                                               JOIN productcolor pc ON sct.procolorid = pc.productcolorid
                                                               JOIN sanpham sp ON pc.productid = sp.sanphamid
                                                               WHERE sct.saleoffid = '$editval'";
                                                $rs_detail = $mysqli->query($sql_detail);
                                                
                                                while ($row_d = $rs_detail->fetch_assoc()) {
                                            ?>
                                                <tr>
                                                    <td>
                                                        <input type="hidden" name="showtensp[]" value="<?php echo $row_d['tensp']; ?>">
                                                        <?php echo $row_d['tensp']; ?>
                                                    </td>
                                                    <td>
                                                        <img src="../../../uploads/<?php echo $row_d['img1']; ?>">
                                                    </td>
                                                    <td><button type="button" class="delete"><i class='bx bx-trash'></i></button></td>
                                                </tr>
                                            <?php 
                                                } 
                                            } 
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">
                    
                    <div class="text-center">
                        <button type="submit" name="suakhuyenmai" class="btn-admin btn-lg px-5">
                            <i class='bx bx-save'></i> LƯU THAY ĐỔI
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
        const body = document.querySelector('body'),
        sidebar = body.querySelector('nav'),
        toggle = body.querySelector(".toggle-hnm");
        if(toggle){
            toggle.addEventListener("click", () =>{ sidebar.classList.toggle("close"); });
        }

        $(document).ready(function() {
            $('input[name="sua_scope"]').change(function() {
                if ($('#radio_sp_cuthe').is(':checked')) {
                    $('#box_sp_cuthe').show();
                    $('#box_dong_sp').hide();
                    $('#hidden_radio_sp').prop('disabled', false);
                    $('#hidden_radio_dong').prop('disabled', true);
                } else {
                    $('#box_sp_cuthe').hide();
                    $('#box_dong_sp').show();
                    $('#hidden_radio_sp').prop('disabled', true);
                    $('#hidden_radio_dong').prop('disabled', false);
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
                $('#id_table_sua_sanphamcuthe input[name="showtensp[]"]').each(function(){
                    if($(this).val() === tenSP) exists = true;
                });

                if(exists){
                    $('.trangthai').text("Sản phẩm này đã được thêm rồi!");
                    setTimeout(() => $('.trangthai').text(''), 3000);
                } else {
                    $.post("timsp_post_ajax.php", { ten: tenSP }, function(data){
                        $('#id_table_sua_sanphamcuthe tbody').append(data);
                    });
                }
            });

            $(document).on('click', '.delete', function() {
                $(this).closest("tr").remove();
            });

            $('form').submit(function() {
                var ngaybd = $('#input_sua_ngaybatdaukhuyenmai').val();
                var ngaykt = $('#input_sua_ngayketthuckhuyenmai').val();
                
                if(ngaybd > ngaykt) {
                    alert("Ngày kết thúc phải sau ngày bắt đầu!");
                    return false;
                }
                return true;
            });
        });
    </script>
</body>
</html>