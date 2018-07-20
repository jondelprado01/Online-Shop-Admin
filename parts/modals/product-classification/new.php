<div class="modal fade" id="new-classification"  role="dialog" style="width: 100%" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          New Product Classification
        </h5>
      </div>

      <div class="modal-body">

        <form role="form" method="post" autocomplete="off" >

          <div class="form-group">
            <label> Product Group</label>

            <select class="form-control category-group" name="category-group" required>

            </select>

          </div>

          <div class="form-group">
            <label> Product Category</label>

            <select class="form-control category-name" name="category-name" required>

            </select>

          </div>

          <div class="form-group">
            <label> Classification Name</label>
            <input type="text" class="form-control classification-name" name="classification-name"
                   placeholder="Enter Classification" maxlength="40" required>
          </div>

      </div>

      <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal" name="btn-cancel">Close</button>
          <input type="submit" class="btn btn-success" name="btn-save" value="Save">
        </form>

      </div>
    </div>
  </div>
</div>


<?php

  if (isset($_POST['btn-save'])) {
    require '../parts/php/product-classification/new.php';
  }

 ?>


<script>

  function Group(){
    $('.category-group').empty();
    $('.category-group').append("<option value=''>Loading....</option>");
    $.ajax({

        type: "POST",
        cache:'false',
        url: "../parts/php/product-classification/retrieve-group.php",
        contentType: "application/json; charset=utf-8",
        dataType: "json",

        success: function(data_group){
          $('.category-group').empty();
          $('.category-group').append("<option value = ''>--Select Category Group--</option>");
          $.each(data_group,function(i,item){
            $('.category-group').append('<option value = "'+ data_group[i].group_id +'">'+ data_group[i].group_name +'</option>');
          });
        },
      complete: function(){
      }
    });
  }

  function Category(cat){
    $('.category-name').empty();
    $('.category-name').append("<option value='None'>Loading....</option>");
    $.ajax({

        type: "POST",
        cache:'false',
        url: "../parts/php/product-classification/retrieve-category.php?cat="+cat,
        contentType: "application/json; charset=utf-8",
        dataType: "json",

        success: function(data_category){
          $('.category-name').empty();
          $('.category-name').append("<option value = ''>--Select Category--</option>");
          $.each(data_category,function(i,item){
            $('.category-name').append('<option value = "'+ data_category[i].category_id +'">'+ data_category[i].category_name +'</option>');
          });
        },
      complete: function(){
      }
    });
  }

  $(document).ready(function(){
  Group();
  $(".category-group").change(function(){
    var category_group_id = $(".category-group").val();
    Category(category_group_id);
  });
});


</script>














<!-- end -->
