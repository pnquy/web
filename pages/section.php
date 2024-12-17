<section>
    <?php 
        if(isset($_GET['quanly'])){
            $tam = $_GET['quanly'];
        }else{
            $tam = '';
        }

        if($tam == 'danhmucsanpham'){
            include ("main/listsp.php");
        }else if($tam == 'giohang'){
            include ("main/giohang.php");
        }else if($tam == 'thanhtoan'){
            include("main/thanhtoan.php");
        }else if($tam =='chitietsanpham'){
            include ("main/chitietsp.php");
        }else if($tam == 'dangnhap'){
            include ("dangnhap.php");
        }else if($tam == 'dangki'){
            include ("dangki.php");
        }
        else if($tam == 'timkiem'){
            include ("main/timkiem.php");
        }
        else if($tam == 'tracuudonhang'){
            include ("main/donmua/tracuudonhang.php");
        }
        else if($tam == 'chitietdonhang'){
            include ("main/donmua/chitietdonhang.php");
        }
        else{
            include ("main/homepage.php");
        }
    ?>        
</section>