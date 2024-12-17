<?php
    include ('../../../config/config.php');
    if(isset($_POST['sua']))
    {
        $makm = $_POST['makm'];
        $tensp = $_POST['tensp'];
        $proid = $_POST['proid'];
        $sql = "DELETE FROM saleoffct where saleoffid='$makm' and procolorid = '$proid'";
        $results = $mysqli->query($sql);
    }else
    {
        $maKM=$_POST['maKM'];
        $sql = "DELETE FROM saleoffct where saleoffid='$maKM'";
        $sql1 = "DELETE FROM saleoff where saleoffid='$maKM'";
        $results = $mysqli->query($sql);
        $results1 = $mysqli->query($sql1);
    }
    
?>