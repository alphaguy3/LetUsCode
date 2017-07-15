<div class="collapse" id="collapseform" style="background:#f5f5f5">
  <div class="col-xs-12 codeformdiv"><!-- codeformdiv-->
  
  <form class="form-horizontal" method="post" action="add_contest.php">
    
    <div class="col-xs-12">
      <div class="form-group col-xs-4">
        <label class="col-sm-2 control-label no">Contest Name:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="contestname" name="contestname" required>
        </div>
      </div>
      <div class="form-group col-xs-4">
        <label class="col-sm-2 control-label no">Setter Name:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="settername" name="settername" required>
        </div>
      </div>
      <div class="form-group col-xs-4">
        <label class="col-sm-2 control-label no">Tester Name:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="testername" name="testername" required>
        </div>
      </div>
    </div>
    <div class="form-group col-xs-12">
      <label class="col-sm-1 control-label no">Description: </label>
      <div class="col-sm-11">
        <textarea class="form-control" id="description" name="description" rows="15" cols="100" required></textarea>
      </div>
    </div>
    <div class="col-xs-12">
      <div class="form-group col-xs-4">
        <label class="col-sm-2 control-label no">Date: </label>
        <div class="col-sm-10">
          <input type="date" class="form-control floating-label" id="date"  name="date"required>
        </div>
      </div>
      <div class="form-group col-xs-4">
        <label class="col-sm-2 control-label no">Start Time: </label>
        <div class="col-sm-10">
          <input type="time" class="form-control floating-label" id="starttime"  name="starttime" required>
        </div>
      </div>
      <div class="form-group col-xs-4">
        <label class="col-sm-2 control-label no">End Time: </label>
        <div class="col-sm-10">
          <input type="time" class="form-control floating-label" id="endtime" name="endtime" required>
        </div>
      </div>
    </div>
    <div class="col-sm-12">
      <center><button class="btn btn-danger" type="submit" value="submit">Create</button></center>
    </div>
    </form>

</div><!-- codeformdiv-->
</div>