<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Copyright Text</h2>
                <div class="block copyblock">
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $copyright = mysqli_real_escape_string($db->link, $_POST['copyright']);
        if (empty($copyright)) {
                echo "<span class='error'>Field must not be empty!</span>";
        }else{
            $query = "UPDATE copyright SET content = '$copyright' WHERE id = 1";
            $copyinsert = $db->update($query);
            if ($copyinsert) {
                   echo "<span class='success'> Updated Successfully !!</span>";
            }else{
                   echo "<span class='error'>Failed to update  !!</span>";
            }
        }}
?>    
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="copyright" placeholder="Enter Copyright Text..." name="copyright" class="large" />
                            </td>
                        </tr>
						
						 <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
       
<?php include 'inc/footer.php' ?>
