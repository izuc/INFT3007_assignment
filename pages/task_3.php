<?php
	function pageTitle() {
		echo 'Task 3';
	}

	function display() {
		global $connection;
		echo '<div id="info_box">3. Provide the SQL (and output) that lists the names of all branches that have dealers, and the number of
				dealers working for each of these branches.</div>';
				
		$branch_query = mysqli_query($connection, 'SELECT b.br_name, COUNT( o.off_id ) AS dealer_count 
													FROM branch b 
													INNER JOIN officer o ON o.br_code = b.br_code AND o.position = \'Dealer\' 
													GROUP BY b.br_code');
		if (mysqli_num_rows($branch_query) > 0) {
			echo '<table class="tablesorter">
					<thead> 
					<tr>
						<th>Branch Name</th>
						<th>Dealer Count</th>
					</tr>
					</thead>
					<tbody> 
			';
			while ($row = mysqli_fetch_array($branch_query, MYSQLI_ASSOC)) {
				echo '<tr>';
				echo '<td>' . $row['br_name'] . '</td>';
				echo '<td>' . $row['dealer_count'] . '</td>';
				echo '</tr>';
			}
			echo '</tbody>';
			echo '</table>';
		}
	}
?>