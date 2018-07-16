<?php

  require '../connection.php';

  $id = $_POST['brand-id'];
  $brand = $_POST['brand-name'];
  $status = "Active";

  $checkRecord = mysqli_query($conn, "SELECT COUNT(*) FROM brand_table WHERE brand_name = '$brand' AND brand_status = 'Active'");

  $row = mysqli_fetch_row($checkRecord);

  if ($row[0] == 0) {

    mysqli_query($conn, "UPDATE brand_table SET brand_name = '$brand' WHERE brand_id = '$id' AND brand_status = '$status'");

?>

  <script>
    alertify.alert()
      .setting({
        'title':'Record Edited',
        'label':'Exit',
        'message': 'Record Edited Successfully' ,
        'onok': function(){ alertify.success('Edited');}
    }).show();
    setTimeout(function(){
            window.location = 'brand.php';
          }, 3000);
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
