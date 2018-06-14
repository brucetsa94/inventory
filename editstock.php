<?php include "header.php"; ?>

   <div class="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Stock</li>
        </ol>
        <?php require_once "control/stock.control.php"; ?>
        <div class="card mb-3">
          <div class="card-header"> Add Stock </div>
          <div class="card-body">
            <div class="row">

            <?php

            if(isset($_GET['edit'])) {

                $item = $_GET['edit'];

            $edit = $object->selectEdit($item);
            if($edit->num_rows > 0) {
            while($row=$edit->fetch_assoc()) { ?>
                                <div class="col-lg-6">
                                    <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                                            <input class="form-control" type="hidden" value="<?php echo $item; ?>" name="theitem" /> 
                                        <div class="form-group">
                                            <label>Item Name</label>
                                            <input class="form-control" type="text" value="<?php echo $row['item_name']; ?>" name="ename" required="" placeholder="..e.g Note 8">
                                        </div>
                                        <div class="form-group">
                                            <label>Manufacturer</label>
                                            <input class="form-control" type="text" name="emanuf" value="<?php echo $row['manufacturer']; ?>" required="" placeholder="..e.g Samsung">
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <input class="form-control" type="text" value="<?php echo $row['description']; ?>" name="edesc" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Weight</label>
                                            <input name="eweight" value="<?php echo $row['weight']; ?>" class="form-control" placeholder="..e.g 50g">
                                        </div>
                                        
                                        </div>

                                        <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Size</label>
                                            <input class="form-control" type="text" name="esize" required="" placeholder="..e.g 6inch" value="<?php echo $row['size']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Type</label>
                                            <input class="form-control" type="text" name="etype" required="" placeholder="..e.g smartphone"
                                            value="<?php echo $row['type']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Serial Number</label>
                                            <input class="form-control" type="text" value="<?php echo $row['serial_number']; ?>" name="eserial" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control" name="ecategory">
                                                <option value="1">Phone</option>
                                                <option>Inventory Manager</option>
                                                <option>Sales</option>
                                            </select>
                                        </div>
                                        <input type="submit" class="btn btn-primary"  name="edits" value="Submit"/>
                                        <a href="stock.php" class="btn btn-primary" > Cancel </a>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <?php }}} ?>

          </div>
          </div>
                    </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->
<?php include "footer.php"; ?>