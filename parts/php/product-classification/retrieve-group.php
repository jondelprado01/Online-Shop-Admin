<?php
  require '../connection.php';

  $retrieveGroup = mysqli_query($conn, "SELECT * FROM product_group_table WHERE product_group_status = 'Active'");

  if(mysqli_num_rows($retrieveGroup)){

    $data_group = array();

      while ($row = mysqli_fetch_array($retrieveGroup)) {

        $data_group[] = array(
          'group_id' => $row['product_group_id'],
          'group_name' => $row['product_group']
        );

      }
      header('Content-type: application/json');
      echo json_encode($data_group);
  }

?>
