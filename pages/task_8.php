<?php
	function pageTitle() {
		echo 'Task 8';
	}

	function display() {
		global $connection;
		echo '<div id="info_box">8. Create a view that shows only large loans, namely those whose total payments exceed 
					$USD5 million. Your view should show client name, contract date, payment total and number of payments. 
					List what is seen through this view.</div>';
				
		mysqli_query($connection, 'CREATE OR REPLACE VIEW large_loans AS 
									SELECT c.cl_name, con.con_date, ROUND(SUM( p.payment_amnt * curr.usd_xchg_rate)) AS payment_total, 
									COUNT( p.con_id ) AS payment_count 
									FROM client c 
									INNER JOIN contract con ON con.cl_code = c.cl_code
									INNER JOIN currency curr ON curr.curr_code = con.curr_code 
									INNER JOIN payment p ON p.con_id = con.con_id 
									GROUP BY p.con_id HAVING ( payment_total > 5000000 ) 
									ORDER BY payment_total DESC');
					
		$loans_query = mysqli_query($connection, 'SELECT * FROM large_loans');
		if (mysqli_num_rows($loans_query) > 0) {
			echo '<table class="tablesorter">
					<thead> 
					<tr>
						<th>Client Name</th>
						<th>Contract Date</th>
						<th>Payment Total</th>
						<th>Payment Count</th>
					</tr>
					</thead>
					<tbody> 
			';
			while ($row = mysqli_fetch_array($loans_query, MYSQLI_ASSOC)) {
				echo '<tr>';
				echo '<td>' . $row['cl_name'] . '</td>';
				echo '<td>' . $row['con_date'] . '</td>';
				echo '<td>' . $row['payment_total'] . '</td>';
				echo '<td>' . $row['payment_count'] . '</td>';
				echo '</tr>';
			}
			echo '</tbody>';
			echo '</table>';
		}
	}
?>