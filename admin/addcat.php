<?php include'inc/header.php'; ?>
		
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
                 
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $name = mysqli_real_escape_string($db->link, $name);
    if (empty($name)) {
        echo "<span class='error'>Catagory name Cannot By empty</span>";
    } else{
        $result = "INSERT INTO tbl_category(name) VALUES ('$name')";
        $creata = $db->insert($result);
        if ($creata) {
            echo "<span class='seccess'> Data update Sessessfull </span>";
        }
    }
    
}
?>
                <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="name" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
<?php include'inc/footer.php'; ?>
