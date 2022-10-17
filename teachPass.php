<?php
require('maincore.php');
$resultStudent = dbquery("SELECT * FROM teacher WHERE teach_no='".$_GET['teach_no']."'");
$dataStudent = dbarray($resultStudent);
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
		font-size: 0.7em;
	} 
	
	td {
		height: 10px;
		text-decoration: none;
		font-family: Tahoma, "Times New Roman", serif; 
		font-size: 0.6em;	
	
	}
	</style>
</head>	
<table width="50" border="1" cellspacing="0">
	<tr height="100">
		<td align="center">
			<h3>SDO Bohol EIS-DTR</h3>
			<br>
			Scan barcode to scanner...
			<br><br>
			<img src="./barcodeapp/barcode.php?text=<?php echo $dataStudent['teach_id']; ?>" 
			alt="testing" width="250"/><br>* <?php echo $dataStudent['teach_id']; ?> <?php echo strtoupper($dataStudent['teach_lname']).", ".strtoupper($dataStudent['teach_fname'])." ".strtoupper($dataStudent['teach_xname'])." ".strtoupper($dataStudent['teach_mname']); ?>*
		</td>
	</tr>
</table>