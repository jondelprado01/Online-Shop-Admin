<div class="col-6">
  <h4 style="font-style: italic">Data Table</h4>
</div>

<div class="col-3">
  <form role="form" class="form-inline" method="post" autocomplete="off">

    <div class="form-group">
      <label>Status: </label>
      <select name="select-status" class="form-control">
        <?php

        $select_status = isset($_GET['select-status'])? $_GET['select-status'] : "Active";

        if($select_status == "Active"){
          $active = "selected";
          $inactive = "";
        }else{
          $active = "";
          $inactive = "selected";
        }
      ?>
          <option value="Active" <?php echo "$active";?>>Active</option>
          <option value="Inactive" <?php echo "$inactive";?>>Inactive</option>
        </select>
      </div>

      <div class="form-group">
        <div class="input-group">
          <input type="submit" class="btn btn-primary" name="btn-status" value="Go"/>
        </div>
      </div>

    </form>
  </div>
