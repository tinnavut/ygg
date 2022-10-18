<?php require_once('condb.php');
$query_typeprd = "SELECT * FROM tbl_type ORDER BY type_id ASC";
$typeprd =mysqli_query($con, $query_typeprd) or die ("Error in query: $query_typeprd " . mysqli_error());
// echo($query_typeprd);
// exit();
$row_typeprd = mysqli_fetch_assoc($typeprd);
$totalRows_typeprd = mysqli_num_rows($typeprd);
?>
 <!-- Navder -->
 <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:rgb(49, 45, 54);">
        <a class="navbar-brand" href="index.php">VCA GUNDAM </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">หน้าแรก <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        ประเภทสินค้า
                    </a>
                    <div class="dropdown-menu">
                    <?php do { ?>
                    <a href="index.php?act=showbytype&type_id=<?php echo $row_typeprd['type_id'];?>" class="dropdown-item"> <?php echo $row_typeprd['type_name']; ?></a>
                    <?php } while ($row_typeprd = mysqli_fetch_assoc($typeprd)); ?>
            
                    </div>
                </li>

            </ul>
            <div class="form-inline my-2 my-lg-0" id="navbarSupportedContent" >
                    <div class="collapse navbar-collapse" id="navbarSupportedContent" >
                        <ul class="navbar-nav mr-auto">
                            &nbsp;
                            <div class="btn-group">
                            <a class="btn btn-dark" href="index.php?act=add" role="button">สมัครสมาชิก</a>
                            </div>
                            &nbsp;
                            
                            <div class="btn-group">
                            <a class="btn btn-dark" href="form_login.php" role="button">เข้าสู่ระบบ</a>
                            </div>
                            <?php  ?>
                            
                        
                                                
                        </ul>
                    </div>                   
            </div>
        </div>
        
      </nav>
        </div>
    </nav>
    <!-- /Navder -->