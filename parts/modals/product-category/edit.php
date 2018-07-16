<?php

$retrieveCategory = mysqli_query($conn, "SELECT * FROM product_category_table
                    WHERE product_category_status = 'Active'");

    while ($row = mysqli_fetch_array($retrieveCategory)) {
      $id = $row['product_category_id'];
      $category = $row['product_category'];
      $group = $row['product_category_group'];
      $desc = $row['product_category_desc'];
?>

      <div class="modal fade" id="edit-category<?php  echo $id ?>"  role="dialog" style="width: 100%" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">
                Edit Product Category
              </h5>
            </div>

            <div class="modal-body">

              <form class="categoryform" role="form" method="post" autocomplete="off" >

                <div class="form-group ">
                  <label> Category Name</label>
                  <input type="text" value="<?php echo $category ?>" class="form-control" name="category-name" placeholder="Enter Product Category" maxlength="40" required>
                </div>

                <?php

                $accessories = "";
                $components = "";
                $laptops = "";
                $network = "";
                $peripherals = "";

                if ($group == "Accessories") {
                  $accessories= "selected";
                }

                elseif ($group == "Components") {
                  $components = "selected";
                }

                elseif ($group == "Laptops") {
                  $laptops = "selected";
                }

                elseif ($group == "Network Hardwares") {
                  $network = "selected";
                }

                elseif ($group == "Peripherals") {
                  $peripherals = "selected";
                }

                 ?>

                <div class="form-group">
                  <label> Category Group</label>
                  <select class="form-control" name="category-group" required>
                    <option value="">--Select a Group--</option>
                    <option value="Accessories" <?php echo $accessories ?>>Accessories</option>
                    <option value="Components" <?php echo $components ?>>Components</option>
                    <option value="Laptops" <?php echo $laptops ?>>Laptops</option>
                    <option value="Network Hardwares" <?php echo $network ?>>Network Hardwares</option>
                    <option value="Peripherals" <?php echo $peripherals ?>>Peripherals</option>
                  </select>
                </div>

                <div class="row">

                  <div class="form-group col-md-12">
                    <label>Category Description</label>
                    <textarea class="form-control" rows="3" placeholder="Enter Description" name="category-desc" maxlength="100"><?php echo $desc ?></textarea>
                  </div>

                </div>

            </div>

            <div class="modal-footer">
                <!-- <p style="color: red; font-style: italic">Note: All fields with <span class="glyphicon glyphicon-asterisk" style="color:red;  font-size: 10px"></span> are Required</p> -->
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal" name="btn-cancel">Close</button>
                <input type="submit" class="btn btn-success" name="btn-edit" value="Edit">
                <input type="hidden"  name="category-id" value="<?php echo $id ?>">
              </form>

            </div>
          </div>
        </div>
      </div>

<?php
    }

    if (isset($_POST['btn-edit'])) {
      require '../parts/php/product-category/edit.php';
    }

 ?>
