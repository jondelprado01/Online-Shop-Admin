<?php

  $retrieveClassification = mysqli_query($conn, "SELECT * FROM product_classification_table
                            WHERE product_classification_status = 'Inactive'");

  while ($row = mysqli_fetch_array($retrieveClassification)) {

    $classification_id = $row['product_classification_id'];
    $classification = $row['product_classification'];
    $category_id = $row['product_category_id'];


?>

    <div class="modal fade" id="retrieve-classification<?php echo $classification_id ?>"  role="dialog" style="width: 100%" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">
              Retrieve Product Classification
            </h5>
          </div>

          <div class="modal-body">

            <form role="form" method="post" autocomplete="off" >

              <h4 align="center">Are you sure do you want to retrieve: </h4>
              <h4 style="font-style: italic; color: blue" align="center">"<?php echo $classification ?>"</h4>

          </div>

          <div class="modal-footer">
              <button type="button" class="btn btn-danger pull-left" data-dismiss="modal" name="btn-cancel">Close</button>
              <input type="submit" class="btn btn-success" name="btn-retrieve" value="Retrieve">
              <input type="hidden"  name="classification-id" value="<?php echo $classification_id ?>">
              <input type="hidden"  name="classification-name" value="<?php echo $classification ?>">
              <input type="hidden"  name="category-id" value="<?php echo $category_id ?>">
            </form>

          </div>
        </div>
      </div>
    </div>

<?php
  }

  if (isset($_POST['btn-retrieve'])) {
    require '../parts/php/product-classification/retrieve.php';
  }

 ?>
