<div class="admin-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="admin-title border-0 mb-0">Danh Sách Sản Phẩm</h2>
        <a href="products_management.php?action=products_management&query=products_add" class="btn-admin text-decoration-none">
            <i class='bx bx-plus-circle'></i> Thêm Sản Phẩm
        </a>
    </div>

    <div class="row mb-4">
        <div class="col-md-4 ms-auto">
            <div class="input-group">
                <input type="text" class="form-control rounded-start-pill" id="tableSearch" placeholder="Tìm kiếm sản phẩm...">
                <button class="btn btn-outline-secondary rounded-end-pill" type="button">
                    <i class='bx bx-search'></i>
                </button>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-admin align-middle">
            <thead>
                <tr>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col" style="width: 100px;">Hình ảnh</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Danh mục</th>
                    <th scope="col" class="text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody id="myTable">
                <?php
                // Kết nối CSDL
                $mysqli = new mysqli("localhost", "root", "", "dbdoan");
                
                // Query lấy dữ liệu (Bao gồm cả colorid để phục vụ việc xóa)
                $sql_lietke_danhmuc_sp = "
                            SELECT *
                            FROM (
                                SELECT sp.sanphamid, sp.tensp, sp.giasp, sp.danhmuc, sp.thongtinsp, dsp.tendongsp, st.stylename, pc.img1, cl.colorname, cl.colorid
                                FROM sanpham sp
                                JOIN productcolor pc ON pc.productid = sp.sanphamid
                                JOIN dongsp dsp ON dsp.dongspid = sp.dongspid
                                JOIN style st ON st.styleid = sp.styleid
                                JOIN color cl ON cl.colorid = pc.colorid
                                ORDER BY sp.sanphamid ASC
                            ) AS result
                            ORDER BY result.sanphamid DESC"; 
                
                $query_pro = mysqli_query($mysqli, $sql_lietke_danhmuc_sp);
                
                $i = 1;
                if($query_pro && mysqli_num_rows($query_pro) > 0){
                    while($row = mysqli_fetch_array($query_pro)){
                ?>
                <tr>
                    <td class="text-center">#<?php echo $i; ?></td>
                    <td>
                        <img src="../../../uploads/<?php echo $row['img1']; ?>" class="rounded shadow-sm" style="width: 80px; height: 60px; object-fit: cover;">
                    </td>
                    <td>
                        <div class="fw-bold"><?php echo $row['tensp']; ?></div>
                        <small class="text-muted">Màu: <?php echo $row['colorname']; ?></small>
                    </td>
                    <td class="text-danger fw-bold"><?php echo number_format($row['giasp'], 0, ',', '.'); ?> ₫</td>
                    <td>
                        <span class="badge bg-light text-dark border"><?php echo $row['danhmuc']; ?></span>
                        <span class="badge bg-info text-dark border"><?php echo $row['tendongsp']; ?></span>
                    </td>
                    <td class="text-center">
                        <a href="products_management.php?action=products_management&query=products_edit&sanphamid=<?php echo $row['sanphamid']; ?>&colorid=<?php echo $row['colorid']; ?>" 
                           class="btn btn-sm btn-outline-primary rounded-circle me-2" title="Sửa">
                            <i class='bx bx-edit-alt'></i>
                        </a>
                        
                        <a href="javascript:void(0);" 
                           onclick="deleteProduct('<?php echo $row['sanphamid']; ?>', '<?php echo $row['colorid']; ?>')"
                           class="btn btn-sm btn-outline-danger rounded-circle" 
                           title="Xóa">
                            <i class='bx bx-trash'></i>
                        </a>
                    </td>
                </tr>
                <?php 
                    $i++;
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center py-4 text-muted'>Chưa có sản phẩm nào.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    // 1. Script tìm kiếm nhanh trên bảng
    $(function() {
        $("#tableSearch").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

    // 2. Script Xóa Sản Phẩm (Gọi Ajax)
    function deleteProduct(sanphamid, colorid) {
        if (confirm("Bạn có chắc chắn muốn xóa sản phẩm (màu này) không?")) {
            $.ajax({
                method: 'POST',
                // Lưu ý: Đảm bảo file AjaxDel.php nằm cùng thư mục với file cha (products_management.php)
                // Hoặc điều chỉnh đường dẫn này cho đúng vị trí file AjaxDel.php
                url: 'AjaxDel.php', 
                data: {
                    sanphamid: sanphamid,
                    colorid: colorid
                },
                success: function(data) {
                    alert("Đã xóa thành công!");
                    location.reload(); // Tải lại trang để cập nhật danh sách
                },
                error: function() {
                    alert("Lỗi! Không thể xóa sản phẩm. Vui lòng kiểm tra lại.");
                }
            });
        }
    }
</script>