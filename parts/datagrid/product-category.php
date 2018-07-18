<?php

  require '../connection.php';
  require '../parts/modals/product-category/new.php';
  require '../parts/modals/product-category/edit.php';
  require '../parts/modals/product-category/delete.php';
  require '../parts/modals/product-category/retrieve.php';

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
                <button data-target="#new-category" data-toggle="modal" class="btn btn-success btn-md pull-right">
                  New <i class="fa fa-plus"></i></button>
              </div>

          </div>

        </div>

        <div class="card-body">

          <table id="category-table" class="table table-bordered table-hover">
            <thead style="background-color: #5f646d; color: white; text-shadow: 0px 0px 3px black;">
              <tr>
                <th>Category ID</th>
                <th>Category Name</th>
                <th>Category Group</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $result = mysqli_query($conn,"SELECT * FROM product_category_table
                          WHERE product_category_status='Active' ORDER by product_category_id ASC");

                $num = mysqli_num_rows($result);

                if($num > 0){

                    while ($row = mysqli_fetch_array($result)) {

                      $category_id = $row['product_category_id'];
                      $category =  $row['product_category'];
                      $group =  $row['product_category_group'];
                      $category_status = $row['product_category_status'];

                      if($select_status == "Active"){

                ?>
                        <tr>
                          <td><?php echo $category_id ?></td>
                          <td><?php echo $category ?></td>
                          <td><?php echo $group ?></td>
                          <td><?php echo $category_status ?></td>
                          <td>
                            <a href="#" data-toggle="modal" data-target="#edit-category<?php echo $category_id ?>" >
                              <button class="btn btn-primary btn-xs">Edit</button>
                            </a>

                            <a href="#" data-toggle="modal" data-target="#delete-category<?php echo $category_id ?>" >
                              <button class="btn btn-danger btn-xs">Delete</button>
                            </a>
                          </td>
                        </tr>
                <?php

                      }
                    }
                  }
                  if(isset($_POST['btn-status'])){

                   $select_status = $_POST['select-status'];

                   if($select_status == "Inactive"){

                     $result = mysqli_query($conn, "SELECT * FROM product_category_table
                               WHERE product_category_status='Inactive'");

                         while ($row = mysqli_fetch_array($result)) {

                           $category_id = $row['product_category_id'];
                           $category = $row['product_category'];
                           $group = $row['product_category_group'];
                           $category_status = $row['product_category_status'];

              ?>
                          <tr>
                            <td><?php echo $category_id ?></td>
                            <td><?php echo $category ?></td>
                            <td><?php echo $group ?></td>
                            <td><?php echo $category_status ?></td>
                            <td>
                              <a href="#" data-toggle="modal" data-target="#retrieve-category<?php echo $category_id ?>" >
                                <button class="btn btn-warning btn-xs">Retrieve</button>
                              </a>
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
    $('#category-table').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });
</script>
