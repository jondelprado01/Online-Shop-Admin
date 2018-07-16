<?php

  $retrieveCategory = mysqli_query($conn, "SELECT * FROM product_category_table
                      WHERE product_category_status = 'Active'");

    while ($row = mysqli_fetch_array($retrieveCategory)) {
      $id = $row['product_category_id'];
      $category = $row['product_category'];

?>

  <div class="modal fade" id="delete-category<?php echo $id ?>"  role="dialog" style="width: 100%" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">
            Delete Product Category
          </h5>
        </div>

        <div class="modal-body">

          <form role="form" method="post" autocomplete="off" >

            <h4>Are you sure do you want to delete "<?php echo $category ?>"?</h4>

        </div>

        <div class="modal-footer">
            <!-- <p style="color: red; font-style: italic">Note: All fields with <span class="glyphicon glyphicon-asterisk" style="color:red;  font-size: 10px"></span> are Required</p> -->
            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal" name="btn-cancel">Close</button>
            <input type="submit" class="btn btn-success" name="btn-delete" value="Delete">
            <input type="hidden"  name="category-id" value="<?php echo $id ?>">
          </form>

        </div>
      </div>
    </div>
  </div>

<?php
}


if (isset($_POST['btn-delete'])) {
  require '../parts/php/product-category/delete.php';
}
?>
