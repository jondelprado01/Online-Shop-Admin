<?php

  require '../connection.php';

  $id = $_POST['classification-id'];
  $classification = $_POST['classification-name'];
  $category = $_POST['category-group'];


  $checkRecord = mysqli_query($conn, "SELECT COUNT(*) FROM product_classification_table
                 WHERE product_classification = '$classification' AND product_category_id = '$category'
                 AND product_classification_status = 'Active'");

  $row = mysqli_fetch_row($checkRecord);

  if ($row[0] == 0) {

    mysqli_query($conn, "UPDATE product_classification_table SET product_classification = '$classification',
    product_category_id = '$category' WHERE product_classification_id = '$id' AND product_classification_status = 'Active'");

?>

    <script>
      alertify.alert()
        .setting({
          'title':'Record Edited',
          'label':'Exit',
          'message': 'Record Edited Successfully' ,
          'onok': function(){
            alertify.success('Edited');
            window.location = 'product-classification.php';
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
