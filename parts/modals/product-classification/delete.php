<?php

  $retrieveClassification = mysqli_query($conn, "SELECT * FROM product_classification_table
                            WHERE product_classification_status = 'Active'");

  while ($row = mysqli_fetch_array($retrieveClassification)) {
    $classificationID = $row['product_classification_id'];
    $classification = $row['product_classification'];


?>

    <div class="modal fade" id="delete-classification<?php echo $classificationID ?>"  role="dialog" style="width: 100%" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">
              Delete Product Classification
            </h5>
          </div>

          <div class="modal-body">

            <form role="form" method="post" autocomplete="off" >

              <h4 align="center">Are you sure do you want to delete: </h4>
              <h4 style="font-style: italic; color: blue" align="center">"<?php echo $classification ?>"</h4>

          </div>

          <div class="modal-footer">
              <button type="button" class="btn btn-danger pull-left" data-dismiss="modal" name="btn-cancel">Close</button>
              <input type="submit" class="btn btn-success" name="btn-delete" value="Delete">
              <input type="hidden"  name="classification-id" value="<?php echo $classificationID ?>">
            </form>

          </div>
        </div>
      </div>
    </div>

<?php
  }

  if (isset($_POST['btn-delete'])) {
    require '../parts/php/product-classification/delete.php';
  }

 ?>
