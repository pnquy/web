<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cổng Thanh Toán Thẻ - MTP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700;800&display=swap');
        
        body { font-family: 'Nunito Sans', sans-serif; background-color: #f8f9fa; }
        
        /* Card Form */
        .card-payment {
            max-width: 500px;
            border-radius: 20px;
            border: none;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }
        
        .form-control {
            border-radius: 10px;
            padding: 12px;
            font-size: 15px;
            background-color: #fcfcfc;
        }
        
        .form-control:focus {
            box-shadow: none;
            border-color: #CF7486;
        }

        /* Nút Thanh toán */
        .btn-pay {
            background-color: #CF7486;
            color: white;
            font-weight: 800;
            padding: 15px;
            border-radius: 50px;
            width: 100%;
            border: none;
            transition: 0.3s;
            text-transform: uppercase;
        }
        
        .btn-pay:hover {
            background-color: #b05f6e;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(207, 116, 134, 0.4);
        }

        /* Popup Overlay */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(5px);
            z-index: 9999;
        }

        .popup-box {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 40px;
            border-radius: 25px;
            text-align: center;
            width: 90%;
            max-width: 400px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.2);
            animation: popUp 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        @keyframes popUp {
            from { transform: translate(-50%, -50%) scale(0.5); opacity: 0; }
            to { transform: translate(-50%, -50%) scale(1); opacity: 1; }
        }

        .check-icon {
            width: 80px;
            height: 80px;
            background: #d4edda;
            color: #28a745;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            margin: 0 auto 20px;
        }

        .btn-home {
            background-color: #333;
            color: white;
            padding: 12px 30px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 700;
            display: inline-block;
            margin-top: 20px;
            transition: 0.3s;
        }
        
        .btn-home:hover {
            background-color: black;
            color: white;
        }
    </style>
</head>
<body>

    <div class="container py-5">
        <a href="javascript:history.back()" class="text-decoration-none text-secondary mb-3 d-inline-block">
            <i class="fa fa-arrow-left me-2"></i>Quay lại
        </a>

        <div class="card card-payment mx-auto">
            <div class="card-header bg-white border-0 pt-4 text-center">
                <h4 class="fw-bold" style="color: #CF7486;">Cổng Thanh Toán Thẻ</h4>
                <p class="text-muted mb-0">Tổng thanh toán</p>
                <h2 class="fw-bold text-dark"><?php echo number_format($_GET['tongtien'], 0, ',', '.'); ?> đ</h2>
            </div>
            
            <div class="card-body p-4 pt-2">
                <div class="text-center mb-4 opacity-50">
                    <i class="fab fa-cc-visa fa-2x me-2"></i>
                    <i class="fab fa-cc-mastercard fa-2x me-2"></i>
                    <i class="fab fa-cc-jcb fa-2x"></i>
                </div>

                <form id="cardForm">
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-secondary">SỐ THẺ</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0"><i class="fa fa-credit-card text-muted"></i></span>
                            <input type="text" class="form-control border-start-0 ps-0" placeholder="0000 0000 0000 0000" id="cardNumber" maxlength="19">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label class="form-label small fw-bold text-secondary">HẾT HẠN</label>
                            <input type="text" class="form-control" placeholder="MM/YY" id="cardExpiry" maxlength="5">
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label small fw-bold text-secondary">CVV</label>
                            <input type="password" class="form-control" placeholder="123" id="cardCvv" maxlength="3">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-secondary">TÊN CHỦ THẺ</label>
                        <input type="text" class="form-control text-uppercase" placeholder="NGUYEN VAN A" id="cardName">
                    </div>
                    
                    <button type="button" class="btn-pay" id="btnPay">
                        THANH TOÁN NGAY
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="overlay" id="successPopup">
        <div class="popup-box">
            <div class="check-icon">
                <i class="fa fa-check"></i>
            </div>
            <h4 class="fw-bold text-dark">Thanh Toán Thành Công!</h4>
            <p class="text-secondary small mt-2">Cảm ơn bạn đã mua sắm tại MTP.<br>Đơn hàng của bạn đang được xử lý.</p>
            <a href="../../index.php" class="btn-home">Về Trang Chủ</a>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Tự động thêm dấu cách cho số thẻ
            $('#cardNumber').on('keyup', function() {
                var val = $(this).val().replace(/\D/g, '').substring(0,16);
                var newVal = val.replace(/(\d{4})(?=\d)/g, "$1 ");
                $(this).val(newVal);
            });

            // Tự động thêm dấu / cho ngày hết hạn
            $('#cardExpiry').on('keyup', function() {
                var val = $(this).val().replace(/\D/g, '').substring(0,4);
                if(val.length > 2) {
                    $(this).val(val.substring(0,2) + '/' + val.substring(2));
                } else {
                    $(this).val(val);
                }
            });

            // Xử lý nút Thanh toán
            $('#btnPay').click(function() {
                // Validate cơ bản
                if($('#cardNumber').val().length < 16 || $('#cardExpiry').val() == '' || $('#cardCvv').val() == '' || $('#cardName').val() == '') {
                    alert('Vui lòng nhập đầy đủ thông tin thẻ!');
                    return;
                }

                // Hiệu ứng Loading
                var btn = $(this);
                btn.html('<i class="fa fa-spinner fa-spin me-2"></i> ĐANG XỬ LÝ...').prop('disabled', true).css('opacity', '0.8');

                // Giả lập delay 2 giây xử lý thanh toán
                setTimeout(function() {
                    // Hiện Popup
                    $('#successPopup').fadeIn();
                }, 2000);
            });
        });
    </script>

</body>
</html>