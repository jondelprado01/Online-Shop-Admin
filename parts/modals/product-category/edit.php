<?php

$retrieveCategory = mysqli_query($conn, "SELECT * FROM product_category_table
                    WHERE product_category_status = 'Active'");

    while ($row = mysqli_fetch_array($retrieveCategory)) {
      $category_id = $row['product_category_id'];
      $category = $row['product_category'];
      $group_id = $row['product_group_id'];
      $desc = $row['product_category_desc'];
?>

      <div class="modal fade" id="edit-category<?php  echo $category_id ?>"  role="dialog" style="width: 100%" aria-hidden="true">
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

                <div class="form-group">
                  <label> Category Group</label>
                  <select class="form-control" name="category-group" required>
                    <?php

                      $category_group_join = mysqli_query($conn, "SELECT pg.product_group_id FROM product_group_table pg
                                                INNER JOIN product_category_table pc ON pg.product_category_id = pc.product_category_id
                                                WHERE pc.product_category_id = '$group_id'");

                      while ($row = mysqli_fetch_array($category_group_join)) {
                        $product_group_id = $row['product_group_id'];
                      }

                      $retrieveGroup = mysqli_query($conn, "SELECT * FROM product_group_table
                                          WHERE product_group_status = 'Active' ORDER BY product_group ASC");

                      while ($row2 = mysqli_fetch_array($retrieveGroup)) {
                        $product_group_id = $row2['product_group_id'];
                        $product_group = $row2['product_group'];

                        if ($product_group_id == $group_id) {
                          $selected = "selected";
                        }
                        else {
                          $selected = "";
                        }
                    ?>
                        <option <?php echo $selected ?> value="<?php echo $product_group_id ?>"><?php echo $product_group ?></option>

                    <?php
                      }
                    ?>
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
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal" name="btn-cancel">Close</button>
                <input type="submit" class="btn btn-success" name="btn-edit" value="Edit">
                <input type="hidden"  name="category-id" value="<?php echo $category_id ?>">
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
