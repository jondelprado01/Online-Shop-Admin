<div class="modal fade" id="new-classification"  role="dialog" style="width: 100%" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          New Product Classification
        </h5>
      </div>

      <div class="modal-body">

        <form role="form" method="post" autocomplete="off" >

          <div class="form-group">
            <label> Category</label>

            <select class="form-control" name="category-group" required>
              <option value="">-Select a Category-</option>
            <?php

              $retrieveCategory = mysqli_query($conn, "SELECT * FROM product_category_table
                                  WHERE product_category_status = 'Active'");

              while ($row = mysqli_fetch_array($retrieveCategory)) {
                $category = $row['product_category'];
                $categoryID = $row['product_category_id'];

            ?>
                <option value="<?php echo $categoryID ?>"><?php echo $category ?></option>

            <?php

              }

            ?>
            </select>

          </div>

          <div class="form-group">
            <label> Classification Name</label>
            <input type="text" class="form-control" name="classification-name" placeholder="Enter Classification" maxlength="40" required>
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
    require '../parts/php/product-classification/new.php';
  }

 ?>

















<!-- end -->
