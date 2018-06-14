<?php include "header.php"; ?>

    <div class="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            Dashboard
          </li>
          <li class="breadcrumb-item active"><a href="stock.php"> Stock </a></li>
        </ol>
        <!-- Example Tables Card -->

        <div class="card mb-3">
          <div class="card-header">
            
          </div>
          <div class="card-body">

          <?php
          include "control/stock.control.php";
/*
          $view = $object->select();
          if($view->num_rows > 0){
            while($row=$view->fetch_assoc()){
              echo $row['item_name'];
            }
          } */
          //if(isset($_GET['stock'])) {

               // $item = $_GET['stock'];

                $views = $object->selectStock();

               /* $query = mysql_query("SELECT * FROM items JOIN category ON items.category_id = category.category_id WHERE items.category_id = '".$item."'"); */
            
            
            
            while($row=$views->fetch_assoc()){
              echo "".$row['item_name']. "<br/>";
              echo "".$row['category_name'];
            }
          //} else {
            //echo "No results";
          //} 
        //}  
              ?>


</div>
<div class="card-footer small text-muted">
            Stock
          </div>
          
          </div>
          
        </div>

      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->
<?php include "footer.php"; ?>