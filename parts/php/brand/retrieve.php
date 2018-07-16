<?php

  $id = $_POST['brand-id'];
  $brand = $_POST['brand-name'];

  $checkRecord = mysqli_query($conn, "SELECT COUNT(*) FROM brand_table WHERE brand_name = '$brand' AND brand_status = 'Active'");

  $row = mysqli_fetch_row($checkRecord);

  if ($row[0] == 0) {

      mysqli_query($conn, "UPDATE brand_table SET brand_status = 'Active' WHERE brand_id = '$id'");

?>
  <script>
    alertify.alert()
      .setting({
        'title':'Record Retrieved',
        'label':'Exit',
        'message': 'Record Retrieved Successfully' ,
        'onok': function(){
          alertify.success('Retrieved');
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
        'title':'Retrieving Failed',
        'label':'Exit',
        'message': 'Sorry, Same active record is already existing!',
        'onok': function(){ alertify.error('Failed');}
    }).show();
  </script>
<?php
  }

 ?>
