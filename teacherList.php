<?php
require('maincore.php');
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<style>
	table {
	
	}
	
	th{
		height: 10px;
		text-decoration: none;
		font-family: Tahoma, "Times New Roman", serif; 
		font-size: 0.6em;
	} 
	
	td {
		height: 10px;
		text-decoration: none;
		font-family: Tahoma, "Times New Roman", serif; 
		font-size: 0.5em;		
	}
	</style>
</head>	
<?php

if ($_GET['display']=="teaching")
		$filter =" WHERE teach_status='1' AND teach_teacher='1'";
	else if ($_GET['display']=="nonteaching")
		$filter =" WHERE teach_status='1' AND teach_teacher='0'";
	else if ($_GET['display']=="all")
		$filter =" WHERE teach_status='1'";
	else if ($_GET['display']=="nonactive")
		$filter =" WHERE teach_status='0'";
	else 
		$filter =" WHERE teach_status='1'";
		
$result = dbquery("SELECT * FROM teacher $filter ORDER BY teach_lname ASC, teach_fname ASC");
?>
<table border="0" cellspacing="0" cellpadding="0" width="2000">
	<tr>
		<td width="60" valign="top"><img src="./assets/images/sanhs_logo.png" width="50"></td>
		<td align="left" valign="top">
		<strong><?php echo $current_school_name;?></strong><br>
		<?php echo $current_school_address;?>
		Personnel List 
		<?php
		if ($_GET['display']=="teaching")
			echo " (Teaching Personnel)";
		else if ($_GET['display']=="nonteaching")
			echo " (Non-Teaching Personnel)";
		else if ($_GET['display']=="all")
			echo " (All Active Personnel)";
		else if ($_GET['display']=="nonactive")
			echo " (Non-Active Personnel)";
		else 
			echo " (All Active Personnel)";
		?>
		</h4>

		</td>
	</tr>
</table>	

<table border="1" cellspacing="0" cellpadding="0" width="830">
	<thead>
		<tr align="left">
			<th width="2%">#</th>
			<th width="8%">DepEd ID</th>
			<th>Personnel</th>
			<th width="4%">Gender</th>
			<th width="6%">Birthday</th>
			<th width="15%">Address</th>
			<th width="6%">Contact</th>
			<th width="20%">Supervisor</th>
			<th width="15%">Section/Unit</th>
		</tr>
	</thead>
	<tbody>
	<?php
	if (dbrows($result)>0) {
		$i=1;											
		while ($data = dbarray($result)) {
	?>
		<tr>
			<td class="text-right"><?php echo $i; ?></td>
			<td><?php echo ($data['teach_id']<1200000?"NEW HIRE":$data['teach_id']); ?></td>
			<td><small><?php echo strtoupper($data['teach_lname']).", ".strtoupper($data['teach_fname'])." ".strtoupper($data['teach_xname'])." ".strtoupper($data['teach_mname']); ?></small></td>
			<td><small><?php echo $data['teach_gender']; ?></small></td>
			<?php
				$selectAppointments = dbquery("SELECT * FROM teacherappointments WHERE teacherappointments_teach_no='".$data['teach_no']."' ORDER BY teacherappointments_date DESC LIMIT 1");
				$rowAppointments = dbarray($selectAppointments);
			?>
			<td><small>
			<?php 
				$phpdate = strtotime($data['teach_bdate']);
				echo $mysqldate = date('F d, Y', $phpdate);
			?>
			</small></td>
			<td><small><?php echo $data['teach_residence'];?></small></td>
			<td><small><?php echo $data['teach_dialect'];?></small></td>
			<?php 
				$checkSupervisor = dbquery("SELECT * FROM teacher WHERE teach_no='".$data['teach_tin']."'");
				$dataSupervisor = dbarray($checkSupervisor);
			?>
			<td><small><?php echo $dataSupervisor['teach_lname'] . ", " . $dataSupervisor['teach_fname'];?></small></td>

			<td><small>-</small></td>

		</tr>
	<?php
		$i++;
		}	
	}
	?>
	</tbody>
</table>
