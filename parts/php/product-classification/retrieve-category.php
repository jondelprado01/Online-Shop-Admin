<?php
require '../connection.php';

  $retrieveCategory = mysqli_query($conn, "SELECT pc.product_category, pc.product_category_id, pg.product_group_id
                      FROM product_category_table pc INNER JOIN product_group_table pg ON pc.product_group_id = pg.product_group_id
                      WHERE pg.product_group_id = '".$_GET['cat']."';");

        if(mysqli_num_rows($retrieveCategory)){
          $data_category = array();
            while ($row2 = mysqli_fetch_array($retrieveCategory)) {
              $data_category[] = array(

                'category_id' => $row2['product_category_id'],
                'cat' => $row2['product_group_id'],
                'category_name' => $row2['product_category']
              );
            }
            header('Content-type: application/json');
            echo json_encode($data_category);
        }

?>
