<?php

  $classification_id = $_POST['classification-id'];
  $classification = $_POST['classification-name'];
  $category_id = $_POST['category-id'];

  $checkRecord = mysqli_query($conn, "SELECT COUNT(*) FROM product_classification_table
                 WHERE product_classification = '$classification' AND product_category_id = '$category_id'
                 AND product_classification_status = 'Active'");

  $row = mysqli_fetch_row($checkRecord);

  if ($row[0] == 0) {

      mysqli_query($conn, "UPDATE product_classification_table SET product_classification_status = 'Active'
      WHERE product_classification_id = '$classification_id'");

?>
  <script>
    alertify.alert()
      .setting({
        'title':'Record Retrieved',
        'label':'Exit',
        'message': 'Record Retrieved Successfully' ,
        'onok': function(){
          alertify.success('Retrieved');
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
        'title':'Retrieving Failed',
        'label':'Exit',
        'message': 'Sorry, Same active record is already existing!',
        'onok': function(){ alertify.error('Failed');}
    }).show();
  </script>
<?php
  }

 ?>
