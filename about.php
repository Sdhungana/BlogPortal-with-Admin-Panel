<?php include 'inc/header.php';  ?>
<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2>About us</h2>
				
		<?php 
		
		$query = "SELECT * FROM aboutus";
		$data = $db->select($query);
		if ($data) {
			while($result = $data->fetch_assoc()){
				echo $result['content'];
			}
		}

		?>
			
	</div>

		</div>
	<?php include 'inc/sidebar.php'; ?>
	</div>
	<?php include 'inc/footer.php'; ?>	