<div class="footersection templete clear">
	  <div class="footermenu clear">
		<ul>
			<li><a href="./index.php">Home</a></li>
			<li><a href="./about.php">About</a></li>
			<li><a href="./contact.php">Contact</a></li>
			<li><a href="javascript:void(0)">Privacy</a></li>
		</ul>
	  </div>
	  <?php $query = "SELECT * FROM copyright";
		$data = $db->select($query);
		if ($data) {
			while($result = $data->fetch_assoc()){		
				?>
	  <p><?php echo $result['content'];; ?></p>
	  <?php } }?>
	</div>
	<div class="fixedicon clear">
		<a href="http://www.facebook.com"><img src="images/fb.png" alt="Facebook"/></a>
		<a href="http://www.twitter.com"><img src="images/tw.png" alt="Twitter"/></a>
		<a href="http://www.linkedin.com"><img src="images/in.png" alt="LinkedIn"/></a>
		<a href="http://www.google.com"><img src="images/gl.png" alt="GooglePlus"/></a>
	</div>
<script type="text/javascript" src="js/scrolltop.js"></script>
</body>
</html>