<?php require_once "web/header.php"; ?>

    <div style="text-align: right;">
        <a id="buttonAdd" href="index.php?action=course-add">Add Course</a>
    </div>
    <h3>Course List</h3>
    <div>
        <table cellpadding="10">
            <thead>
                <tr>
                    <th class="noborder"></th>
                    <th><strong>Course</strong></th>
                    <th class="noborder"></th>
                </tr>
            </thead>
            <tbody>
                    <?php
                    if (!empty($result)) {
                        foreach ($result as $k => $v) {
                            ?>
          <tr>
                    
                    <td class="noborder"><a class="buttonEdit"
                        href="index.php?action=course-edit&id=<?php echo $result[$k]["ID"]; ?>">
						Edit
                        </a>
                    </td>
					<td><?php echo $result[$k]["CourseName"]; ?></td>
                    <td class="noborder">
                        <a class="buttonDelete" 
                        href="index.php?action=course-delete&id=<?php echo $result[$k]["ID"]; ?>">
						Delete
                        </a>
                    </td>
                </tr>
                    <?php
                        }
                    }
                    ?>           
            <tbody>
        </table>
		
		<ul class="pagination" style="text-align:right">
			<li><a href="index.php?action=course&page=1"><<</a></li>
			<li class="<?php if($page <= 1){ echo 'disabled'; } ?>">
				<a style="<?php if($page <= 1){ echo 'pointer-events:none; color:inherit'; } ?>" href="<?php if($page <= 1){ echo '#'; } else { echo "index.php?action=course&page=".($page - 1); } ?>"><</a>
			</li>
			<li class="<?php if($page >= $totalPages){ echo 'disabled'; } ?>">
				<a style="<?php if($page >= $totalPages){ echo  'pointer-events:none;  color:inherit'; } ?>" href="<?php if($page >= $totalPages){ echo '#'; } else { echo "index.php?action=course&page=".($page + 1); } ?>">></a>
			</li>
			<li><a href="index.php?action=course&page=<?php echo (int)$totalPages; ?>">>></a></li>
		</ul>
    </div>
</body>
</html>