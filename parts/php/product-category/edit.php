<?php

  require '../connection.php';

  $id = $_POST['category-id'];
  $category = $_POST['category-name'];
  $group = $_POST['category-group'];
  $desc = $_POST['category-desc'];
  $status = "Active";

  $checkRecord = mysqli_query($conn, "SELECT COUNT(*) FROM product_category_table
                 WHERE product_category = '$category' AND product_category_desc = '$desc'
                 AND product_category_group = '$group' AND product_category_status = '$status'");

  $row = mysqli_fetch_row($checkRecord);

  if ($row[0] == 0) {

    mysqli_query($conn, "UPDATE product_category_table SET product_category = '$category',
                 product_category_group = '$group', product_category_desc = '$desc' WHERE product_category_id = '$id'
                 AND product_category_status = '$status'");

?>

  <script>
    alertify.alert()
      .setting({
        'title':'Record Edited',
        'label':'Exit',
        'message': 'Record Edited Successfully' ,
        'onok': function(){
          alertify.success('Edited');
          window.location = 'product-category.php';
        }
    }).show();
  </script>

<?php

  }
  else {
?>

  <script>
    alertify.alert()
      .setting({
        'title':'Editing Failed',
        'label':'Exit',
        'message': 'No changes were made!',
        'onok': function(){ alertify.error('Failed');}
    }).show();
  </script>

<?php
  }

 ?>
