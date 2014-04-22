<?php
	function pageTitle() {
		echo 'Task 6';
	}

	function display() {
		global $connection;
		echo '<div id="info_box">6. Using a subquery (and join) find the name of the client with the loan that involves the largest 
											number of payments, and the number of payments for that loan.</div>';
				
		$client_query = mysqli_query($connection, 'SELECT c.cl_name, con.con_id, COUNT( p.con_id ) AS payment_count 
													FROM client c 
													INNER JOIN contract con ON con.cl_code = c.cl_code 
													INNER JOIN payment p ON p.con_id = con.con_id 
													GROUP BY c.cl_code, con.con_id 
													ORDER BY payment_count DESC LIMIT 1');
		if (mysqli_num_rows($client_query) > 0) {
			echo '<table class="tablesorter">
					<thead> 
					<tr>
						<th>Client Name</th>
						<th>Contract ID</th>
						<th>Payment Count</th>
					</tr>
					</thead>
					<tbody> 
			';
			while ($row = mysqli_fetch_array($client_query, MYSQLI_ASSOC)) {
				echo '<tr>';
				echo '<td>' . $row['cl_name'] . '</td>';
				echo '<td>' . $row['con_id'] . '</td>';
				echo '<td>' . $row['payment_count'] . '</td>';
				echo '</tr>';
			}
			echo '</tbody>';
			echo '</table>';
		}
	}
?>