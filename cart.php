<?php
session_start();
include 'condb.php';
/*
$id=$_GET['id'];
$sql ="SELECT * FROM product WHERE pro_id='$id' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
*/

?>
<!DOCTYPE html>
<html lang="en">



<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Cart</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="bootstrap/js/bootstrap.bundle.min.js" ></script>

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@200&display=swap" rel="stylesheet">

  <style>
    body{
      background-image: url("image/p1.png" );
      background-size: cover;
      backdrop-filter: blur(1px);
      background-color: rgba(255, 255, 255, 0.4);
      font-family: 'Noto Sans Thai', sans-serif;
    }
    p,th,td,input,textarea,button {
      color: black;
      margin-left:10px;
      margin-right:10px;
      font-weight: bold;
    }
    form{
      background-image: url("image/พื้นหลัง7.png" );
    }
  </style>

</head>

<body>
<?php 
    include 'navbar01.php';
    include 'h.php';
?>
<div class="container">
  <br> <br>
  <div calss ="col-md-10">
              <div class = "alert alert-primary h4 text-dark" role="">
                <b>การสั่งอาหาร</b>
              </div>
    <form id="form1" method="POST" action="insert_cart.php">
      <br>
        <div calss ="row">
          
        <table class = "table table-hover ">
        <tr> 
            <th>ลำดับ</th>
            <th>ชื่อสินค้า</th>
            <th>ราคา</th>
            <th>จำนวน</th>
            <th>ราคารวม</th>
            <th>เพิ่ม - ลบ</th>
            <th>ลบ</th>
        </tr>
<?php
$Total = 0;
$sumPrice = 0;
$m = 1;
for ($i=0; $i <= (int)$_SESSION["intLine"]; $i++){
    if(($_SESSION["strProductID"][$i]) != "") {
      $sql1="select * from tbl_product where p_id = '" . $_SESSION["strProductID"][$i] . "'" ;
      $result1 = mysqli_query($con, $sql1);
      $row_pro = mysqli_fetch_array($result1);
    
      $_SESSION["p_price"] = $row_pro['p_price'];
      $Total = $_SESSION["strQty"][$i];
      $sum = $Total * $row_pro['p_price'];
      $sumPrice = $sumPrice + $sum;
      $_SESSION["sum_price"] = $sumPrice;
?>
        <tr> 
            <td><?=$m?></td>
            <td>
              <img src="p_img/<?=$row_pro['p_img']?>" width="100" height="80" class="border">
              <?=$row_pro['p_name']?>
            </td>
            <td><?=$row_pro['p_price']?></td>
            <td><?=$_SESSION["strQty"][$i]?></td>
            <td><?=$sum?></td>
            <td>
            <a href="order.php?id=<?=$row_pro['p_id']?>" class="btn btn-outline-primary">+</a>
            <?php if($_SESSION["strQty"][$i]> 1 ){?>
            <a href="order_del.php?id=<?=$row_pro['p_id']?>" class="btn btn-outline-primary">-</a>
            <?php }  ?>
          </td>

            <td><a href ="delete.php?Line=<?=$i?>"><img src="image/delete.png" width="30"> </a> </td>
        </tr>
<?php
$m=$m+1;
}
}
?>
<tr>
  
  <td class="text-end" colspan="4">รวมเป็นเงิน</td>
  <td class="text-center"> <?=$sumPrice?> </td>
  <td> บาท </td>
  <td></td>
  
</tr>

        </table>
        <div style="text-align:right">
        <a href ="prd.php"><button type="button" class="btn btn-outline-warning">เลือกสินค้า</button></a>  
        <button type="submit" class="btn btn-outline-primary"onclick="Del(this.href);return false;">ยืนยันการสั่งซื้อ</button>
        </div>
      </div>
      <br>
      
      
    <div class="row">
      <div class="col-md-5">
        <div class="alert alert-success text-dark " h4 role="alert" >
          <b>ข้อมูลลูกค้า</b>
        </div>
        <p>ชื่อ-นามสกุล :</p>
        <input type="text" name="cus_name" class="form-control" required placeholder="ชื่อ-นามสกุล"> <br>
      <p>หมายเหตุ :</p>
        <textarea class="form-control " required placeholder="หมายเหตุ..." name="cus_note" rows="3"></textarea> <br>
        <p>เบอร์โทรศัพท์ :</p>
        <input type="number" name="cus_tel" class="form-control " required placeholder="เบอร์โทรศัพท์">
        <br> <br> <br>
      </div>
    </div>
    </foem>
  </div>
</div>
</body>
<br>
</html>

<script>
function Del(mypage) {
    var agree=confirm("คุณต้องยืนยันการสั่งซื้อหรือไม่");
    if(agree){
        windoe.location=mypager;
    }
}
</script>


