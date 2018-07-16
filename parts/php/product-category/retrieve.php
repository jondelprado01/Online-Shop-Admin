<?php

  $id = $_POST['category-id'];
  $category = $_POST['category-name'];

  $checkRecord = mysqli_query($conn, "SELECT COUNT(*) FROM product_category_table
                 WHERE product_category = '$category' AND product_category_status = 'Active'");

  $row = mysqli_fetch_row($checkRecord);

  if ($row[0] == 0) {

      mysqli_query($conn, "UPDATE product_category_table SET product_category_status = 'Active'
      WHERE product_category_id = '$id'");

?>
  <script>
    alertify.alert()
      .setting({
        'title':'Record Retrieved',
        'label':'Exit',
        'message': 'Record Retrieved Successfully' ,
        'onok': function(){
          alertify.success('Retrieved');
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
        'title':'Retrieving Failed',
        'label':'Exit',
        'message': 'Sorry, Same active record is already existing!',
        'onok': function(){ alertify.error('Failed');}
    }).show();
  </script>
<?php
  }

 ?>
