<!-- updateSeller -->
<!-- deleteSeller -->

<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$username = 'yvh5398';
$password = 'a245125022';
$host = 'localhost';
$dbname = 'yvh5398_431W';

$sellerID = $_POST["sellerID"];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$location = $_POST['location'];
$language = $_POST['language'];
$rating = $_POST['rating'];

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Simple E-Commerce Website</title>
    </head>
    <body>
		<p>
			<?php 
				echo "Updating user: " . $sellerID . "..."; 
				$sql = "UPDATE Seller SET fname='$fname', lname='$lname', reviewID='$rating', languageID='$language', locationID='$location' WHERE sellerID='$sellerID' ";
				try {
					$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$conn->exec($sql);
					echo "User updated successfully";
				?>
				<p>You will be redirected in 3 seconds</p>
				<script>
					var timer = setTimeout(function() {
						window.location='start.php'
					}, 3000);
				</script>
			<?php
				} catch(PDOException $e) {
					echo $sql . "<br>" . $e->getMessage();
				}
				$conn = null;
			?>
		</p>
    </body>
</div>
</html>
