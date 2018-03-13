<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Edit About Page</h2>
               <div class="block copyblock"> 
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $aboutus = $_POST['abtus'];
        $aboutus = mysqli_real_escape_string($db->link, $aboutus);
        if (empty($aboutus)) {
                echo "<span class='error'>Field must not be empty!</span>";
        }else{
            $query = "UPDATE aboutus SET content = '$aboutus'";
            $catinsert = $db->update($query);
            if ($catinsert) {
                   echo "<span class='success'>Page Updated Successfully !!</span>";
            }else{
                   echo "<span class='error'>Failed to update  !!</span>";
            }
        }}
?>
 <form method="POST" action="">
                    <table class="form">  
                    <tr>  
                         <td>
            <textarea name="abtus" cols="60" rows="15" style="font-size: 16px;font-weight: bold; display: block;"">
    <?php 
        $query = "SELECT * FROM aboutus";
        $data = $db->select($query);
        if ($data) {
            while($result = $data->fetch_assoc()){
                echo $result['content'];
            }
        }
    ?>              
                </textarea>    
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
        </div>
       
  <?php include 'inc/footer.php' ?>
