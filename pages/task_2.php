<?php

function branch_data() {
	global $connection;
	echo '<div id="branch_data">';
	$branch_query = mysqli_query($connection, 'SELECT br_code, br_name FROM branch');
	if (mysqli_num_rows($branch_query) > 0) {
		echo '<table id="branch_tbl" class="tablesorter">
				<thead> 
				<tr>
					<th>Branch Code</th>
					<th>Branch Name</th>	
				</tr>
				</thead>
				<tbody> 
		';
		while ($row = mysqli_fetch_array($branch_query, MYSQLI_ASSOC)) {
			echo '<tr>';
			echo '<td>' . $row['br_code'] . '</td>';
			echo '<td>' . $row['br_name'] . '</td>';
			echo '</tr>';
		}
		echo '</tbody>';
		echo '</table>';
	}
	echo '</div>';
}

function client_data() {
	global $connection;
	echo '<div id="client_data">';
	$client_query = mysqli_query($connection, 'SELECT c.cl_code, c.cl_name, i.ic_name, c.cl_limit, c.cl_limit_curr, c.gr_code FROM client c INNER JOIN industry i ON i.ic_code = c.ic_code');
	if (mysqli_num_rows($client_query) > 0) {
		echo '<table id="client_tbl" class="tablesorter">
				<thead> 
				<tr>
					<th>Client Code</th>
					<th>Client Name</th>
					<th>Industry</th>
					<th>Client Limit</th>
					<th>Limit Currency</th>
					<th>Group Code</th>
				</tr>
				</thead>
				<tbody> 
		';
		while ($row = mysqli_fetch_array($client_query, MYSQLI_ASSOC)) {
			echo '<tr>';
			echo '<td>' . $row['cl_code'] . '</td>';
			echo '<td>' . $row['cl_name'] . '</td>';
			echo '<td>' . $row['ic_name'] . '</td>';
			echo '<td>' . $row['cl_limit'] . '</td>';
			echo '<td>' . $row['cl_limit_curr'] . '</td>';
			echo '<td>' . $row['gr_code'] . '</td>';
			echo '</tr>';
		}
		echo '</tbody>';
		echo '</table>';
	}
	echo '</div>';
}

function contract_data() {
	global $connection;
	echo '<div id="contract_data">';
	$contract_query = mysqli_query($connection, 'SELECT con.con_id, con.con_date, con.cl_code, o.off_name, con.br_code, con.con_amnt, con.curr_code FROM contract con INNER JOIN officer o ON o.off_id = con.off_id');
	if (mysqli_num_rows($contract_query) > 0) {
		echo '<table id="contract_tbl" class="tablesorter">
				<thead> 
				<tr>
					<th>Contract ID</th>
					<th>Date</th>
					<th>Client Code</th>
					<th>Officer</th>
					<th>Branch Code</th>
					<th>Amount</th>
					<th>Currency</th>
				</tr>
				</thead>
				<tbody> 
		';
		while ($row = mysqli_fetch_array($contract_query, MYSQLI_ASSOC)) {
			echo '<tr>';
			echo '<td>' . $row['con_id'] . '</td>';
			echo '<td>' . $row['con_date'] . '</td>';
			echo '<td>' . $row['cl_code'] . '</td>';
			echo '<td>' . $row['off_name'] . '</td>';
			echo '<td>' . $row['br_code'] . '</td>';
			echo '<td>' . $row['con_amnt'] . '</td>';
			echo '<td>' . $row['curr_code'] . '</td>';
			echo '</tr>';
		}
		echo '</tbody>';
		echo '</table>';
	}
	echo '</div>';
}

function currency_data() {
	global $connection;
	echo '<div id="currency_data">';
	$currency_query = mysqli_query($connection, 'SELECT curr_code, curr_name, usd_xchg_rate FROM currency');
	if (mysqli_num_rows($currency_query) > 0) {
		echo '<table id="currency_tbl" class="tablesorter">
				<thead> 
				<tr>
					<th>Currency Code</th>
					<th>Currency Name</th>
					<th>USD Exchange Rate</th>
				</tr>
				</thead>
				<tbody> 
		';
		while ($row = mysqli_fetch_array($currency_query, MYSQLI_ASSOC)) {
			echo '<tr>';
			echo '<td>' . $row['curr_code'] . '</td>';
			echo '<td>' . $row['curr_name'] . '</td>';
			echo '<td>' . $row['usd_xchg_rate'] . '</td>';
			echo '</tr>';
		}
		echo '</tbody>';
		echo '</table>';
	}
	echo '</div>';
}

