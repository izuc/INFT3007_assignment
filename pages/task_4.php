<?php
	function pageTitle() {
		echo 'Task 4';
	}

	function display() {
		global $connection;
		echo '<div id="info_box">4. Provide the SQL (and output) that lists the names of officers who have not made loans at branches other than their home branch.</div>';
				
		$officer_query = mysqli_query($connection, 'SELECT o.off_name 
													FROM officer o 
													WHERE o.off_id NOT IN ( 
														SELECT o.off_id 
														FROM contract con 
														INNER JOIN officer o ON o.off_id = con.off_id 
														AND con.br_code != o.br_code )');
		if (mysqli_num_rows($officer_query) > 0) {
			echo '<table class="tablesorter">
					<thead> 
					<tr>
						<th>Officer Name</th>
					</tr>
					</thead>
					<tbody> 
			';
			while ($row = mysqli_fetch_array($officer_query, MYSQLI_ASSOC)) {
				echo '<tr>';
				echo '<td>' . $row['off_name'] . '</td>';
				echo '</tr>';
			}
			echo '</tbody>';
			echo '</table>';
		}
	}
?>