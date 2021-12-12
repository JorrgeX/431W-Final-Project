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

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Simple E-Commerce Website</title>
    </head>
    <body>
		<p>
			<?php 
				echo "Deleting user: " . $sellerID . "..."; 
				$sql2 = "DELETE FROM SellerItem WHERE sellerID = '$sellerID' ";
				$sql = "DELETE FROM Seller WHERE sellerID = '$sellerID' ";
				try {
					$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$conn->exec($sql2);
					$conn->exec($sql);
					echo "User deleted successfully";
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
