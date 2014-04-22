<?php
	function pageTitle() {
		echo 'Task 9';
	}

	function display() {
		global $connection;
		echo '<div id="info_box">9. For all subordinates of any specified branch manager provide the name of the subordinate 
				officer and the number of loans made by that officer. Provide the manager ID at run time (perhaps by using a query placeholder). 
				Demonstrate for the manager with ID 03 (Chen).</div>';
				
		$officer_query = mysqli_query($connection, 'SELECT o.off_name, COUNT( con.con_id ) As loan_count 
													FROM officer o 
													INNER JOIN contract con ON con.off_id = o.off_id 
													WHERE o.supervisor = 3 GROUP BY con.off_id');
		if (mysqli_num_rows($officer_query) > 0) {
			echo '<table class="tablesorter">
					<thead> 
					<tr>
						<th>Officer Name</th>
						<th>Loan Count</th>
					</tr>
					</thead>
					<tbody> 
			';
			while ($row = mysqli_fetch_array($officer_query, MYSQLI_ASSOC)) {
				echo '<tr>';
				echo '<td>' . $row['off_name'] . '</td>';
				echo '<td>' . $row['loan_count'] . '</td>';
				echo '</tr>';
			}
			echo '</tbody>';
			echo '</table>';
		}
	}
?>