<?php include "header.php"; ?>

    <div class="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            Dashboard
          </li>
          <li class="breadcrumb-item active">Stock</li>
        </ol>
        <!-- Example Tables Card -->

        <div class="card mb-3">
          <div class="card-header">
            <div class="row">
              <div class="col-lg-6">
            <i class="fa fa-th">
            
             </i> Categories
           </div>
           
           <div class="col-lg-6" align="right"><a class="btn btn-success" href="addstock.php" data-toggle="tooltip" data-placement="top" title="Add Stock" > <i class="fa fa-plus" > </i></a>
           </div>
          </div>
          </div>
          <div class="card-body">
            <div class='row'>
          <?php include "control/category.control.php"; 

              $view = $objects->select();
                if($view->num_rows > 0) { 
                while($row = $view->fetch_assoc()) { $id = $row['category_id'];

                echo "
              
                <div class='col-sm-6'>
                
                 
                  <div class='card text-center' style='width: 25rem;'>
                      <div class = 'card-header'> <h4>
                        " . $row['category_name'] . "
                            </h4>
                      </div> <!-- card header -->
                      <div class='card-body'>
                        <a href='viewstock.php?stock=$id' class='btn btn-primary'> View Items </a>  ";
                        //require "control/fpdf.control.php";
                echo "<a href='includes/pdf.php' style='color: #000;' class='btn btn-outline' data-toggle='tooltip' data-placement='top' title='Export'> <i class='fa fa-2x fa-download' > </i></a>
                      </div> <!-- card body -->
                  </div><!-- card -->
                  
                    <br/> <br/>
                </div><!-- column -->
                    

              


                ";

               /* echo "

          
            <div class='table-responsive'>
            
                  <table class='table table-bordered' width='100%' id='dataTable' cellspacing='0'>
                <thead>
                  <tr>
                    <th>Item Name</th>
                    <th>Description</th>
                    <th>Manufacturer</th>
                    <th>Type</th>
                    <th>Category</th>
                    <th>Weight</th>
                    <th>Size</th>
                    <th>Serial</th>
                  </tr>
                </thead>
                
                <tbody>

                  <tr>
                    <td data-id1='".$id."'>" . $row['item_name']. "</td>
                    <td data-id2='".$id."'>" . $row['description']. "</td>
                    <td data-id3='".$id."'>" . $row['manufacturer']. "</td>
                    <td data-id4='".$id."'>" . $row['type'] . " </td>
                    <td data-id5='".$id."'>" . $row['category_id'] . " </td>
                    <td data-id6='".$id."'>" . $row['weight'] . " </td>
                    <td data-id7='".$id."'>" . $row['size'] . "</td>
                    <td data-id8='".$id."'>" . $row['serial_number'] . "</td>
                    <td><a href='editstock.php?edit=$id' class='btn btn-success' data-toggle='tooltip' data-placement='top' title='Edit'><i class='fa fa-edit fa-1x'> </i></a></td>
                    <td><a href='stock.php?del=$id' class='btn btn-danger' data-toggle='tooltip' data-placement='top' title='Delete'><i class='fa fa-trash fa-1x'> </i></a> </td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                  </tr>
                </tfoot>
              </table>
            </div>"; */
            } }?>
            </div><!-- row -->
          </div>
          <div class="card-footer small text-muted">
            Stock
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->
<?php include "footer.php"; ?>