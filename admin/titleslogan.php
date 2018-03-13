<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
        <div class="grid_10">	
            <div class="box round first grid">
                <h2>Update Site Title and Description</h2>
                <div class="block sloginblock">
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = mysqli_real_escape_string($db->link, $_POST['title']);
        $slogan = mysqli_real_escape_string($db->link, $_POST['slogan']);
        if ($title == "" || $slogan == "") {
                echo "<span class='error'>Field must not be empty!</span>";
        }else{
            $query = "UPDATE titleslogan SET webtitle = '$title', webslogan = '$slogan' WHERE id = 1";
            $catinsert = $db->update($query);
            if ($catinsert) {
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
                                <label>Website Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" placeholder="Enter Website Title..."  name="title" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Website Slogan</label>
                            </td>
                            <td>
                                <input type="text" name="slogan" placeholder="Enter Website Slogan..." name="slogan" class="medium" />
                            </td>
                        </tr>
						 
						
						 <tr>
                            <td>
                            </td>
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
