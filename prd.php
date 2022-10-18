<?php
include('h.php');
include("condb.php");
$p_id = $_GET["id"];
?>
<!DOCTYPE html>
<head>
  <?php include('boot4.php');?>
  <style>
#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  animation-name: zoom;
  animation-duration: 0.6s;
}

@keyframes zoom {
  from {transform: scale(0.1)} 
  to {transform: scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>
</head>
<body>
  <?php
  include('navbar01.php');
  include('banner.php');
  ?>
  <div class="container">
    <div class="row">
      <?php
      $sql = "SELECT * FROM tbl_product as p 
          INNER JOIN tbl_type  as t ON p.type_id=t.type_id      
      AND p_id = $p_id
      ";
      $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
      $row = mysqli_fetch_array($result);

            $sql_last_view = "SELECT p_view FROM tbl_product Where p_id = '".$p_id."'";
            $resalt_last_view = mysqli_query($con, $sql_last_view) or die ("Error in query: $sql_last_view " . mysqli_error());
            $row_last_view = mysqli_fetch_assoc($resalt_last_view);
            //เรียกดูวิวของสินค้านั้นๆ
                $last_view = $row_last_view['p_view']++;            
                $last_view++;
                //นำวิวสินค้าเดิมมา+1
                $update_view = "UPDATE `tbl_product` SET `p_view` = '".$last_view."' WHERE `p_id` ='".$p_id."'";
                $resalt_updateview = $con->query($update_view);
                //อัพเดทวิวสินค้าใหม่
      ?>
      <div class="col-md-12">
        <div class="container" style="margin-top: 50px">
          <div class="row">
            <div class="col-md-6">
            
                <?php echo"<img src='p_img/".$row['p_img']."'width='100%' height='80%' id='myImg'>";?>
                <div id="myModal" class="modal">
                <span class="close">&times;</span>
                <img class="modal-content" id="img01">
                <div id="caption"></div>
                </div>
            </div>
            <div class="col-md-6">
            <h5><b><?php echo $row["p_id"];?></b></h5>
              <br>
              <h5><b><?php echo $row["p_name"];?></b></h5>
              <p>
                ประเภท : <?php echo $row["type_name"];?>
                <br>
                ราคา : <font color="red"> <?php echo $row["p_price"];?> </font> บาท  <br>
                 <b>คงเหลือ :</b> <?php echo $row["p_qty"];?> <?php echo $row["p_unit"];?>
              </p>
              <?php echo $row["p_detail"];?>
              <br> จำนวนเข้าชม <?php echo $row['p_view']; ?> ครั้ง
              <p> <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="button">Button</button>
                        <button class="btn btn-primary" type="button">Button</button>
                        <button class="btn btn-primary" type="button">Button</button>
                        <button class="btn btn-primary" type="button">Button</button>
                        <button class="btn btn-primary" type="button">Button</button>
                      </div>
              </p>
            </div>
            <br><button type="button" class="btn btn-outline-dark mt-auto">
                <a href="order.php?id=<?=$row['p_id']?>" style="color:#rgb(0, 0, 0)">Add cart</a>
                
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
                // Get the modal
                var modal = document.getElementById('myModal');

                // Get the image and insert it inside the modal - use its "alt" text as a caption
                var img = document.getElementById('myImg');
                var modalImg = document.getElementById("img01");
                var captionText = document.getElementById("caption");
                img.onclick = function(){
                modal.style.display = "block";
                modalImg.src = this.src;
                captionText.innerHTML = this.alt;
                }

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() { 
                modal.style.display = "none";
                }
                </script>
</body>
</html>
<?php include('script4.php');?>