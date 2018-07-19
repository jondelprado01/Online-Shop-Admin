<div class="modal fade" id="new-category"  role="dialog" style="width: 100%" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          New Product Category
        </h5>
      </div>

      <div class="modal-body">

        <form class="categoryform" role="form" method="post" autocomplete="off" >


          <div class="form-group">
            <label> Category Group</label>
            <select class="form-control" name="category-group" required>
              <option value="">--Select a Group--</option>
              <?php

                $retrieveGroup = mysqli_query($conn, "SELECT * FROM product_group_table
                                 WHERE product_group_status = 'Active' ORDER BY product_group ASC");

                while ($row = mysqli_fetch_array($retrieveGroup)) {
                  $product_group_id = $row['product_group_id'];
                  $product_group = $row['product_group'];

              ?>

                  <option value="<?php echo $product_group_id ?>"><?php echo $product_group ?></option>

              <?php

                }

              ?>
            </select>
          </div>

          <div class="form-group ">
            <label> Category Name</label>
            <input type="text" class="form-control" name="category-name" placeholder="Enter Product Category" maxlength="40" required>
          </div>

          <div class="form-group">
            <label>Category Description</label>
            <textarea class="form-control" rows="3" placeholder="Enter Description" name="category-desc" maxlength="100"></textarea>
          </div>

      </div>

      <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal" name="btn-cancel">Close</button>
          <input type="submit" class="btn btn-success" name="btn-save" value="Save">
        </form>

      </div>
    </div>
  </div>
</div>


<?php

  if (isset($_POST['btn-save'])) {
    require '../parts/php/product-category/new.php';
  }

 ?>

















<!-- end -->
