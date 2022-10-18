<?php

$type_id = $_GET['type_id'];
//echo $type_id;
//exit();
    $query_product_type = "SELECT * FROM tbl_product as p
    INNER JOIN tbl_type  as t 
    ON p.type_id=t.type_id
    WHERE p.type_id = $type_id 
    ORDER BY p.p_id ASC";  //เรียกข้อมูลมาแสดงทั้งหมด
    $result_prd = mysqli_query($con, $query_product_type) or die ("Error in query: $query_product" . myspli_error());
//echo $query_product_type;
//exit();


?>
<div class="row">
    <?php foreach ($result_prd as $row_prd){ ?>

<div class="card border-Light mb-1" style="width: 16.5rem;">
        <br>
        <img class="card-img-top">
        <a href=""> <?php echo"<img src='p_img/".$row_prd['p_img']."'width='200' height='200'>";?></a>
        <div class="card-body">
            <a href="prd.php?id=<?php echo $row_prd[0]; ?>"><b> <?php echo $row_prd["p_id"];?></b> </a>
            <br>
            <a href="prd.php?id=<?php echo $row_prd[0]; ?>"><b> <?php echo $row_prd["p_name"];?></b> </a>
            <br>
            ราคา <font color=""> <?php echo $row_prd["p_price"];?></font> บาท
            <br>
            คงเหลือ <?php echo $row_prd["p_qty"];?> <?php echo $row_prd["p_unit"];?>
            
            <br><button type="button" class="btn btn-outline-dark mt-auto">
                <a href="prd.php?id=<?php echo $row_prd[0]; ?>" style="color:#rgb(0, 0, 0)">รายละเอียด</a>
                
            </button>
            
        </div>
        <br>
    </div>
    <?php } ?>