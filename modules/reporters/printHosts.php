
<!DOCTYPE html>
<html>
<head>
	<title>Network Information</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/piWatch/modules/reporters/style2.css">
</head>
<body>
	<div id="container">
		<?php
			require_once('../classes.php');
			$pdo = getPDO();

			$stmt = $pdo->query('SELECT DISTINCT * FROM scans GROUP BY host, port ORDER BY host, port, time DESC');
			$stmt->execute();

			echo "<h1 id='header'>Services Running</h1>";
			echo "<table>";
				echo "<tr>";
					echo "<th>Date</th>";
					echo "<th>Time</th>";
					echo "<th>Host</th>";
					echo "<th>Protocol</th>";
					echo "<th>Port</th>";
					echo "<th>Service</th>";
					echo "<th>Software</th>";
					echo "<th>Version</th>";
					echo "<th>Vender</th>";
				echo "</tr>";
			while( $row = $stmt->fetch() ) {
				echo "<tr>";
					echo "<td class='y'>$row[1]</td>";
					echo "<td>$row[2]</td>";
					echo "<td class='y'>$row[3]</td>";
					echo "<td>$row[4]</td>";
					echo "<td class='y'>$row[5]</td>";
					echo "<td>$row[6]</td>";
					echo "<td class='y'>$row[7]</td>";
					echo "<td>$row[8]</td>";
					echo "<td class='t'>$row[9]</td>";
				echo "</tr>";
			}
			echo "</table>";
			echo "<p>";
		?>
	</div><!--end of container-->
</body>
</html>
</html>
