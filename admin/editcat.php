<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<?php 
if (!isset($_GET['catid']) || $_GET['catid'] == NULL) {
    echo "<script>window.location.href = 'catlist.php' </script>";
    //header('location:catlist.php');
}else{
    $id = $_GET['catid'];
}
 ?>
     <div class="grid_10">
            <div class="box round first grid">
                <h2>Edit Category</h2>
               <div class="block copyblock"> 
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $name = mysqli_real_escape_string($db->link, $name);
        if (empty($name)) {
                echo "<span class='error'>Field must not be empty!</span>";
        }else{
            $query = "UPDATE tbl_category SET name = '$name' WHERE id = $id";
            $update_row = $db->update($query);
            if ($update_row) {
                   echo "<span class='success'>Category Updated Successfully !!</span>";
            }else{
                   echo "<span class='error'>Failed to update  category !!</span>";
            }
        }}
?>

<?php 
    $query = "SELECT * FROM tbl_category WHERE id = $id ORDER BY id DESC";
    $category = $db->select($query);
    if ($category) {
    
    while ($result = $category->fetch_assoc()) {
?>
                 <form method="POST" action="">
                    <table class="form">                    
                        <tr>
                            <td>
                    <input type="text" name="name" value="<?php echo $result['name'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php }  } else{echo "<script>window.location.href = 'catlist.php' </script>";} ?>

                </div>
            </div>
        </div>
       
  <?php include 'inc/footer.php' ?>
