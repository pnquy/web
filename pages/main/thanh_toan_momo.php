<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thanh Toán MoMo - MTP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5 text-center">
        <div class="card mx-auto shadow-sm" style="max-width: 400px; border-radius: 20px;">
            <div class="card-body p-4">
                <img src="https://upload.wikimedia.org/wikipedia/vi/f/fe/MoMo_Logo.png" alt="MoMo" style="width: 60px;">
                <h4 class="mt-3 fw-bold" style="color: #A50064;">Thanh toán qua MoMo</h4>
                <p>Tổng tiền: <strong class="fs-4"><?php echo number_format($_GET['tongtien'], 0, ',', '.'); ?> đ</strong></p>
                
                <div class="border p-3 rounded mb-3 bg-white">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=ThanhToanDonHangMTP" alt="QR Code" class="img-fluid">
                </div>
                
                <p class="small text-muted">Quét mã QR bằng ứng dụng MoMo để thanh toán</p>
                
                <a href="../../index.php" class="btn btn-primary w-100 rounded-pill" style="background-color: #A50064; border:none;">ĐÃ THANH TOÁN XONG</a>
            </div>
        </div>
    </div>
</body>
</html>