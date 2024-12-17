<?php
$mysqli = new mysqli("localhost", "root", "", "dbdoan");
// LOAD CSDL (LIỆT KÊ SẢN PHẨM)
$sql_lietke_danhmuc_sp = "
                            SELECT *
                            FROM (
                                SELECT sp.sanphamid, sp.tensp, sp.giasp, sp.danhmuc, sp.thongtinsp, dsp.tendongsp, st.stylename,pc.img1,cl.colorname,cl.colorid
                                FROM sanpham sp
                                JOIN productcolor pc ON pc.productid = sp.sanphamid
                                JOIN dongsp dsp ON dsp.dongspid = sp.dongspid
                                JOIN style st ON st.styleid = sp.styleid
                                JOIN color cl ON cl.colorid = pc.colorid
                                ORDER BY sp.sanphamid ASC
                            ) AS result
                            ORDER BY result.sanphamid ASC
                        ";
$query_lietke_danhmuc_sp = $mysqli->query($sql_lietke_danhmuc_sp);
?>

<style>
    .product_list tr #td_productimage img {
        width: 120px;
        height: 90px;
    }

    .product_list tr th {
        background-color: #ff5f17;
        color: white;
    }

    .product_list tr td {
        background-color: white;
        font-weight: bold;
    }

    .bx-trash,
    .bx-edit {
        color: black;
        font-size: 1.3em;
    }

    .bx-trash:hover {
        color: #ff5f17;
    }

    .bx-edit:hover {
        color: #ff5f17;
    }

    .product_list {
        text-align: center;
    }

    .product_list_container {
        margin-top: 60px;
    }

    .product-hnm .btn-add-product {
        display: flex;
        height: 35px;
        padding: 0;
        background: #ff5f17;
        border: none;
        outline: none;
        border-radius: 5px;
        overflow: hidden;
        font-family: "Quicksand", sans-serif;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
    }

    .product-hnm .btn-add-product:hover {
        background: #d54e10;
    }

    .product-hnm .btn-add-product .btn-add-product-text,
    .btn-add-product-icon {
        display: inline-flex;
        align-items: center;
        padding: 0 5px;
        color: #fff;
        height: 100%;
    }

    .product-hnm .btn-add-product .btn-add-product-icon {
        font-size: 1.5em;
        background: rgba(0, 0, 0, 0.08);
    }

    .btn-add-product-container {
        position: absolute;
        right: 0;
    }

    #themsanpham_text {
        text-decoration: none;
    }
</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Thống kê</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Chart -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

    <!-- Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinycolor/1.4.2/tinycolor.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body>

