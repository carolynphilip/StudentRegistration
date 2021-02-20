<?php require_once "web/header.php"; ?>
 <h3>Add Course</h3>
 <form name="addForm" method="post" action="" onSubmit="return validate();">
    <div style="padding-top: 20px;">
        <label>Course Name</label>
		<input type="text" name="course-name" id="course-name">
    </div>
    <div>
        <label>Course Details</label>
		<textarea type="text" name="course-detail" id="course-detail"> </textarea>

    </div>
    <div>
        <input type="submit" name="add" id="btnSubmit" value="Submit" />
    </div>
    </div>
</form>

<script src="https://code.jquery.com/jquery-2.1.1.min.js"
    type="text/javascript"></script>
	
<script>
function validate() {
    var valid = true;       
    if(!$("#course-name").val()) {
        $("#course-name").css('background-color','#FFFFDF');
        valid = false;
    }
    
    if(!$("#course-detail").val().trim().length) {
        $("#course-detail").css('background-color','#FFFFDF');
        valid = false;
    }
    return valid;
}
</script>
</body>
</html>