<?php
	function pageTitle() {
		echo 'Task 5';
	}

	function display() {
		global $connection;
		echo '<div id="info_box">5. Provide the SQL (and output) that determines the amount in USD that the bank would expect to receive 
						in payments during the third quarter 2010, given the current loans portfolio.</div>';
				
		$payment_query = mysqli_query($connection, 'SELECT ROUND(SUM( p.payment_amnt * curr.usd_xchg_rate )) AS expected_amount
													FROM contract con
													INNER JOIN payment p ON p.con_id = con.con_id
													INNER JOIN currency curr ON curr.curr_code = con.curr_code
													WHERE (
														p.payment_due_date
														BETWEEN \'2010-07-01\'
														AND \'2010-11-30\'
													)');
		if (mysqli_num_rows($payment_query) > 0) {
			echo '<table class="tablesorter">
					<thead> 
					<tr>
						<th>Expected Amount</th>
					</tr>
					</thead>
					<tbody> 
			';
			while ($row = mysqli_fetch_array($payment_query, MYSQLI_ASSOC)) {
				echo '<tr>';
				echo '<td>' . $row['expected_amount'] . '</td>';
				echo '</tr>';
			}
			echo '</tbody>';
			echo '</table>';
		}
	}
?>