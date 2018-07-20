<?php

  require '../connection.php';

  $retrieveGroup_edit = mysqli_query($conn, "SELECT * FROM product_group_table WHERE product_group_status = 'Active'");

  if(mysqli_num_rows($retrieveGroup_edit)){

    $data_group_edit = array();

      while ($row_edit = mysqli_fetch_array($retrieveGroup_edit)) {

        $data_group_edit[] = array(
          'group_id_edit' => $row_edit['product_group_id'],
          'group_name_edit' => $row_edit['product_group']
        );

      }
      header('Content-type: application/json');
      echo json_encode($data_group_edit);
  }


 ?>
