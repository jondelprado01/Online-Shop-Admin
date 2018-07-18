<?php

  $retrieveBrand = mysqli_query($conn, "SELECT * FROM brand_table WHERE brand_status = 'Inactive'");

    while ($row = mysqli_fetch_array($retrieveBrand)) {
      $brand_id = $row['brand_id'];
      $brand = $row['brand_name'];

?>

  <div class="modal fade" id="retrieve-brand<?php echo $brand_id ?>"  role="dialog" style="width: 100%" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">
            Retrieve Brand
          </h5>
        </div>

        <div class="modal-body">

          <form role="form" method="post" autocomplete="off" >

            <h4 align="center">Are you sure do you want to retrieve: </h4>
            <h4 style="font-style: italic; color: blue" align="center">"<?php echo $brand ?>"</h4>

        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal" name="btn-cancel">Close</button>
            <input type="submit" class="btn btn-success" name="btn-retrieve" value="Retrieve">
            <input type="hidden"  name="brand-id" value="<?php echo $brand_id ?>">
            <input type="hidden"  name="brand-name" value="<?php echo $brand ?>">
          </form>

        </div>
      </div>
    </div>
  </div>

<?php
}


if (isset($_POST['btn-retrieve'])) {
  require '../parts/php/brand/retrieve.php';
}
?>
