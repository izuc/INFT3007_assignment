<?php
	function pageTitle() {
		echo 'Task 7';
	}

	function display() {
		global $connection;
		echo '<div id="info_box">7. Provide the SQL (and output) that determines which industries (that are listed in the database) are not currently borrowing from the Bank.</div>';
				
		$industry_query = mysqli_query($connection, 'SELECT * FROM industry 
														WHERE ic_code NOT IN ( 
																SELECT i.ic_code 
																FROM industry i 
																INNER JOIN client c ON c.ic_code = i.ic_code 
																INNER JOIN contract con ON con.cl_code = c.cl_code 
																)');
		if (mysqli_num_rows($industry_query) > 0) {
			echo '<table class="tablesorter">
					<thead> 
					<tr>
						<th>Industry Code</th>
						<th>Industry Name</th>
					</tr>
					</thead>
					<tbody> 
			';
			while ($row = mysqli_fetch_array($industry_query, MYSQLI_ASSOC)) {
				echo '<tr>';
				echo '<td>' . $row['ic_code'] . '</td>';
				echo '<td>' . $row['ic_name'] . '</td>';
				echo '</tr>';
			}
			echo '</tbody>';
			echo '</table>';
		}
	}
?>