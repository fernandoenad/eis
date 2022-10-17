<?php
require('maincore.php');
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<style>
	.borderdraw {
		position:fixed;
		border-style:solid;
		height:0;
		line-height:0;
		width:0;
		z-index:-1;
	}

	.tag1{ z-index:9999;position:absolute;top:40px; }
	.tag2 { z-index:9999;position:absolute;left:40px; }
	.diag { position: relative; width: 50px; height: 50px; }
	.outerdivslant { position: absolute; top: 0px; left: 0px; border-color: transparent transparent transparent rgb(64, 0, 0); border-width: 50px 0px 0px 60px;}
	.innerdivslant {position: absolute; top: 1px; left: 0px; border-color: transparent transparent transparent #fff; border-width: 49px 0px 0px 59px;}                  

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
<table width="20%" border="1" cellspacing="0" cellpadding="1" width="1135">
	<?php
	$result= dbquery("SELECT * FROM teacher ORDER BY teach_lname ASC, teach_fname ASC");
	$i=1;
	while($data = dbarray($result)){
	?>
	<tr height="100">
		<td align="center">
			<h3>SDO Bohol EIS-DTR</h3>
			<br>
			Scan barcode to scanner...
			<br><br>
			<img src="./barcodeapp/barcode.php?text=<?php echo $data['teach_id']; ?>" 
			alt="testing" width="250"/><br>
			*<?php echo strtoupper($data['teach_id'] . " - " . $data['teach_lname'].", ".$data['teach_fname']." ".$data['teach_xname']." ".substr($data['teach_mname'],0,1));?>*
		</td>
	</tr>
	<?php 
		$i++; 

		if($i==10){
			echo "<tr><td><br><br><br><br><br></td></tr>";
			$i=1;
		}
	} 
	?>
</table>

	
