<?php

  require '../connection.php';

  $brand = $_POST['brand-name'];

  $checkRecord = mysqli_query($conn, "SELECT COUNT(*) FROM brand_table
                 WHERE brand_name = '$brand' AND brand_status = 'Active'");

  $row = mysqli_fetch_row($checkRecord);

  if ($row[0] == 0) {

    mysqli_query($conn, "INSERT INTO brand_table VALUES('', '$brand', 'Active')");

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
