<?php

  require '../connection.php';
  // require '../parts/modals/brand/new.php';
  // require '../parts/modals/brand/edit.php';
  // require '../parts/modals/brand/delete.php';
  // require '../parts/modals/brand/retrieve.php';
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
                <button data-target="#new-supplier" data-toggle="modal" class="btn btn-success btn-md pull-right">
                  New <i class="fa fa-plus"></i></button>
              </div>

          </div>

        </div>

        <div class="card-body">

          <table id="supplier-table" class="table table-bordered table-hover">
            <thead style="background-color: #5f646d; color: white; text-shadow: 0px 0px 3px black;">
              <tr>
                <th>Supplier ID</th>
                <th>Supplier Name</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $result = mysqli_query($conn,"SELECT * FROM supplier_table
                          WHERE supplier_status='Active' ORDER by supplier_id ASC");

                $num = mysqli_num_rows($result);

                if($num > 0){

                    while ($row = mysqli_fetch_array($result)) {

                      $supplier_id = $row['supplier_id'];
                      $supplier =  $row['supplier_name'];
                      $supplier_status = $row['supplier_status'];

                      if($select_status == "Active"){

              ?>

                        <tr>
                          <td><?php echo $supplier_id ?></td>
                          <td><?php echo $supplier ?></td>
                          <td><?php echo $supplier_status ?></td>
                          <td>
                            <a href="#" data-toggle="modal" data-target="#edit-supplier<?php echo $supplier_id ?>" >
                              <button class="btn btn-info btn-xs">View</button>
                            </a>

                            <a href="#" data-toggle="modal" data-target="#edit-supplier<?php echo $supplier_id ?>" >
                              <button class="btn btn-primary btn-xs">Edit</button>
                            </a>

                            <a href="#" data-toggle="modal" data-target="#delete-supplier<?php echo $supplier_id ?>" >
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

                 $result = mysqli_query($conn,"SELECT * FROM supplier_table WHERE supplier_status='Inactive'");

                     while ($row = mysqli_fetch_array($result)) {

                       $supplier_id = $row['supplier_id'];
                       $supplier =  $row['supplier_name'];
                       $supplier_status = $row['supplier_status'];

              ?>

                      <tr>
                        <td><?php echo $supplier_id ?></td>
                        <td><?php echo $supplier ?></td>
                        <td><?php echo $supplier_status ?></td>
                        <td>
                          <a href="#" data-toggle="modal" data-target="#retrieve-supplier<?php echo $supplier_id ?>" >
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
    $('#supplier-table').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });
</script>
