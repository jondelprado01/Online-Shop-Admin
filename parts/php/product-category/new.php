<?php

  require '../connection.php';

  $category = $_POST['category-name'];
  $group = $_POST['category-group'];
  $category_desc = $_POST['category-desc'];

  $checkRecord = mysqli_query($conn, "SELECT COUNT(*) FROM product_category_table
                 WHERE product_category = '$category' AND product_category_status = 'Active'");

  $row = mysqli_fetch_row($checkRecord);

  if ($row[0] == 0) {

    mysqli_query($conn, "INSERT INTO product_category_table VALUES('', '$category', '$group', '$category_desc', 'Active')");

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
