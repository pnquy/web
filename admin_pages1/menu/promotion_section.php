<style>
    .btn-add-promotion-container {
        position: absolute;
        right: 0;
    }

    #themkhuyenmai_text {
        text-decoration: none;
    }

    .promotion-hnm .btn-add-promotion {
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

    .promotion-hnm .btn-add-promotion:hover {
        background: #d54e10;
    }

    .promotion-hnm .btn-add-promotion .btn-add-promotion-text,
    .btn-add-promotion-icon {
        display: inline-flex;
        align-items: center;
        padding: 0 5px;
        color: #fff;
        height: 100%;
    }

    .promotion-hnm .btn-add-promotion .btn-add-promotion-icon {
        font-size: 1.5em;
        background: rgba(0, 0, 0, 0.08);
    }

    .btn-add-promotion-container {
        position: absolute;
        right: 0;
    }

    .promotion_list_container {
        margin-top: 60px;
    }

    .promotion_list tr th {
        background-color: #ff5f17;
        color: white;
    }

    .promotion_list tr td {
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

    .promotion_list {
        text-align: center;
    }

    .promotion_list_container {
        margin-top: 60px;
    }
</style>
<?php

?>
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
    <section class="promotion promotion-hnm tab-content" id="promotion-section">
        <div class="pagetitle">
            <h1>Khuyến mãi</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../page/products/products_management.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Khuyến mãi</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <div class="btn-add-promotion-container">
            <a href="promotions_add.php" id="themkhuyenmai_text">
                <button type="button" class="btn-add-promotion">
                    <span class="btn-add-promotion-text"><b>Thêm khuyến mãi</b></span>
                    <span class="btn-add-promotion-icon">
                        <i class='bx bx-plus'></i>
                    </span>
                </button>
            </a>
        </div>
        <div class="promotion_list_container">
        <input class="form-control mb-4" id="tableSearch" type="text" placeholder="Tìm kiếm">

            <table class="promotion_list table table-bordered table-striped product_list" border="1" style="border-collapse:collapse;width:100%">
                <thead>
                    <th>ID Khuyến mãi</th>
                    <!-- <th>Tên khuyến mãi</th> -->
                    <th>Ngày bắt đầu</th>
                    <th>Ngày kết thúc</th>
                    <th>% Giảm giá</th>
                    <th>Xóa / Sửa
                    <th>
                </tr>
                <tbody id="myTable">
                <?php
                // $sql = "SELECT DISTINCT `saleoffid`, `tenkhuyenmai`, `ngaybd`, `ngaykt`, `giatrigiam` FROM `saleoff`";
                $sql = "SELECT DISTINCT saleoffid, ngaybd, ngaykt, giatrigiam FROM saleoff";
                $rs = $mysqli->query($sql);
                if ($rs->num_rows > 0) {
                    while ($row = $rs->fetch_row()) {
                ?>
                        <tr>
                            <td id="td_promotion_id" name="td_promotion_id"><?php echo "KM" . $row[0] ?></td>
                            <!-- <td id="td_promotion_name" name="td_promotion_name"><?php echo $row[1] ?></td> -->
                            <td id="td_promotion_startdate" name="td_promotion_startdate"><?php echo $row[1] ?></td>
                            <td id="td_promotion_enddate" name="td_promotion_enddate"><?php echo $row[2] ?></td>
                            <td id="td_promotion_discountpercentage" name="td_promotion_discountpercentage"><?php echo $row[3] ?></td>
                            <td>
                                <a class="deleteKM" makm=<?php echo $row[0] ?> name="deleteKM"><i class='bx bx-trash'></i></a> | <a href="promotions_edit.php?edit=<?php echo $row[0] ?>"><i class='bx bx-edit'></i></a>
                                <!-- <button class="bx bx-trash" makm = <?php echo $row[0] ?>></button>|<button class="bx bx-trash" makm = <?php echo $row[0] ?>></button> -->

                            </td>
                        </tr>
                <?php
                    }
                } else {
                }
                ?>
                </tbody>
            </table>
        </div>
    </section>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $('.deleteKM').click(function() {
                maKM = $(this).attr('maKM');
                $(this).parents("tr").remove();
                $.post("xoaKM_ajax.php", {
                        maKM: maKM
                    },
                    function(data, status) {
                        if (status == "success") {

                        }
                    });
            })
        })
    </script>
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