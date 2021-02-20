<?php require_once "web/header.php"; ?>
 <h3>Add Student</h3>

<form name="addForm" method="post" action="" onSubmit="return validate();">
    <div>
        <label>First Name</label>
		<input type="text" name="first-name" id="first-name">
    </div>
    <div>
        <label>Last Name</label>
		<input type="text" name="last-name" id="last-name">
    </div>
    <div>
        <label>Date of Birth</label>
        <input type="date" name="dob" id="dob">
    </div>
    <div>
        <label>Contact No</label>
        <input type="text" name="phone" id="phone">
    </div>
    <div>
        <input type="submit" name="add" id="btnSubmit" value="Submit" />
    </div>
    </div>
</form>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function validate() {
    var valid = true;
    
    if(!$("#first-name").val()) {
        $("#first-name").css('background-color','#FFFFDF');
        valid = false;
    }
    
    if(!$("#last-name").val()) {
        $("#last-name").css('background-color','#FFFFDF');
        valid = false;
    }
	
    if(!$("#dob").val()) {
        $("#dob").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#phone").val()) {
        $("#phone").css('background-color','#FFFFDF');
        valid = false;
    }   
    return valid;
}
</script>
</body>
</html>