<div class="admin-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="admin-title border-0 mb-0">Danh Sách Khuyến Mãi</h2>
        <a href="promotions_add.php" class="btn-admin text-decoration-none">
            <i class='bx bx-plus-circle'></i> Thêm Khuyến Mãi
        </a>
    </div>

    <div class="row mb-4">
        <div class="col-md-4 ms-auto">
            <div class="input-group">
                <input type="text" class="form-control rounded-start-pill" id="tableSearch" placeholder="Tìm kiếm...">
                <button class="btn btn-outline-secondary rounded-end-pill" type="button"><i class='bx bx-search'></i></button>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-admin align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ngày bắt đầu</th>
                    <th>Ngày kết thúc</th>
                    <th class="text-center">% Giảm</th>
                    <th class="text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody id="myTable">
                <?php
                $sql = "SELECT DISTINCT saleoffid, ngaybd, ngaykt, giatrigiam FROM saleoff ORDER BY saleoffid DESC";
                $rs = $mysqli->query($sql);
                if ($rs && $rs->num_rows > 0) {
                    while ($row = $rs->fetch_row()) {
                ?>
                <tr>
                    <td><span class="fw-bold text-primary">KM<?php echo $row[0] ?></span></td>
                    <td><?php echo date("d/m/Y", strtotime($row[1])); ?></td>
                    <td><?php echo date("d/m/Y", strtotime($row[2])); ?></td>
                    <td class="text-center"><span class="badge bg-danger rounded-pill"><?php echo $row[3] ?>%</span></td>
                    <td class="text-center">
                        <a href="promotions_edit.php?edit=<?php echo $row[0] ?>" class="btn btn-sm btn-outline-primary rounded-circle me-2"><i class='bx bx-edit-alt'></i></a>
                        <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger rounded-circle deleteKM" makm="<?php echo $row[0] ?>"><i class='bx bx-trash'></i></a>
                    </td>
                </tr>
                <?php } } else { echo "<tr><td colspan='5' class='text-center py-4 text-muted'>Chưa có khuyến mãi nào.</td></tr>"; } ?>
            </tbody>
        </table>
    </div>
</div>

<script>
$(document).ready(function() {
    $("#tableSearch").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    $('.deleteKM').click(function() {
        if(confirm('Bạn có chắc muốn xóa khuyến mãi này?')){
            var maKM = $(this).attr('maKM');
            var tr = $(this).closest('tr');
            $.post("xoaKM_ajax.php", { maKM: maKM }, function(data) {
                tr.remove();
            });
        }
    });
});
</script>