<?php
session_start();
include 'condb.php';
$sql="select * from tb_order where orderID= '" . $_SESSION["order_id"] . "' ";
$result = mysqli_query($con,$sql);
$rs=mysqli_fetch_array($result);
$total_price=$rs['total_price'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายการสั่งซื้อ</title>
    <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="bootstrap/js/bootstrap.bundle.min.js" ></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@200&display=swap" rel="stylesheet">


    <style>
    body{
      background-image: url("image/o.jpg" );
      background-size: cover;
      font-family: 'Noto Sans Thai', sans-serif;
     
    }p {
      color: rgb(213, 207, 207);
      font-weight: bold;
    }h6{
      font-weight: bold;
      margin-right:10px;
    }
    </style>

</head>
<body>
<?php
include('h.php');
include("condb.php");
?>
<?php
  include('navbar01.php');
  ?>
<br><br>
<div class="container">
<br>
  <div class="row">
    <div class="col-md-10 ">
      
    <div class="alert alert-primary h4 text-center text-dark" role="alert">
        <b>การสั่งอาหารเสร็จสมบูรณ์</b>
    </div>
    <p>เลขที่การสั่งซื้อ : <?=$rs['orderID']?> </p>
   <p>ชื่อ - นามสกุล (ลูกค้า) : <?=$rs['cus_name']?></p> 
   <p>หมายเหตุ :  <?=$rs['note']?></p>
   <p>เบอร์โทรศัพท์ :  <?=$rs['telephone']?></p>

    <div class="card mb4 mt-4">
    <table class="table table-hover">
        <div class="card-body">
  <thead>
    <tr>
      <th>รหัสสินค้า</th>
      <th>ชื่อสิ้นค้า</th>
      <th>ราคา</th>
      <th>จำนวนที่สั่ง</th>
      <th>ราคารวม</th>
    </tr>
  </thead>
  <tbody>
<?php
$sql1="select * from order_detail ,tbl_product  where p_id=p_id and orderID= '" . $_SESSION["order_id"] . "' ";
$result1 = mysqli_query($con,$sql1);
while($row=mysqli_fetch_array($result1)){
?>
    <tr>
      <td><?=$row['p_id']?></td>
      <td><?=$row['p_name']?></td>
      <td><?=$row['orderPrice']?></td>
      <td><?=$row['orderQty']?></td>
      <td><?=$row['Total']?></td>
    </tr>
  </tbody>
<?php
}
?>
</table>
<h6 class="text-end"> รวมเป็นเงิน <?=number_format($total_price,2)?> บาท </h6>
</div>
</div>
</div><br>
<div class="text-center text-white">
<b> ***ขอบคุณที่แวะมาอุดหนุนค่ะ*** </b> <br><br>
<a href="index.php" class="btn btn-success">Back</a>
<button onclick="window.print()" class="btn btn-success">Print</button>
</div>
</div>

</div>
</body> 
</html>