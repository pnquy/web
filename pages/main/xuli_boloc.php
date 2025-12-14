<?php
include('../../config/config.php');

// 1. Kiểm tra kết nối
if (!isset($connect)) {
    $connect = new mysqli("localhost", "root", "", "dbdoan");
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }
    $connect->set_charset("utf8");
}

if (isset($_POST["action"])) {
    
    // --- PHẦN 1: CHUẨN BỊ DỮ LIỆU KHUYẾN MÃI (Load trước để tối ưu) ---
    date_default_timezone_set('Asia/Jakarta');
    $datenow = date("Y-m-d"); // Lấy ngày hiện tại
    
    // Mảng lưu % giảm giá: Key = saleoffid, Value = % giảm
    $sale_percentages = array();
    
    // Lấy các đợt khuyến mãi ĐANG diễn ra (Ngày BD <= Hôm nay <= Ngày KT)
    $sql_sale = "SELECT saleoffid, giatrigiam FROM saleoff WHERE '$datenow' BETWEEN ngaybd AND ngaykt";
    $rs_sale = $connect->query($sql_sale);
    
    if ($rs_sale && $rs_sale->num_rows > 0) {
        while ($row_sale = $rs_sale->fetch_assoc()) {
            $sale_percentages[$row_sale['saleoffid']] = $row_sale['giatrigiam'];
        }
    }

    // Mảng map Sản phẩm -> Sale ID: Key = productcolorid, Value = saleoffid
    $product_sale_map = array();
    
    if (!empty($sale_percentages)) {
        // Lấy danh sách ID các đợt sale đang active
        $active_sale_ids = implode(",", array_keys($sale_percentages));
        
        // Lấy chi tiết khuyến mãi
        $sql_sale_ct = "SELECT procolorid, saleoffid FROM saleoffct WHERE saleoffid IN ($active_sale_ids)";
        $rs_sale_ct = $connect->query($sql_sale_ct);
        
        if ($rs_sale_ct && $rs_sale_ct->num_rows > 0) {
            while ($row_ct = $rs_sale_ct->fetch_assoc()) {
                $product_sale_map[$row_ct['procolorid']] = $row_ct['saleoffid'];
            }
        }
    }
    // -----------------------------------------------------------


    // --- PHẦN 2: XÂY DỰNG QUERY TÌM KIẾM SẢN PHẨM ---
    $query = "
        SELECT sp.sanphamid, sp.tensp, sp.giasp, pc.img1, pc.img2, pc.productcolorid, dsp.tendongsp
        FROM sanpham sp
        JOIN productcolor pc ON sp.sanphamid = pc.productid
        JOIN dongsp dsp ON sp.dongspid = dsp.dongspid
        WHERE 1=1 
    "; 

    // Lọc theo Thương hiệu
    if (isset($_POST["brand"])) {
        $brand_filter = implode("','", $_POST["brand"]);
        $query .= " AND sp.dongspid IN ('" . $brand_filter . "')";
    }

    // Lọc theo Loại giày
    if (isset($_POST["style"])) {
        $style_filter = implode("','", $_POST["style"]);
        $query .= " AND sp.styleid IN ('" . $style_filter . "')";
    }

    // Lọc theo Giới tính
    if (isset($_POST["gender"])) {
        $gender_filter = implode("','", $_POST["gender"]);
        $query .= " AND sp.danhmuc IN ('" . $gender_filter . "')";
    }

    // Lọc theo Giá (Lưu ý: Giá này là giá gốc trong DB, chưa tính giảm giá)
    if (isset($_POST["price"])) {
        $price_conditions = array();
        foreach ($_POST["price"] as $range) {
            $price_arr = explode("-", $range);
            $min = $price_arr[0];
            $max = $price_arr[1];
            $price_conditions[] = "(sp.giasp BETWEEN $min AND $max)";
        }
        $query .= " AND (" . implode(" OR ", $price_conditions) . ")";
    }

    $query .= " GROUP BY sp.sanphamid ORDER BY sp.sanphamid DESC";

    // --- PHẦN 3: THỰC THI VÀ HIỂN THỊ ---
    $result = $connect->query($query);
    $output = '';
    $count_products = 0; // Đếm số sản phẩm hiển thị

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            
            // --- TÍNH TOÁN GIÁ ---
            $giasp_goc = $row['giasp'];
            $giasp_hienthi = $giasp_goc;
            $has_sale = false;
            $percent = 0;

            // Kiểm tra sản phẩm này có nằm trong danh sách khuyến mãi active không
            // Lưu ý: $product_sale_map key là productcolorid
            if (array_key_exists($row['productcolorid'], $product_sale_map)) {
                $sale_id = $product_sale_map[$row['productcolorid']];
                $percent = $sale_percentages[$sale_id]; // Lấy % giảm
                
                // Tính giá sau giảm
                $giasp_hienthi = $giasp_goc - ($giasp_goc * $percent / 100);
                $has_sale = true;
            }

            // --- LỌC: NẾU ĐANG CHỌN XEM SALE OFF MÀ SP KHÔNG SALE THÌ BỎ QUA ---
            if (isset($_POST['is_sale']) && $_POST['is_sale'] == 1) {
                if (!$has_sale) {
                    continue; // Bỏ qua vòng lặp này
                }
            }

            $count_products++;

            // --- TẠO HTML GIÁ ---
            $price_html = '';
            if ($has_sale) {
                // Hiển thị: Giá mới (Đỏ/Hồng) + Giá cũ (Gạch ngang) + Badge Sale
                $price_html = '
                    <div class="d-flex align-items-center flex-wrap">
                        <span class="price-new fw-bold me-2" style="color: #CF7486; font-size: 1.1rem;">' . number_format($giasp_hienthi, 0, ',', '.') . 'đ</span>
                        <span class="price-old text-muted text-decoration-line-through small">' . number_format($giasp_goc, 0, ',', '.') . 'đ</span>
                        <span class="badge bg-danger ms-auto">-' . $percent . '%</span>
                    </div>';
            } else {
                // Hiển thị giá thường
                $price_html = '
                    <div class="d-flex align-items-center">
                        <span class="price-new fw-bold" style="color: #333;">' . number_format($giasp_goc, 0, ',', '.') . ' VNĐ</span>
                    </div>';
            }

            // --- TẠO HTML SẢN PHẨM ---
            $output .= '
            <div class="col-lg-4 col-md-6 col-6 mb-4">
                <div class="product-card h-100 shadow-sm border-0 rounded overflow-hidden bg-white">
                    <div class="item-img position-relative">
                        <a href="index.php?quanly=chitietsanpham&id=' . $row['productcolorid'] . '">
                            <img src="uploads/' . $row['img1'] . '" class="img-fluid" alt="' . $row['tensp'] . '">
                            <img src="uploads/' . $row['img2'] . '" class="img-fluid hover-img position-absolute top-0 start-0 w-100 h-100" style="opacity:0; transition:0.3s;" alt="' . $row['tensp'] . '">
                        </a>
                        <div class="position-absolute bottom-0 start-0 w-100 p-2 text-center add-to-cart-container" style="transform: translateY(100%); transition: 0.3s;">
                            <a href="index.php?quanly=chitietsanpham&id=' . $row['productcolorid'] . '" class="btn btn-dark btn-sm rounded-pill px-4">Xem chi tiết</a>
                        </div>
                    </div>
                    
                    <div class="item-info p-3">
                        <div class="text-uppercase small text-muted mb-1">' . $row['tendongsp'] . '</div>
                        <a href="index.php?quanly=chitietsanpham&id=' . $row['productcolorid'] . '" class="product-name text-decoration-none text-dark fw-bold d-block mb-2 text-truncate">
                            ' . $row['tensp'] . '
                        </a>
                        ' . $price_html . '
                    </div>
                </div>
            </div>
            ';
        }
    } 
    
    // Nếu không có sản phẩm nào (hoặc đã bị lọc hết bởi logic sale)
    if ($count_products == 0) {
        $output = '<div class="col-12 text-center py-5">
                    <div class="mb-3"><i class="fa fa-box-open fa-3x text-muted"></i></div>
                    <h5 class="text-muted">Không tìm thấy sản phẩm nào phù hợp.</h5>
                   </div>';
    }

    echo $output;
}
?>