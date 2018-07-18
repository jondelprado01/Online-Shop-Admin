<?php

  $retrieveClassification = mysqli_query($conn, "SELECT * FROM product_classification_table
                            WHERE product_classification_status = 'Active'");

  while ($row = mysqli_fetch_array($retrieveClassification)) {

    $classificationID = $row['product_classification_id'];
    $classification = $row['product_classification'];
    // $categoryID = $row['product_category_id'];


?>

<div class="modal fade" id="edit-classification<?php echo $classificationID ?>" role="dialog" style="width: 100%" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          Edit Product Classification
        </h5>
      </div>

      <div class="modal-body">

        <form role="form" method="post" autocomplete="off" >

          <div class="form-group">
            <label> Category</label>
            <select class="form-control" name="category-group" required>
              <option value="">-Select a Category-</option>
            <?php

              $classificationCategory = mysqli_query($conn, "SELECT pc.product_category_id FROM product_category_table pc
                                        INNER JOIN product_classification_table pcl ON pc.product_category_id = pcl.product_category_id
                                        WHERE pcl.product_classification_id = '$classificationID'");
              while ($row2 = mysqli_fetch_array($classificationCategory)) {
                $categoryID = $row2['product_category_id'];
              }

              $retrieveCategory = mysqli_query($conn, "SELECT * FROM product_category_table
                                  WHERE product_category_status = 'Active' ORDER BY product_category ASC");

              while ($row3 = mysqli_fetch_array($retrieveCategory)) {
                $category = $row3['product_category'];
                $tempID = $row3['product_category_id'];

                if ($tempID == $categoryID) {
                  $selected = "selected";
                }
                else {
                  $selected = "";
                }
            ?>
                <option <?php echo $selected ?> value="<?php echo $tempID ?>"><?php echo $category ?></option>

            <?php
              }
            ?>
            </select>
          </div>

          <div class="form-group">
            <label> Classification Name</label>
            <input type="text" class="form-control" value="<?php echo $classification ?>" name="classification-name" placeholder="Enter Classification" maxlength="40" required>
          </div>

      </div>

      <div class="modal-footer">
          <!-- <p style="color: red; font-style: italic">Note: All fields with <span class="glyphicon glyphicon-asterisk" style="color:red;  font-size: 10px"></span> are Required</p> -->
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal" name="btn-cancel">Close</button>
          <input type="submit" class="btn btn-success" name="btn-edit" value="Edit">
          <input type="hidden" name="classification-id" value="<?php echo $classificationID ?>">
        </form>

      </div>
    </div>
  </div>
</div>


<?php

  }

  if (isset($_POST['btn-edit'])) {
    require '../parts/php/product-classification/edit.php';
  }

 ?>