function group_data() {
	global $connection;
	echo '<div id="group_data">';
	$groups_query = mysqli_query($connection, 'SELECT gr_code, gr_name, gr_limit, gr_limit_curr FROM `group`');
	if (mysqli_num_rows($groups_query) > 0) {
		echo '<table id="group_tbl" class="tablesorter">
				<thead> 
				<tr>
					<th>Group Code</th>
					<th>Group Name</th>
					<th>Group Limit</th>
					<th>Limit Currency</th>
				</tr>
				</thead>
				<tbody> 
		';
		while ($row = mysqli_fetch_array($groups_query, MYSQLI_ASSOC)) {
			echo '<tr>';
			echo '<td>' . $row['gr_code'] . '</td>';
			echo '<td>' . $row['gr_name'] . '</td>';
			echo '<td>' . $row['gr_limit'] . '</td>';
			echo '<td>' . $row['gr_limit_curr'] . '</td>';
			echo '</tr>';
		}
		echo '</tbody>';
		echo '</table>';
	}
	echo '</div>';
}

function industry_data() {
	global $connection;
	echo '<div id="industry_data">';
	$industry_query = mysqli_query($connection, 'SELECT ic_code, ic_name FROM `industry`');
	if (mysqli_num_rows($industry_query) > 0) {
		echo '<table id="industry_tbl" class="tablesorter">
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
	echo '</div>';
}

function officer_data() {
	global $connection;
	echo '<div id="officer_data">';
	$officer_query = mysqli_query($connection, 'SELECT o.off_id, o.off_name, o.position, o.br_code, s.off_name As supervisor FROM officer o INNER JOIN officer s ON s.off_id = o.supervisor');
	if (mysqli_num_rows($officer_query) > 0) {
		echo '<table id="officer_tbl" class="tablesorter">
				<thead> 
				<tr>
					<th>Officer ID</th>
					<th>Officer Name</th>
					<th>Officer Position</th>
					<th>Branch Code</th>
					<th>Supervisor</th>
				</tr>
				</thead>
				<tbody> 
		';
		while ($row = mysqli_fetch_array($officer_query, MYSQLI_ASSOC)) {
			echo '<tr>';
			echo '<td>' . $row['off_id'] . '</td>';
			echo '<td>' . $row['off_name'] . '</td>';
			echo '<td>' . $row['position'] . '</td>';
			echo '<td>' . $row['br_code'] . '</td>';
			echo '<td>' . $row['supervisor'] . '</td>';
			echo '</tr>';
		}
		echo '</tbody>';
		echo '</table>';
	}
	echo '</div>';
}

function payment_data() {
	global $connection;
	echo '<div id="payment_data">';
	$payment_query = mysqli_query($connection, 'SELECT payment_id, con_id, payment_due_date, payment_amnt, payment_made_date FROM payment');
	if (mysqli_num_rows($payment_query) > 0) {
		echo '<table id="payment_tbl" class="tablesorter">
				<thead> 
				<tr>
					<th>Payment ID</th>
					<th>Connection ID</th>
					<th>Due Date</th>
					<th>Amount</th>
					<th>Payment Made Date</th>
				</tr>
				</thead>
				<tbody> 
		';
		while ($row = mysqli_fetch_array($payment_query, MYSQLI_ASSOC)) {
			echo '<tr>';
			echo '<td>' . $row['payment_id'] . '</td>';
			echo '<td>' . $row['con_id'] . '</td>';
			echo '<td>' . $row['payment_due_date'] . '</td>';
			echo '<td>' . $row['payment_amnt'] . '</td>';
			echo '<td>' . $row['payment_made_date'] . '</td>';
			echo '</tr>';
		}
		echo '</tbody>';
		echo '</table>';
	}
	echo '</div>';
}

function pageTitle() {
	echo 'Task 2';
}

function display() {
	echo '<div id="info_box">2. Provide a listing of the data contents of each table.</div>';
	echo '<div class="tabs">';
	echo '	<ul>
				<li><a href="#branch_data">Branches</a></li>
				<li><a href="#client_data">Clients</a></li>
				<li><a href="#contract_data">Contracts</a></li>
				<li><a href="#currency_data">Currencies</a></li>
				<li><a href="#group_data">Groups</a></li>
				<li><a href="#industry_data">Industries</a></li>
				<li><a href="#officer_data">Officers</a></li>
				<li><a href="#payment_data">Payments</a></li>
			</ul>';
	branch_data();
	client_data();
	contract_data();
	currency_data();
	group_data();
	industry_data();
	officer_data();
	payment_data();
	echo '</div>';
}	
?>