<div class="modal fade" id="newCategory"  role="dialog" style="width: 100%" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          New Product Category
        </h5>
      </div>

      <div class="modal-body">

        <form class="categoryform" role="form" method="post" autocomplete="off" >

          <div class="form-group ">
            <label> Category Name</label>
            <input type="text" class="form-control" name="category_name" placeholder="Enter Product Category" maxlength="40">
          </div>

          <div class="form-group">
            <label> Category Group</label>
            <select class="form-control" name="category_group">
              <option value="None">--Select a Group--</option>
              <option value="Accessories">Accessories</option>
              <option value="Components">Components</option>
              <option value="Laptops">Laptops</option>
              <option value="Network Hardwares">Network Hardwares</option>
              <option value="Peripherals">Peripherals</option>
            </select>
          </div>

          <div class="row">

            <div class="form-group col-md-12">
              <label>Category Description</label>
              <textarea class="form-control" rows="3" placeholder="Enter Description" name="category_desc" maxlength="100"></textarea>
            </div>

          </div>

      </div>

      <div class="modal-footer">
          <!-- <p style="color: red; font-style: italic">Note: All fields with <span class="glyphicon glyphicon-asterisk" style="color:red;  font-size: 10px"></span> are Required</p> -->
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal" name="btn-cancel" onclick="reset()">Close</button>
          <input type="submit" class="btn btn-success" name="btn-save" value="Save">
        </form>

      </div>
    </div>
  </div>
</div>


<?php

  if (isset($_POST['btn-save'])) {
    require '../parts/php/product-category/new.php';
  }

 ?>

















<!-- end -->
