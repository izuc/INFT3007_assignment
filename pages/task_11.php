<?php
	function pageTitle() {
		echo 'Task 11';
	}

	function display() {
		global $connection;
		echo '<div id="info_box">11. Define “Availability” as the amount a client may still borrow, that is the client\'s limit minus the current exposure. 
				You are required to write the SQL code that will produce a “Client Availability Report” which is specified as follows:
				For every client in the database, list (in client name order) the client\'s name, the client\'s limit, and the availability for that client in USD. 
				Provide totals for both the client limit and availability columns.
			  </div>';
				
		$client_query = mysqli_query($connection, 'SELECT c.cl_name, c.cl_limit, ROUND((c.cl_limit * c_curr.usd_xchg_rate) - SUM(con.con_amnt * curr.usd_xchg_rate)) AS availability 
													FROM client c INNER JOIN contract con ON con.cl_code = c.cl_code 
													INNER JOIN currency curr ON curr.curr_code = con.curr_code 
													INNER JOIN currency c_curr ON c_curr.curr_code = c.cl_limit_curr 
													GROUP BY con.cl_code');
		if (mysqli_num_rows($client_query) > 0) {
			echo '<table class="tablesorter">
					<thead> 
					<tr>
						<th>Client Name</th>
						<th>Client Limit</th>
						<th>USD Availability</th>
					</tr>
					</thead>
					<tbody> 
			';
			while ($row = mysqli_fetch_array($client_query, MYSQLI_ASSOC)) {
				echo '<tr>';
				echo '<td>' . $row['cl_name'] . '</td>';
				echo '<td>' . $row['cl_limit'] . '</td>';
				echo '<td>' . $row['availability'] . '</td>';
				echo '</tr>';
			}
			echo '</tbody>';
			echo '</table>';
		}
	}
?>