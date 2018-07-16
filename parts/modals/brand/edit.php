<?php

  $retrieveBrand = mysqli_query($conn, "SELECT * FROM brand_table WHERE brand_status = 'Active'");

    while ($row = mysqli_fetch_array($retrieveBrand)) {
      $id = $row['brand_id'];
      $brand = $row['brand_name'];

?>

  <div class="modal fade" id="edit-brand<?php echo $id ?>"  role="dialog" style="width: 100%" aria-hidden="true">
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
            <!-- <p style="color: red; font-style: italic">Note: All fields with <span class="glyphicon glyphicon-asterisk" style="color:red;  font-size: 10px"></span> are Required</p> -->
            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal" name="btn-cancel" onclick="reset()">Close</button>
            <input type="submit" class="btn btn-success" name="btn-edit" value="Edit">
            <input type="hidden"  name="brand-id" value="<?php echo $id ?>">
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
