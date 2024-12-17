
<style>
    .div_cart_detail {
        max-width: 500px;
        width: 100%;
    }

    .text-hnm {
        font-size: 1.5em;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .cart_list_container {
        margin-top: 60px;
    }

    .cart_list {
        text-align: center;
    }

    .cart_list tr th {
        background-color: #ff5f17;
        color: white;
    }

    .cart_list tr td {
        background-color: white;
        font-weight: bold;
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
<section class="cart cart-hnm tab-content" id="cart-section">
    <div class="container">
    <div id="div_cart_detail">
        <div class="text text-hnm">Chi tiết giỏ hàng</div>
        <div class="cart_list_container">
            <table class="cart_list" border="1" style="border-collapse:collapse;width:100%;">
                <tr>
                    <th>STT</th>
                    <th>PROCOLORID</th>
                    <th>Kích thước</th>
                    <th>Số lượng</th>
                </tr>
                <?php
                    $sql = "SELECT productcolorid, size, soluong from giohangct where khachhangid = '$_GET[idcart]';";
                    $rs = $mysqli->query($sql);
                    
                    if($rs ->num_rows > 0)
                    {
                        $stt = 0;
                        while($row = $rs->fetch_row()){
                            $stt += 1;
                ?>
                <tr>
                    <td id="td_cart_productord" name="td_cart_productord"><?php echo $stt ?></td>
                    <td id="td_cart_procolorid" name="td_cart_procolorid"><?php echo $row[0] ?></td>
                    <td id="td_cart_productsize" name="td_cart_productsize"><?php echo $row[1] ?></td>
                    <td id="td_cart_productquantity" name="td_cart_productquantity"><?php echo $row[2] ?></td>
                </tr>
                <?php
                        }
                    }else
                    {
                ?>
                <tr>
                    <td colspan="4">Chưa có sản phẩm trong giỏ hàng</td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </div>
    </div>
    </div>
</section>

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
