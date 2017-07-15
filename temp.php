<div class="col-xs-12">
  <div class="col-xs-2">
    <input type="radio" name="prob" value="coding" id="coding"> Code
  </div>
  <div class="col-xs-2">
    <input type="radio" name="prob" value="mcq" id="mcq"> MCQ
  </div>
  <div class="col-xs-2">
    <input type="radio" name="prob" value="subjective" id="subjective"> Subjective
  </div>
</div>

<div class="col-xs-12 codeformdiv"><!--mcq-->
<form class="form-horizontal">
  <div class="form-group">
    <label class="col-sm-2 control-label no">Problem Statement :</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="" rows="2" cols="57" required></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label no">Option A: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="" required>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label no">Option B: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="" required>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label no">Option C: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="" required>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label no">Option D: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="" required>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label no">Answer: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="" required placeholder="Enter Correct Option">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-4 col-sm-push-4">
      <center><button class="btn btn-danger">Upload +</button></center>
    </div>
  </div>
</form>
</div><!-- mcq -->
<div class="col-xs-12 codeformdiv"><!--subjective-->
<form class="form-horizontal">
  <div class="form-group">
    <label class="col-sm-2 control-label no">Problem Statement :</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="" rows="4" cols="57" required></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-4 col-sm-push-4">
      <center><button class="btn btn-danger">Upload +</button></center>
    </div>
  </div>
</form>
</div><!-- subjective -->