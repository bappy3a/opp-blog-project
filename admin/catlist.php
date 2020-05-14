<?php include'inc/header.php'; ?>
            <div class="box round first grid">
                <h2>Category List</h2>
                <?php
                	if (isset($_GET['delcat'])) {
                		$delid = $_GET['delcat'];
                		$delquery = "DELETE FROM tbl_category where id='$delid' ";
                		$deldata  = $db->delete($delquery);
                		if ($deldata) {
                			echo "<span class='seccess'>Catagory Delete Sessfully</span>";
                		}
                	}
                ?>      
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;
						$query = "SELECT * FROM tbl_category order by id desc ";
						$cat = $db->select($query);
						if ($cat) {
							while ($result = $cat->fetch_assoc()) {
					?>		
						<tr class="odd gradeX">
							<td><?php echo $i++; ?></td>
							<td><?php echo $result['name']; ?></td>
							<td><a href="editcat.php?catid=<?php echo $result['id']; ?>">Edit</a> || <a onclick="return confirm('Are u Sere to Delect')"  href="?delcat=<?php echo $result['id']; ?>">Delete</a></td>
						</tr>
					<?php } } ?>
						
					</tbody>
				</table>
               </div> 
            </div>

<?php include'inc/footer.php'; ?>
