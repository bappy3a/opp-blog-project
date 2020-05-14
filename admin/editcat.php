<?php include'inc/header.php'; ?>
<?php
if (!isset($_GET['catid']) || $_GET['catid'] == NULL) {
    header("location:catlist.php");
} else{
    $id = $_GET['catid'];
}
?>        
            <div class="box round first grid">
                <h2>Update Category</h2>
               <div class="block copyblock"> 
                 
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $name = mysqli_real_escape_string($db->link, $name);
    if (empty($name)) {
        echo "<span class='error'>Catagory name Cannot By empty</span>";
    } else{
        $result = "UPDATE tbl_category
                SET
                name = '$name'
                WHERE id = '$id';
        ";
        $updaterow = $db->update($result);
        if ($updaterow) {
            echo "<span class='seccess'> Catagory update Sessessfull </span>";
        } else{
            echo "<span class='error'>Catagory Not update</span>";
        }
    }
    
}
?>
<?php
    $query = "SELECT * FROM tbl_category where id='$id' order by id desc";
    $catarory = $db->select($query);
    while ($result = $catarory->fetch_assoc()) {
?>
                <form action="" method="post">
                    <table class="form">                    
                        <tr>
                            <td>
                                <input type="text" name="name" value="<?php echo $result['name']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                </form>
                <?php } ?>
                </div>
            </div>
<?php include'inc/footer.php'; ?>
