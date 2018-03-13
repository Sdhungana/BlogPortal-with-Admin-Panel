<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
  <?php
if (!isset($_GET['postid']) || $_GET['postid'] == NULL) {
    echo "<script>window.location.href = 'postlist.php' </script>";
    //header('location:catlist.php');
}else{
    $pstid = $_GET['postid'];
}

    ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Edit Post</h2>
                <div class="block">
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $title = mysqli_real_escape_string($db->link, $_POST['title']);
            // $cat   = mysqli_real_escape_string($db->link, $_POST['cat']);
            $body  = mysqli_real_escape_string($db->link, $_POST['body']);
            $tags  = mysqli_real_escape_string($db->link, $_POST['tags']);
            $author= mysqli_real_escape_string($db->link, $_POST['author']);

        $permitted  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "upload/".$unique_image;

    if ($title == "" || $body == "" || $tags == "" || $author == "" || $file_name == "") {
     echo "<span class='error'>Field must not be empty  !!</span>";
    }
    elseif ($file_size >1048567) {
     echo "<span class='error'>Image Size should be less then 1MB!
     </span>";
    }
     elseif (in_array($file_ext, $permitted) === false) {
     echo "<span class='error'>You can upload only:-".implode(',', $permitted)."</span>";
    }
     else{
    move_uploaded_file($file_temp, $uploaded_image);
    $query = "UPDATE tbl_post 
    SET title = '$title', image = '$unique_image', body = '$body', tags = '$tags', author = '$author' WHERE id =  $pstid ";
    $update_row = $db->update($query);
    if ($update_row) {
     echo "<span class='success'>Data Updated Successfully.
     </span>";
    }
    else {
     echo "<span class='error'>Failed to update data !</span>";
    }
        }   
            } 
        ?> 
 <?php
    $editquery = "SELECT tbl_post.*, tbl_category.name FROM tbl_post INNER JOIN tbl_category ON tbl_post.cat = tbl_category.id WHERE tbl_post.id = $pstid";
                
    $editpost = $db->select($editquery);

    if ($editpost) {
        while ($result = $editpost->fetch_assoc()) {

?>              
                 <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">
                         
                         <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" value="<?php echo $result['title'] ;?>" class="medium" />
                            </td>
                        </tr>
                       
                     
                   
                    
                       <!--  <tr>
                            <td>
                                <label>Date Picker</label>
                            </td>
                            <td>
                                <input type="text" name="date" id="date-picker" />
                            </td>
                        </tr> -->
                        <tr>
                            <td>
                                <label>Change Image</label>
                            </td>
                            <td>
                                <input type="file"  name="image" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                <textarea class="tinymce" name="body"><?php echo $result['body'] ;?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Tags</label>
                            </td>
                            <td>
                                <input type="text" name="tags" value="<?php echo $result['tags'] ;?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="text" name="author" value="<?php echo $result['author'] ;?>" class="medium" />
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                        <?php } } else { echo "<script>window.location.href = 'postlist.php' </script>";} ?>
                    </table>
                    </form>
                </div>
            </div>
        </div>
       
      <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script> 
  <?php include 'inc/footer.php' ?>


