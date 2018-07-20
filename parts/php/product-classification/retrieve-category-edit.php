<?php

require '../connection.php';

$retrieveCategory_edit = mysqli_query($conn, "SELECT pc.product_category, pc.product_category_id, pg.product_group_id
                    FROM product_category_table pc INNER JOIN product_group_table pg ON pc.product_group_id = pg.product_group_id
                    WHERE pg.product_group_id = '".$_GET['cat_edit']."';");

      if(mysqli_num_rows($retrieveCategory_edit)){

        $data_category_edit = array();

          while ($row_edit_2 = mysqli_fetch_array($retrieveCategory_edit)) {

            $data_category_edit[] = array(

              'category_id_edit' => $row_edit_2['product_category_id'],
              'cat_edit' => $row_edit_2['product_group_id'],
              'category_name_edit' => $row_edit_2['product_category']
            );
          }
          header('Content-type: application/json');
          echo json_encode($data_category_edit);
      }


 ?>
