<?php

  require '../connection.php';
  require '../parts/modals/product-classification/new.php';
  require '../parts/modals/product-classification/edit.php';
  require '../parts/modals/product-classification/delete.php';
  require '../parts/modals/product-classification/retrieve.php';

 ?>

<section class="content">

  <div class="row">

    <div class="col-12">

      <div class="card">

        <div class="card-header">

          <div class="row">

            <?php

            require '../parts/common/navbar.php';

             ?>

            <div class="col-3">
              <button data-target="#new-classification" data-toggle="modal" class="btn btn-success btn-md pull-right">
                New <i class="fa fa-plus"></i></button>
            </div>

          </div>

        </div>

        <div class="card-body">

          <table id="classification-table" class="table table-bordered table-hover">
            <thead style="background-color: #5f646d; color: white; text-shadow: 0px 0px 3px black;">
              <tr>
                <th>Classification ID</th>
                <th>Classification Name</th>
                <th>Category</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $result = mysqli_query($conn,"SELECT * FROM product_classification_table
                          WHERE product_classification_status='Active' ORDER by product_classification_id ASC");

                $num = mysqli_num_rows($result);

                if($num > 0){

                    while ($row = mysqli_fetch_array($result)) {

                      $classification_id = $row['product_classification_id'];
                      $classification =  $row['product_classification'];
                      $category_id =  $row['product_category_id'];
                      $classification_status = $row['product_classification_status'];

                      $result2 = mysqli_query($conn, "SELECT product_category FROM product_category_table
                                 WHERE product_category_id = '$category_id' AND product_category_status = 'Active'");

                      while ($row2 = mysqli_fetch_array($result2)) {
                        $category = $row2['product_category'];
                      }

                      if($select_status == "Active"){
                ?>
                        <tr>
                          <td><?php echo $classification_id ?></td>
                          <td><?php echo $classification ?></td>
                          <td><?php echo $category ?></td>
                          <td><?php echo $classification_status ?></td>
                          <td>
                            <a href="#" data-toggle="modal" data-target="#edit-classification<?php echo $classification_id ?>" >
                              <button class="btn btn-primary btn-xs">Edit</button></a>

                            <a href="#" data-toggle="modal" data-target="#delete-classification<?php echo $classification_id ?>" >
                              <button class="btn  btn-danger btn-xs">Delete</button></a>
                          </td>
                        </tr>
                <?php
                      }
                    }
                  }
                  if(isset($_POST['btn-status'])){

                   $select_status = $_POST['select-status'];

                   if($select_status == "Inactive"){

                     $result = mysqli_query($conn,"SELECT * FROM product_classification_table
                               WHERE product_classification_status='Inactive' ORDER by product_classification_id ASC");

                         while ($row = mysqli_fetch_array($result)) {

                           $classification_id = $row['product_classification_id'];
                           $classification =  $row['product_classification'];
                           $category_id =  $row['product_category_id'];
                           $classification_status = $row['product_classification_status'];

                           $result2 = mysqli_query($conn, "SELECT product_category FROM product_category_table
                                      WHERE product_category_id = '$category_id' AND product_category_status = 'Active'");

                           while ($row2 = mysqli_fetch_array($result2)) {
                             $category = $row2['product_category'];
                           }

                  ?>

                        <tr>
                          <td><?php echo $classification_id ?></td>
                          <td><?php echo $classification ?></td>
                          <td><?php echo $category ?></td>
                          <td><?php echo $classification_status ?></td>
                          <td>
                            <a href="#" data-toggle="modal" data-target="#retrieve-classification<?php echo $classification_id ?>" >
                              <button class="btn btn-warning btn-xs">Retrieve</button></a>
                          </td>
                        </tr>

                  <?php
                      }
                    }
                  }
              ?>
            </tbody>
          </table>

        </div>

      </div>

    </div>

  </div>

</section>

<script>
  $(function () {
    $('#classification-table').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });
</script>
