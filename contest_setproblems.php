<?php
?>
<html>
<head>
<script src='jquery-3.1.0.js'></script>
<script>
function addsourcefile()
{
	var description = document.getElementById('description').value;
	var constraints = document.getElementById('constraints').value;
	var demo_input = document.getElementById('demo_input').value;
	var demo_output = document.getElementById('demo_output').value;
	var timelimit = document.getElementById('time_limit').value;
	var sourcelimit = document.getElementById('source_limit').value;
}
function getcontent()
{
    var files = document.getElementById('temp');
    var s = $(files).find('input:file');
    var l = s.length;
    var file = s[l-1].files[0]
   if (file) {
      var reader = new FileReader();
  reader.addEventListener('load', function() {
    alert(this.result);
  });
  reader.readAsText(file);
}
}
function addmoresubtask()
{
    $("#temp").append("Enter subtask input<input type=\"file\" class='subtaskfile' name=\"subtask\"><br><input type=\"button\" onclick=\"getcontent();\">Add  Subtask<input type=\"button\" onclick=\"addsubtask();\">Add More Subtask");
}
</script>
</head>
<body>
<form>
Description::<input type="text" name="description" id="description"><br>
Constraints::<input type="text" name="constraints" id="constraints"><br>
demo_input::<input type="text" name="demo_input" id="demo_input"><br>
demo_output::<input type="text" name="demo_output" id="demo_output"><br>
Time Limit::<input type="number" name="time_limit" id="time_limit"><br>
Source Limit::<input type="number" name="source_limit" id="source_limit"><br>
Please Provide Your Source Code File<input type="file" name="inputfile" id="inputfile"><br>
<input type="button" onclick="addsourcefile();">Add Source Code<br><br><br>
<temp id="temp">
Enter subtask input<input type="file" class="subtaskfile" name="subtask"><br>
<input type="button" onclick="getcontent();">Add  Subtask
<input type="button" onclick="addmoresubtask();">Add More Subtask
</temp>
</form>
</body>
</html>