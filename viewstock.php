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

          if(isset($_GET['stock'])){
            $stockid = $_GET['stock'];

                $viewstock = $object->selectStock($stockid);
            
                  while($row=$viewstock->fetch_assoc()){
                    echo "".$row['item_name']. "<br/>";
                    echo "".$row['category_name'];
                  }

                } else {
                  echo "Can't grab ID";
                }
          
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