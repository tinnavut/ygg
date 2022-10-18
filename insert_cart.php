<?php
    session_start();
    include 'condb.php';
    $cosid=$_POST['member_id'];
    $cosName=$_POST['cus_name'];
    $cosNote=$_POST['cus_note'];
    $cosTel=$_POST['cus_tel'];

    $sql="insert into tb_order(id_table,cus_name,note,telephone,total_price,order_statu) 
    values('$cosid','$cosName','$cosNote','$cosTel','" . $_SESSION["sum_price"] . "','1')";
    mysqli_query($con,$sql);

    $orderID = mysqli_insert_id($con);
    $_SESSION["order_id"]=$orderID;

    for ($i=0; $i <= (int)$_SESSION["intLine"]; $i++){
        if(($_SESSION["strProductID"][$i]) != "") {
        // ดึงข้อมูลสินค้า
        $sql1="select * from tbl_product where p_id ='" . $_SESSION["strProductID"][$i] . "' ";  
        $result1=mysqli_query($con,$sql1);
        $row1=mysqli_fetch_array($result1);
        $price = $row1['price'];
        $total= $_SESSION["strQty"][$i] * $price;

        $sql2="insert into order_detail(orderID,pro_id,orderPrice,orderQty,Total)
        values('$orderID','" . $_SESSION["strProductID"][$i] . "','$price', '" . $_SESSION["strQty"][$i] ."','$total')";
        mysqli_query($con,$sql2);
        
        echo "<script> window.location='print_order.php'</script>";
        }

    }

mysqli_close($con);
usest($_SEEION["intLine"]);
usest($_SEEION["strProductID"]);
usest($_SEEION["strQty"]);
usest($_SEEION["sum_price"]);
?>