<?php
	
	function connect() {
		// Create connection
		$mysqli_connection = new MySQLi('vergil.u.washington.edu', 'root', 'ernie', 'ordering_system', 8685);
		
		return $mysqli_connection;
	}
 
	function display($conn,$cookie_num) {
		$sql = "SELECT * FROM pizza_order ORDER BY order_num";
		$result = mysqli_query($conn, $sql);

		$total_orders = 0;
		if (mysqli_num_rows($result) > 0) {
		    // output data of each row
		    while($row = mysqli_fetch_assoc($result)) {	
		       if (intval($row["order_num"])>$total_orders) {
		       		$total_orders = (intval($row["order_num"]));
		       }
		    }
		    return $total_orders;
		} 
		else {
			return 0;
		}
	}
	$conn = connect();
	$max = display($conn,$cookie_num);
	echo "<max>".$max."</max>";
?>