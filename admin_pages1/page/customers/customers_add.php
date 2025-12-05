<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Khách Hàng - Admin MTP</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../dashboard/admin_dashboard.css">
</head>

<body>
    <?php include('../../navigation/menu_navigation.php'); ?>

    <section class="home-section">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="admin-card">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2 class="admin-title mb-0 border-0">Thêm Khách Hàng Mới</h2>
                            <a href="customers_management.php" class="text-decoration-none text-secondary">
                                <i class='bx bx-arrow-back'></i> Quay lại
                            </a>
                        </div>

                        <form action="" method="POST" id="form-add-customer">
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label class="form-label">Họ và tên</label>
                                    <input type="text" class="form-control" name="input_tenkhachhang" placeholder="Nhập họ tên đầy đủ">
                                </div>

                                <div class="col-md-6 form-group">
                                    <label class="form-label">Giới tính</label>
                                    <select class="form-select" name="select_gioitinh">
                                        <option value="Nam">Nam</option>
                                        <option value="Nữ">Nữ</option>
                                        <option value="Khác">Khác</option>
                                    </select>
                                </div>

                                <div class="col-md-6 form-group">
                                    <label class="form-label">Số điện thoại</label>
                                    <input type="number" class="form-control" name="input_sdt" placeholder="Nhập số điện thoại">
                                </div>

                                <div class="col-md-12 form-group">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" name="input_email" placeholder="example@email.com">
                                </div>

                                <div class="col-md-12 form-group">
                                    <label class="form-label">Địa chỉ</label>
                                    <input type="text" class="form-control" name="input_diachi" placeholder="Số nhà, đường, phường/xã...">
                                </div>

                                <div class="col-md-6 form-group">
                                    <label class="form-label">Mật khẩu</label>
                                    <input type="password" class="form-control" name="input_matkhau" placeholder="********">
                                </div>

                                <div class="col-md-6 form-group">
                                    <label class="form-label">Xác nhận mật khẩu</label>
                                    <input type="password" class="form-control" name="input_xacnhan_matkhau" placeholder="********">
                                </div>
                            </div>

                            <div class="text-center mt-4">
                                <button type="button" class="btn-admin">
                                    <i class='bx bx-plus-circle'></i> Thêm Khách Hàng
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="../../../jq.js"></script>
    <script src="../dashboard/admin_dashboard.js"></script>
    
    <script>
        const body = document.querySelector('body'),
        sidebar = body.querySelector('nav'),
        toggle = body.querySelector(".toggle-hnm");

        toggle.addEventListener("click", () =>{
            sidebar.classList.toggle("close");
        });
    </script>
</body>
</html>