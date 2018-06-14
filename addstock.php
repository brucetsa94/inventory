<?php include "header.php"; ?>

   <div class="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            Dashboard
          </li>
          <li class="breadcrumb-item active"><a href="stock.php">Stock</a></li>
        </ol>
        <?php require_once "control/stock.control.php"; ?>
        <div class="card mb-3">
          <div class="card-header"> Add Stock </div>
          <div class="card-body">
            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                                            <input class="form-control" type="hidden" name="status" value="1">
                                        <div class="form-group">
                                            <label>Item Name</label>
                                            <input class="form-control" type="text" name="name" required="" placeholder="..e.g Note 8">
                                        </div>
                                        <div class="form-group">
                                            <label>Manufacturer</label>
                                            <input class="form-control" type="text" name="manuf" required="" placeholder="..e.g Samsung">
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <input class="form-control" type="text" name="desc" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Weight</label>
                                            <input name="weight" class="form-control" placeholder="..e.g 50g">
                                        </div>
                                        <div class="form-group">
                                            <label>Size</label>
                                            <input class="form-control" type="text" name="size" required="" placeholder="..e.g 6inch">
                                        </div>
                                        </div>

                                        <div class="col-lg-6">
                                        
                                        <div class="form-group">
                                            <label>Type</label>
                                            <input class="form-control" type="text" name="type" required="" placeholder="..e.g smartphone">
                                        </div>
                                        <div class="form-group">
                                            <label>Serial Number</label>
                                            <input class="form-control" type="text" name="serial" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input class="form-control" type="number" name="quant" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Category</label>
                                            <?php 
                                            //$con = $connect;
                                            require_once "control/category.control.php";
                                            $query = $objects->select();
                                            
                                                    
                                            ?>
                                            <select class="form-control" name="category">
                                                <?php while ($rows=$query->fetch_assoc()) {
                                                        $id = $rows['category_id'];
                                                        $category = $rows['category_name']; ?>
                                                <option value="<?php echo $id; ?>"><?php echo $category; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <br/>
                                        <input type="submit" class="btn btn-primary"  name="add" value="Submit"/>
                                        <a href="stock.php" class="btn btn-primary"> Cancel </a>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>

          </div>
          </div>
                    </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->
<?php include "footer.php"; ?>