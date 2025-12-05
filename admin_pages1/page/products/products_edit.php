<?php
// Giữ nguyên phần kết nối và lấy dữ liệu
$mysqli = new mysqli("localhost", "root", "", "dbdoan");
$sanphamid = $_GET['sanphamid'];
$colorid = $_GET['colorid'];

$sql_lietke = "SELECT * FROM sanpham sp
                JOIN productcolor pc ON pc.productid = sp.sanphamid
                JOIN dongsp dsp ON dsp.dongspid = sp.dongspid
                JOIN style st ON st.styleid = sp.styleid
                JOIN color cl ON cl.colorid = pc.colorid
                WHERE sp.sanphamid = '$sanphamid' AND cl.colorid = '$colorid'";
$query_lietke = $mysqli->query($sql_lietke);
$row = $query_lietke->fetch_assoc();

// Lấy số lượng size
$sql_size = "SELECT size, sl FROM procolorsize WHERE procolorid = (SELECT productcolorid FROM productcolor WHERE productid='$sanphamid' AND colorid='$colorid')";
$query_size = $mysqli->query($sql_size);
$quantity = array_fill_keys(range(36, 44), 0);
while ($row_size = $query_size->fetch_assoc()) {
    $quantity[$row_size['size']] = $row_size['sl'];
}
?>

<div class="admin-card">
    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
        <h2 class="admin-title border-0 mb-0">Sửa Sản Phẩm: #<?php echo $sanphamid; ?></h2>
        <a href="products_management.php" class="btn btn-outline-secondary rounded-pill px-3">
            <i class='bx bx-arrow-back'></i> Quay lại
        </a>
    </div>

    <form method="post" action="xuly.php?sanphamid=<?php echo $sanphamid; ?>&colorid=<?php echo $colorid; ?>" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-7 border-end pe-4">
                <h5 class="fw-bold text-primary mb-3">Thông Tin Chung</h5>
                
                <div class="mb-3">
                    <label class="form-label">Tên sản phẩm</label>
                    <input type="text" class="form-control" name="input_sua_tensanpham" value="<?php echo $row['tensp']; ?>">
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Giá sản phẩm</label>
                    <input type="text" class="form-control" name="input_sua_giasanpham" value="<?php echo $row['giasp']; ?>">
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Giới tính</label>
                        <select class="form-select" name="select_sua_danhmucsanpham">
                            <option value="Nam" <?php if($row['danhmuc']=='Nam') echo 'selected'; ?>>Nam</option>
                            <option value="Nữ" <?php if($row['danhmuc']=='Nữ') echo 'selected'; ?>>Nữ</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Thương hiệu</label>
                        <select class="form-select" name="select_sua_dongsanpham">
                            <option value="Nike" <?php if($row['tendongsp']=='Nike') echo 'selected'; ?>>Nike</option>
                            <option value="Adidas" <?php if($row['tendongsp']=='Adidas') echo 'selected'; ?>>Adidas</option>
                            <option value="Bitis" <?php if($row['tendongsp']=='Bitis') echo 'selected'; ?>>Biti's</option>
                            <option value="Puma" <?php if($row['tendongsp']=='Puma') echo 'selected'; ?>>Puma</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Loại giày</label>
                        <select class="form-select" name="select_sua_kieudang">
                            <option value="Low Top" <?php if($row['stylename']=='Low Top') echo 'selected'; ?>>Low Top</option>
                            <option value="High Top" <?php if($row['stylename']=='High Top') echo 'selected'; ?>>High Top</option>
                            <option value="Running" <?php if($row['stylename']=='Running') echo 'selected'; ?>>Running</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Mô tả sản phẩm</label>
                    <textarea class="form-control" name="textarea_sua_thongtinsanpham" rows="5"><?php echo $row['thongtinsp']; ?></textarea>
                </div>
            </div>

            <div class="col-lg-5 ps-4">
                <h5 class="fw-bold text-primary mb-3">Kho & Hình Ảnh (Màu: <?php echo $row['colorname']; ?>)</h5>
                
                <label class="form-label">Số lượng theo Size</label>
                <div class="row g-2 mb-4">
                    <?php for($i=36; $i<=44; $i++): ?>
                    <div class="col-4">
                        <div class="input-group input-group-sm">
                            <span class="input-group-text bg-light">Size <?php echo $i; ?></span>
                            <input type="number" class="form-control text-center" name="input_sua_size<?php echo $i; ?>" value="<?php echo $quantity[$i]; ?>">
                        </div>
                    </div>
                    <?php endfor; ?>
                </div>

                <label class="form-label">Cập nhật hình ảnh</label>
                <div class="row g-2">
                    <?php for($j=1; $j<=4; $j++): 
                        $imgKey = 'img'.$j;
                        $inputKey = 'input_sua_upload_anh_'.$j;
                    ?>
                    <div class="col-6 mb-3 text-center">
                        <div class="border rounded p-2 bg-light">
                            <img src="../../../uploads/<?php echo $row[$imgKey]; ?>" class="img-fluid mb-2" style="height: 100px; object-fit: contain;">
                            <input type="file" class="form-control form-control-sm" name="<?php echo $inputKey; ?>">
                        </div>
                    </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>

        <hr class="my-4">
        
        <div class="text-center">
            <button type="submit" name="suasanpham" class="btn-admin btn-lg px-5">
                <i class='bx bx-save'></i> CẬP NHẬT SẢN PHẨM
            </button>
        </div>
    </form>
</div>