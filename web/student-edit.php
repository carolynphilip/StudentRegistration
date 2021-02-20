<?php require_once "web/header.php"; ?>
 <h3>Edit Student</h3>

<form name="addForm" method="post" action="" onSubmit="return validate();">
    <div>
        <label style="padding-top: 20px;">First Name</label>
		<input type="text" name="first-name" id="first-name" value="<?php echo $result[0]["FirstName"]; ?>">
    </div>
    <div>
        <label>Last Name</label>
		<input type="text" name="last-name" id="last-name" value="<?php echo $result[0]["LastName"]; ?>">
    </div>
    <div>
        <label>Date of Birth</label>
        <input type="text" name="dob" id="dob" value="<?php echo $result[0]["DOB"]; ?>">
    </div>
    <div>
        <label>Contact No</label>
        <input type="text" name="phone" id="phone" value="<?php echo $result[0]["Phone"]; ?>">
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
    
    if(!$("#first-name").val()) {
        $("#first-name-info").html("(required)");
        $("#first-name").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#last-name").val()) {
        $("#last-name-info").html("(required)");
        $("#last-name").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#dob").val()) {
        $("#dob-info").html("(required)");
        $("#dob").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#phone").val()) {
        $("#phone-info").html("(required)");
        $("#phone").css('background-color','#FFFFDF');
        valid = false;
    }   
    return valid;
}
</script>
    </body>
    </html>