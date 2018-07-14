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
            <select class="form-control" name="category-group">
              <option value="None">-Select a Category-</option>
            <?php

              require '../connection.php';

              $retrieveCategory = mysqli_query($conn, "SELECT * FROM product_category_table
                                  WHERE product_category_status = 'Active'");

              while ($row = mysqli_fetch_array($retrieveCategory)) {
                $category = $row['product_category'];
                $id = $row['product_category_id'];
            ?>
                <option value="<?php echo $id ?>"><?php echo $category ?></option>
            <?php
              }

            ?>
            </select>
          </div>

          <div class="form-group">
            <label> Classification Name</label>
            <input type="text" class="form-control" name="classification-name" placeholder="Enter Classification" maxlength="40">
          </div>

      </div>

      <div class="modal-footer">
          <!-- <p style="color: red; font-style: italic">Note: All fields with <span class="glyphicon glyphicon-asterisk" style="color:red;  font-size: 10px"></span> are Required</p> -->
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal" name="btn-cancel" onclick="reset()">Close</button>
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
