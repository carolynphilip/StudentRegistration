<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>

<?php require_once "web/header.php";

 $tablerow = '<tr><td><select name="student_id[]" >';
 foreach($students as $row)
 {
  $tablerow .= '<option value="'.$row["ID"].'">'.$row["FirstName"].'</option>';
 }
 $tablerow.= '</select>	</td>';

 $tablerow .= '<td><select name="course_id[]" >';
 foreach($courses as $row)
 {
  $tablerow .= '<option value="'.$row["ID"].'">'.$row["CourseName"].'</option>';
 }
 $tablerow.= '</select>	</td></tr>';
 

?>

<script type="text/javascript">
    function addItem() {
	    $("#tbody").append('<?php echo $tablerow; ?>');
	}
</script>


 <h3>Register for a course</h3>
 <form class="regForm" name="addForm" method="post" action="">
    <?php if (isset($response)) { ?>
    <div class="errorInfo">
        <span><?= $response["message"]  ?></span>
    </div>
    <?php } ?>
    <button type="button" onclick="addItem();"><img src="web/image/icon-plus.png" /></button>
	<table class="regTable">
        <tbody id="tbody">
        <tr>
            <th>Student Name</th>
            <th>Course Name</th>
        </tr>
		<tr>
            <td>
				<select name="student_id[]" > 
					<?php foreach($students as $std => $stdval){ ?>
						<option value="<?php echo $stdval['ID']?>"><?php echo $stdval['FirstName']; ?></option> 
					<?php } ?>
				</select>
			</td>
            <td>
				<select name="course_id[]" > 
					<?php foreach($courses as $crse => $crseval){ ?>
						<option value="<?php echo $crseval['ID'] ?>"><?php echo $crseval['CourseName']; ?></option> 
					<?php } ?>
				</select>
			</td>
        </tr>
		</tbody>
    </table>
 

    <div>
        <input type="submit" name="add" id="btnSubmit" value="Submit" />
    </div>
    </div>
</form>
</body>
</html>