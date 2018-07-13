<?php

  require '../connection.php';
  require '../parts/modals/product-classification/new.php';

 ?>

<section class="content">

  <div class="row">

    <div class="col-12">

      <div class="card">

        <div class="card-header">

          <div class="row">

            <div class="col-6">
              <form method="post">
                <div class="input-group">
                  <input type="text" class="form-control" name="search" placeholder="Search Item" required>
                  <div class="input-group-button">
                    <button type="submit" class="btn btn-default" name="btn-search">
                      <i class="fa fa-search"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>

            <div class="col-6">
              <button data-target="#newClassification" data-toggle="modal" class="btn btn-success btn-md pull-right">
                New <i class="fa fa-plus"></i></button>
            </div>

          </div>

        </div>

        <div class="card-body">

          <table id="example1" class="table table-bordered table-hover">
            <thead style="background-color: #428bca; color: white; text-shadow: 0px 0px 3px black;">
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
                      $classification =  $row['product_classification'];
                      $categoryID =  $row['product_category_id'];
                      $id = $row['product_classification_id'];
                      $status = $row['product_classification_status'];

                      $result2 = mysqli_query($conn, "SELECT product_category FROM product_category_table
                                 WHERE product_category_id = '$categoryID' AND product_category_status = 'Active'");

                      while ($row2 = mysqli_fetch_array($result2)) {
                        $category = $row2['product_category'];
                      }
                      if($status == "Active"){
                        echo '<tr>';
                        echo '<td>' . $id . '</td>';
                        echo '<td>' . $classification . '</td>';
                        echo '<td>' . $category . '</td>';
                        echo '<td>' . $status . '</td>';
                        echo '<td>
                                <a href="#" data-toggle="modal" data-target="#updateClassification'.$id.'" >
                                      <button class="btn btn-primary btn-xs">
                                      Edit <span class="glyphicon glyphicon-pencil"></button>
                                </a>
                                <a href="#" data-toggle="modal" data-target="#deleteClassification'.$id.'" >
                                      <button class="btn  btn-danger btn-xs">
                                      Delete <span class="glyphicon glyphicon-remove"></button>
                                </a>
                              </td>';
                        echo '</tr>';
                      }
                    }
                  }
          //   if(isset($_POST['btnSearch'])){
          //    $status = $_POST['filter'];
          //    if($status == "Inactive"){
          //      $result = mysqli_query($con,"SELECT * FROM tblcategory WHERE status='Inactive'");
          //          while ($row = mysqli_fetch_array($result)) {
          //            $type =  $row['categoryType'];
          //            $desc =  $row['categoryDesc'];
          //            $specs =  $row['specification'];
          //            $class =  $row['classification'];
          //            $status = $row['status'];
          //            $id = $row['categoryID'];
          //            if($status == "Inactive"){
          //              echo '<tr>';
          //              echo '<td>' . $type . '</td>';
          //              echo '<td>' . $class . '</td>';
          //              echo '<td>' . $specs . '</td>';
          //              echo '<td>' . $desc . '</td>';
          //              echo '<td>' . $status . '</td>';
          //              echo '<td>
          //                      <a href="#" data-toggle="modal" data-target="#retrieveCategory'.$id.'" >
          //                            <button class="btn btn-warning btn-xs">
          //                            Retrieve <span class="glyphicon glyphicon-download"></button>
          //                      </a>
          //                    </td>';
          //              echo '</tr>';
          //    }
          //  }
          //  }
          // }
              ?>
            </tbody>
          </table>

        </div>

      </div>

    </div>

  </div>

</section>

<!-- <div class="box" style="overflow:auto; height: 650px">
  <div class="box-body" style="overflow-x: hidden">

  </div>
</div> -->

<script>
  $(function () {
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });
</script>
