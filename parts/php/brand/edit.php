<?php

  require '../connection.php';

  $brand_id = $_POST['brand-id'];
  $brand = $_POST['brand-name'];
  $brand_status = "Active";

  $checkRecord = mysqli_query($conn, "SELECT COUNT(*) FROM brand_table
                 WHERE brand_name = '$brand' AND brand_status = 'Active'");

  $row = mysqli_fetch_row($checkRecord);

  if ($row[0] == 0) {

    mysqli_query($conn, "UPDATE brand_table SET brand_name = '$brand'
    WHERE brand_id = '$brand_id' AND brand_status = '$brand_status'");

?>

  <script>
    alertify.alert()
      .setting({
        'title':'Record Edited',
        'label':'Exit',
        'message': 'Record Edited Successfully' ,
        'onok': function(){
          alertify.success('Edited');
          window.location = 'brand.php';
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
        'message': 'No changes were made!' ,
        'onok': function(){ alertify.error('Failed');}
    }).show();
  </script>

<?php
  }

 ?>
