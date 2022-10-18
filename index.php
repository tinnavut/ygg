<?php
include('h.php');
include("condb.php");
?>
<!DOCTYPE html>
<head>
  <?php include('boot4.php');?>
</head>
<body>
<?php
  include('navbar01.php');
  ?>
 <?php
  include('banner.php');
  ?>
   <div class="container">
    <div class="row">
      <div class="col-md-12" style="margin-top: 10px">
        <div class="row">
            <?php
            $act = (isset($_GET['act']) ? $_GET['act'] : '');
            if($act=='showbytype'){
            include('show_product_type.php');
            }else if($act=='add'){
            include("member_form_add.php");
            }else{
            include('show_product.php');
            }
            ?>
          </div>
        </div>
      </div>
    </div>
</body>
</html>
<?php include('script4.php');?>