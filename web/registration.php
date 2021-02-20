<?php require_once "web/header.php"; ?>
  
    <div style="text-align: right">
        <a id="buttonAdd" href="index.php?action=registration-add">Register Student</a>
    </div>
    <h3>Registration List</h3>
    <div>
        <table cellpadding="10">
            <thead>
                <tr>
                    <th><strong>Name</strong></th>
                    <th><strong>Course</strong></th>
        </tr>
            </thead>
            <tbody>
                    <?php
                    if (! empty($result)) {
                        foreach ($result as $k => $v) {
                            ?>
          <tr>
					<td><?php echo $result[$k]["Name"]; ?></td>
                    <td><?php echo $result[$k]["CourseName"]; ?></td>
                </tr>
                    <?php
                        }
                    }
                    ?>
            <tbody>
        </table>
		
		<ul class="pagination" style="text-align:right">
			<li><a href="index.php?action=registration&page=1"><<</a></li>
			<li class="<?php if($page <= 1){ echo 'disabled'; } ?>">
				<a style="<?php if($page <= 1){ echo 'pointer-events:none; color:inherit'; } ?>" href="<?php if($page <= 1){ echo '#'; } else { echo "index.php?action=registration&page=".($page - 1); } ?>"><</a>
			</li>
			<li class="<?php if($page >= $totalPages){ echo 'disabled'; } ?>">
				<a style="<?php if($page >= $totalPages){ echo  'pointer-events:none;  color:inherit'; } ?>" href="<?php if($page >= $totalPages){ echo '#'; } else { echo "index.php?action=registration&page=".($page + 1); } ?>">></a>
			</li>
			<li><a href="index.php?action=registration&page=<?php echo (int)$totalPages; ?>">>></a></li>
		</ul>
    </div>
</body>
</html>