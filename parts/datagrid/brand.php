<?php

  require '../connection.php';
  require '../parts/modals/brand/new.php';
  require '../parts/modals/brand/edit.php';
  require '../parts/modals/brand/delete.php';
  require '../parts/modals/brand/retrieve.php';
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
                <button data-target="#new-brand" data-toggle="modal" class="btn btn-success btn-md pull-right">
                  New <i class="fa fa-plus"></i></button>
              </div>

          </div>

        </div>

        <div class="card-body">

          <table id="brand-table" class="table table-bordered table-hover">
            <thead style="background-color: #5f646d; color: white; text-shadow: 0px 0px 3px black;">
              <tr>
                <th>Brand ID</th>
                <th>Brand Name</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $result = mysqli_query($conn,"SELECT * FROM brand_table
                          WHERE brand_status='Active' ORDER by brand_id ASC");

                $num = mysqli_num_rows($result);

                if($num > 0){

                    while ($row = mysqli_fetch_array($result)) {

                      $brand_id = $row['brand_id'];
                      $brand =  $row['brand_name'];
                      $brand_status = $row['brand_status'];

                      if($select_status == "Active"){

              ?>

                        <tr>
                          <td><?php echo $brand_id ?></td>
                          <td><?php echo $brand ?></td>
                          <td><?php echo $brand_status ?></td>
                          <td>
                            <a href="#" data-toggle="modal" data-target="#edit-brand<?php echo $brand_id ?>" >
                              <button class="btn btn-primary btn-xs">Edit</button>
                            </a>

                            <a href="#" data-toggle="modal" data-target="#delete-brand<?php echo $brand_id ?>" >
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

                 $result = mysqli_query($conn,"SELECT * FROM brand_table WHERE brand_status='Inactive'");

                     while ($row = mysqli_fetch_array($result)) {
                       $brand_id = $row['brand_id'];
                       $brand = $row['brand_name'];
                       $brand_status = $row['brand_status'];

              ?>

                      <tr>
                        <td><?php echo $brand_id ?></td>
                        <td><?php echo $brand ?></td>
                        <td><?php echo $brand_status ?></td>
                        <td>
                          <a href="#" data-toggle="modal" data-target="#retrieve-brand<?php echo $brand_id ?>" >
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
    $('#brand-table').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });
</script>
