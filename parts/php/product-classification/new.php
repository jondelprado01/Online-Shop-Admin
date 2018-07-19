<?php

  require '../connection.php';

  $classification = $_POST['classification-name'];
  $category = $_POST['category-name'];

  $checkRecord = mysqli_query($conn, "SELECT COUNT(*) FROM product_classification_table
                 WHERE product_classification = '$classification' AND product_category_id = '$category'
                 AND product_classification_status = 'Active'");

  $row = mysqli_fetch_row($checkRecord);

  if ($row[0] == 0) {

    mysqli_query($conn, "INSERT INTO product_classification_table VALUES('', '$classification', 'Active', '$category')");

?>
    <script>
      alertify.alert()
        .setting({
          'title':'Record Saved',
          'label':'Exit',
          'message': 'Record Saved Successfully' ,
          'onok': function(){ alertify.success('Saved');}
      }).show();
    </script>

<?php

  }
  else {
?>
    <script>
      alertify.alert()
        .setting({
          'title':'Saving Failed',
          'label':'Exit',
          'message': 'Sorry, Record is already existing!' ,
          'onok': function(){ alertify.error('Failed');}
      }).show();
    </script>
<?php
  }

?>