<body>
    <section class="product product-hnm tab-content" id="product-section">

        <div class="pagetitle">
            <h1>Sản phẩm</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../page/products/products_management.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Sản phẩm</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <div class="btn-add-product-container">
            <a href="products_add.php" id="themsanpham_text">
                <button type="button" class="btn-add-product">
                    <span class="btn-add-product-text"><b>Thêm sản phẩm</b></span>
                    <span class="btn-add-product-icon">
                        <i class='bx bx-plus'></i>
                    </span>
                </button>
            </a>
        </div>


        <div class="product_list_container">
            <input class="form-control mb-4" id="tableSearch" type="text" placeholder="Tìm kiếm">

            <form method="post" action="xuly.php">

                <table class="table table-bordered table-striped product_list" border="1" style="border-collapse: collapse; width:100%;">

                    <thead>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Ảnh minh họa</th>
                        <th>Dòng</th>
                        <th>Kiểu dáng</th>
                        <th>Màu sắc</th>
                        <th>Danh mục</th>
                        <th>Giá</th>
                        <th>Xóa / Sửa</th>
                    </thead>
                    <tbody id="myTable">
                        <!-- (LIỆT KÊ SẢN PHẨM) -->
                        <?php
                        $i = 1;
                        while ($row = mysqli_fetch_array($query_lietke_danhmuc_sp)) {
                        ?>
                            <tr>
                                <td id="td_productnumber" name="td_productnumber"><?php echo $i; ?></td>
                                <td id="td_productname" name="td_productname"><?php echo $row['tensp']; ?></td>
                                <td id="td_productimage" name="td_productimage">
                                    <img src="../../../uploads/<?php echo $row['img1']; ?>" alt="<?php echo $row['img1']; ?>">
                                </td>
                                <td id="td_productline" name="td_productline"><?php echo $row['tendongsp']; ?></td>
                                <td id="td_productstyle" name="td_productstyle"><?php echo $row['stylename']; ?></td>
                                <td id="td_color" name="td_color"><?php echo $row['colorname']; ?></td>
                                <td id="td_productportfolio" name="td_productportfolio"><?php echo $row['danhmuc']; ?></td>
                                <td id="td_productprice" name="td_productprice"><?php echo $row['giasp']; ?>₫</td>
                                <td>
                                    <a class="xoa" sanphamid=<?php echo $row['sanphamid']; ?> colorid=<?php echo $row['colorid']; ?> name="xoa">
                                        <i class='bx bx-trash'></i>
                                    </a>
                                    |
                                    <a href="products_edit.php?sanphamid=<?php echo $row['sanphamid']; ?>&colorid=<?php echo $row['colorid']; ?>" id="suasanpham_text">
                                        <i class='bx bx-edit'></i>
                                    </a>
                                </td>
                            </tr>
                        <?php
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </form>
        </div>
    </section>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <script>
        $(function() {
            $("#tableSearch").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.xoa').click(function() {
                var sanphamid = $(this).attr('sanphamid');
                var colorid = $(this).attr('colorid');
                if (confirm("Bạn có chắc muốn xóa sản phẩm không?")) {
                    $.ajax({
                        method: 'POST',
                        url: 'AjaxDel.php', // Ensure the URL is a string
                        data: {
                            sanphamid: sanphamid,
                            colorid: colorid
                        },
                        success: function(data, status) {
                            console.log(data); // Log the response to the console
                            if (status === "success") {
                                alert("Xóa sản phẩm thành công");
                            } else {
                                alert("Lỗi khi xóa sản phẩm. Vui lòng thử lại lần sau.");
                            }
                            history.go(0);
                        },
                        error: function() {
                            alert("Lỗi khi thực hiện yêu cầu. Vui lòng thử lại lần sau.");
                        }
                    });
                }


            });


        });
    </script>


</body>


<style>
    /*--------------------------------------------------------------
# General
--------------------------------------------------------------*/
    :root {
        scroll-behavior: smooth;
    }

    body {
        font-family: "Open Sans", sans-serif;
        background: #f6f9ff;
        color: #444444;
    }

    a {
        color: #4154f1;
        text-decoration: none;
    }

    a:hover {
        color: #717ff5;
        text-decoration: none;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: "Nunito", sans-serif;
    }

    /*--------------------------------------------------------------
# Main
--------------------------------------------------------------*/
    #main {
        margin-top: 60px;
        padding: 20px 30px;
        transition: all 0.3s;
    }

    @media (max-width: 1199px) {
        #main {
            padding: 20px;
        }
    }

    /*--------------------------------------------------------------
# Page Title
--------------------------------------------------------------*/
    .pagetitle {
        margin-bottom: 10px;
    }

    .pagetitle h1 {
        font-size: 24px;
        margin-bottom: 0;
        font-weight: 600;
        color: #012970;
    }

    /*--------------------------------------------------------------
# Back to top button
--------------------------------------------------------------*/
    .back-to-top {
        position: fixed;
        visibility: hidden;
        opacity: 0;
        right: 15px;
        bottom: 15px;
        z-index: 99999;
        background: #4154f1;
        width: 40px;
        height: 40px;
        border-radius: 4px;
        transition: all 0.4s;
    }

    .back-to-top i {
        font-size: 24px;
        color: #fff;
        line-height: 0;
    }

    .back-to-top:hover {
        background: #6776f4;
        color: #fff;
    }

    .back-to-top.active {
        visibility: visible;
        opacity: 1;
    }
</style>

<script>
    /**
     * Back to top button
     */
    let backtotop = select('.back-to-top')
    if (backtotop) {
        const toggleBacktotop = () => {
            if (window.scrollY > 100) {
                backtotop.classList.add('active')
            } else {
                backtotop.classList.remove('active')
            }
        }
        window.addEventListener('load', toggleBacktotop)
        onscroll(document, toggleBacktotop)
    }
</script>

</html>