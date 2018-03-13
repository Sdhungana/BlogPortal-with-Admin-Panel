<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
        <div class="grid_10">
		      <div class="box round first grid">
                <h2>Change Password</h2>
                <div class="block">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $oldpassword = md5($_POST['oldpassword']);
          $newpassword = md5($_POST['newpassword']);
        $query = "SELECT password FROM tbl_user WHERE  password = '$oldpassword'";
        $data = $db->select($query);
        
        if ($data) {
            $q = "UPDATE tbl_user SET password =  '$newpassword'";
            $d = $db->update($q);
            if ($d) {
                echo "<span style='color:green; font-size=18px;'>Password Changed Successully !!</span>";
            }
            else{
                echo "<span style='color:red; font-size=18px;'>Failed to change old password !!</span>";
            }
        }
        else{
            echo "<span style='color:red; font-size=18px;'>Incorrect Old Password !!</span>";
        }
}


         ?>

                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Old Password</label>
                            </td>
                            <td>
                                <input type="password" name="oldpassword" placeholder="Enter Old Password..."   class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>New Password</label>
                            </td>
                            <td>
                                <input type="password" name="newpassword" placeholder="Enter New Password..."  class="medium" />
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
