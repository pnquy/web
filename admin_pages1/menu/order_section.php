<?php
$mysqli = new mysqli("localhost", "root", "", "dbdoan");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <main id="main" class="main">
    <?php
    $sql_lietke_danhmuc_dh = "SELECT thanhtoanid,khachhangid,DATE_FORMAT(ngayorder, '%d/%m/%Y') AS ngayorder,hinhthucthanhtoan,magiamgiaid,tongtien,trangthai
                        FROM thanhtoan tt";
    $query_lietke_danhmuc_dh = $mysqli->query($sql_lietke_danhmuc_dh);
    ?>
    <div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Datatables</h5>
              <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable. Check for <a href="https://fiduswriter.github.io/simple-datatables/demos/" target="_blank">more examples</a>.</p>

              <!-- Table with stripped rows -->
              <table class="table datatable">
              <thead>
                    <th>ID đơn hàng</th>
                    <th>ID khách hàng</th>
                    <th>Ngày đặt hàng</th>
                    <th>Hình thức thanh toán</th>
                    <th>ID mã giảm giá</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Chi tiết</th>
                </thead>
                <?php
                while ($row = mysqli_fetch_array($query_lietke_danhmuc_dh)) {
                    $trangthai = $row['trangthai'];
                    $trangthaiStyle = 'background-color: white';

                    if ($trangthai == "Đã xác nhận") {
                        $trangthaiStyle = "background-color: white";
                    } else if ($trangthai == "Chờ xác nhận") {
                        $trangthaiStyle = "background-color: #CCEABB";
                    }
                ?>
                    <tbody id="myTable">
                        <tr style="<?php echo $trangthaiStyle; ?>">
                            <td id="id_order_list_idorder" name="id_order_list_idorder"> <?php echo $row['thanhtoanid']; ?> </td>
                            <td id="id_order_list_idcustomer" name="id_order_list_idcustomer"> <?php echo $row['khachhangid']; ?> </td>
                            <td id="id_order_list_orderdate" name="id_order_list_orderdate"> <?php echo $row['ngayorder']; ?> </td>
                            <td id="id_order_list_purchasetype" name="id_order_list_purchasetype"> <?php echo $row['hinhthucthanhtoan']; ?> </td>
                            <td id="id_order_list_idpromotion" name="id_order_list_idpromotion"> <?php echo $row['magiamgiaid']; ?> </td>
                            <td id="id_order_list_tongtien" name="id_order_list_tongtien"> <?php echo $row['tongtien']; ?>₫</td>
                            <td id="id_order_list_trangthai" name="id_order_list_trangthai"> <?php echo $row['trangthai']; ?></td>
                            <td><a href="order_detail.php?thanhtoanid=<?php echo $row['thanhtoanid']; ?>"><i class='bx bx-receipt'></i></a></td>
                        </tr>
                    <?php
                }
                    ?>
                    </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>