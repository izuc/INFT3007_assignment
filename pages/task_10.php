<?php
	function pageTitle() {
		echo 'Task 10';
	}

	function display() {
		global $connection;
		echo '<div id="info_box">10. Provide the SQL (and output) that can generate the Bank\'s USD exposure to any nominated group. 
							Again, specify the group ID at run time. Your result should show the group name and the current exposure in USD. 
							Demonstrate using the Arrow group.</div>';
				
		$group_query = mysqli_query($connection, 'SELECT g.gr_name, ROUND(SUM( c.cl_limit * curr.usd_xchg_rate )) AS current_exposure
													FROM `group` g
													INNER JOIN client c ON c.gr_code = g.gr_code
													INNER JOIN currency curr ON curr.curr_code = c.cl_limit_curr
													AND g.gr_code = \'ARRG\'
													GROUP BY c.gr_code');
													
		if (mysqli_num_rows($group_query) > 0) {
			echo '<table class="tablesorter">
					<thead> 
					<tr>
						<th>Group Name</th>
						<th>Current Exposure</th>
					</tr>
					</thead>
					<tbody> 
			';
			while ($row = mysqli_fetch_array($group_query, MYSQLI_ASSOC)) {
				echo '<tr>';
				echo '<td>' . $row['gr_name'] . '</td>';
				echo '<td>' . $row['current_exposure'] . '</td>';
				echo '</tr>';
			}
			echo '</tbody>';
			echo '</table>';
		}
	}
?>