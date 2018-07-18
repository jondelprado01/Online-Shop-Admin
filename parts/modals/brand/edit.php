<?php

  $retrieveBrand = mysqli_query($conn, "SELECT * FROM brand_table WHERE brand_status = 'Active'");

    while ($row = mysqli_fetch_array($retrieveBrand)) {
      $brand_id = $row['brand_id'];
      $brand = $row['brand_name'];

?>

  <div class="modal fade" id="edit-brand<?php echo $brand_id ?>"  role="dialog" style="width: 100%" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">
            Edit Brand
          </h5>
        </div>

        <div class="modal-body">

          <form role="form" method="post" autocomplete="off" >

            <div class="form-group ">
              <label> Brand Name</label>
              <input type="text" value="<?php echo $brand ?>" class="form-control" name="brand-name" placeholder="Enter Brand Name" maxlength="40">
            </div>

        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal" name="btn-cancel">Close</button>
            <input type="submit" class="btn btn-success" name="btn-edit" value="Edit">
            <input type="hidden"  name="brand-id" value="<?php echo $brand_id ?>">
          </form>

        </div>
      </div>
    </div>
  </div>


<?php

    }


    if (isset($_POST['btn-edit'])) {
      require '../parts/php/brand/edit.php';
    }


 ?>













 <!-- end -->
