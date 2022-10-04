<?php // Start the session
if(!isset($_SESSION["user_logged"])){
	header("Location: login.php?prev_url=".$_SERVER['REQUEST_URI']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="The official website of San Agustin National High School - Sagbayan, Bohol">
    <meta name="author" content="Fernando B. Enad">
	<meta name="keywords" content="San Agustin NHS, San Agustin National High School">
	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Expires" content="0" />
	<link rel="icon" href="./assets/images/seal.png">
    <title><?php echo $current_school_short;?> EIS- <?php echo $_SESSION["user_fullname"];?> </title>
                
	
    <!-- Bootstrap -->
    <link href="./assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="./assets/bootstrap/css/bootstrap-theme.css" rel="stylesheet">
     
	<!--
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>
    -->
	<link rel="stylesheet" href="./assets/css/style.css">
	<link rel="stylesheet" href="./assets/css/signin.css">
	<link href="./assets/css/select2.css" rel="stylesheet">
	<link href="./assets/css/select2-bootstrap.css" rel="stylesheet">
	<link href="./assets/css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="./assets/js/html5shiv.min.js"></script>
      <script src="./assets/js/respond.min.js"></script>
    <![endif]-->
	<script type="text/javascript" src="./assets/js/jquery.js"></script>

	<script type="text/javascript">
    function Reload() {
			window.location.reload();
    }
	
	function pop_up(hyperlink, window_name)
	{
		if (! window.focus)
			return true;
		var href;
		if (typeof(hyperlink) == 'string')
			href=hyperlink;
		else
			href=hyperlink.href;
		window.open(
			href,
			window_name,
			'width=480,height=300,toolbar=no, scrollbars=yes,200,200'
		);
		return false;
	}
	</script>

	<script type="text/javascript">
    $(document).ready(function(){
      refreshTable();
    });

    function refreshTable(){
        $('#tableHolder').load('index.php #tableHolder', function(){
           setTimeout(refreshTable, 1000);
        });
    }
	</script>
	
	<script type="text/javascript">
	$(document).ready(function(){
	$('#stud_lrn').keyup(username_check1);
	});
		
	function username_check1(){	
	var stud_lrn = $('#stud_lrn').val();
	if(stud_lrn == "" || stud_lrn.length < 12){
	$('#stud_lrn').css('border', '3px #CCC solid');
	$('#tick').hide();
	$("#submit").attr("disabled", "disabled");
	}else{
		$("#submit").removeAttr("disabled");
	jQuery.ajax({
	   type: "POST",
	   url: "check.php",
	   data: 'stud_lrn='+ stud_lrn,
	   cache: false,
	   success: function(response){
			if(response == 1){
				$('#stud_lrn').css('border', '3px #C33 solid');	
				$('#tick').hide();
				$('#cross').fadeIn();
				$("#submit").attr("disabled", "disabled");
				}else{
				$('#stud_lrn').css('border', '3px #090 solid');
				$('#cross').hide();
				$('#tick').fadeIn();
				}
			}
		});
	}
	}
	</script>
	
	

	<script type="text/javascript">
	$(document).ready(function(){
	$('#teach_id').keyup(username_check);
	});
		
	function username_check(){	
	var teach_id = $('#teach_id').val();
	if(teach_id == "" || teach_id.length < 7){
	$('#teach_id').css('border', '3px #CCC solid');
	$('#tick').hide();
	$("#submit").attr("disabled", "disabled");
	}else{
		$("#submit").removeAttr("disabled");
	jQuery.ajax({
	   type: "POST",
	   url: "checkTeacher.php",
	   data: 'teach_id='+ teach_id,
	   cache: false,
	   success: function(response){
			if(response == 1){
				$('#teach_id').css('border', '3px #C33 solid');	
				$('#tick').hide();
				$('#cross').fadeIn();
				$("#submit").attr("disabled", "disabled");
				}else{
				$('#teach_id').css('border', '3px #090 solid');
				$('#cross').hide();
				$('#tick').fadeIn();
				}
			}
		});
	}
	}
	</script>	
	

	
	<style>
		#tick{display:none}
		#cross{display:none}
	</style>
	<!--===========================FreiChat=======START=========================-->
	<!--	For uninstalling ME , first remove/comment all FreiChat related code i.e below code
		 Then remove FreiChat tables frei_session & frei_chat if necessary
			 The best/recommended way is using the module for installation                         -->

	<?php
	$ses=$_SESSION["userid"];

	if(!function_exists("freichatx_get_hash")){
	function freichatx_get_hash($ses){

		   if(is_file("./freichat/hardcode.php")){

				   require "./freichat/hardcode.php";

				   $temp_id =  $ses . $uid;

				   return md5($temp_id);
				   //return $ses;

		   }
		   else
		   {
				   echo "<script>alert('module freichatx says: hardcode.php file not found!');</script>";
		   }

		   return 0;
	}
	}
	?>
	
	<script type="text/javascript" language="javascipt" src="./freichat/client/main.php?id=<?php echo $ses;?>&xhash=<?php echo freichatx_get_hash($ses); ?>"></script>
	<link rel="stylesheet" href="./freichat/client/jquery/freichat_themes/freichatcss.php" type="text/css">
	<!--===========================FreiChatX=======END=========================--> 

</head>
<body>
    <!--[if lt IE 9]>
        <p class="chromeframe"><span class="glyphicon glyphicon-warning-sign"></span> You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> to better experience this site.</p>
    <![endif]-->
	<div id="wrap">
		<div class="navbar navbar-fixed-top navbar-default hidden-print" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
				    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<span class="navbar-brand">
						<img class="logo" src="./assets/images/sanhs_logo.png" alt="SANHS" style="height: 20px; margin-top: -2px"/>
					</span>
					<span class="navbar-brand"><?php echo $current_school_short;?> EIS-DTR</span>
				</div>
				
				<div class="navbar-collapse collapse">
					<div class="nav navbar-nav">
						<ul class="nav navbar-nav">
							<li <?php echo ($_GET['page']=="teacher"?"class=active":""); ?>>
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Personnel <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<?php
									if($_SESSION["user_role"]==2){
									?>
									<!--<li><a href="./?page=teacher&display=all">Dashboard</a></li>-->
									<!--<li class="divider"></li>-->
									<li><a href="./?page=teacher&showProfile=<?php echo $_SESSION['userid'];?>&tab=info">My Profile</a></li>
									<li><a href="./?page=teacher&showDTR=<?php echo $_SESSION['userid'];?>&year=<?php echo date('Y');?>&month=<?php echo date('m');?>">My DTR</a></li>
									<!--<li><a href="./?page=teacher&showSALN=<?php echo $_SESSION['userid'];?>&year=<?php echo $current_sy;?>">My SALN</a></li>-->
									<!--<li><a href="./?page=teacher&showProperty=<?php echo $_SESSION['userid'];?>&year=<?php echo date("Y");?>">My Property</a></li>-->
									<?php
									}
									else if($_SESSION["user_role"]==1 || $_SESSION["user_role"]==3){
									?>
									<li><a href="./?page=teacher&display=active">Dashboard</a></li>
									<li><a href="./?page=teacher&createProfile" >New Profile</a></li>
									<li class="divider"></li>
									<li class="dropdown-header">DTR</li>
									<li><a href="./?page=teacher&showDTR=<?php echo $_SESSION['userid'];?>&year=<?php echo date('Y');?>&month=<?php echo date('m');?>">DTR Dashboard</a></li>	
									<li><a href="./?page=teacher&approveDTR&filter=all">Approve Missing Logs</a></li>	
									<li><a href="./?page=teacher&reports=0&year=<?php echo date('Y');?>&month=<?php echo date('m');?>&day=<?php echo date('d');?>">Attendance Reports</a></li>	
									
									<?php if($_SESSION["user_role"]==1) {?>
										<li><a href="./migratefrommdbtomysql.php" target="_blank">Sync Biometric Logs to MIS</a></li>	
									<?php } ?>
									<!--
									<li class="divider"></li>	
									
									<li class="dropdown-header">SALN</li>
									<li><a href="./?page=teacher&showSALN=<?php echo $_SESSION['userid'];?>&year=<?php echo $current_sy;?>">SALN Dashboard</a></li>
									<li><a href="./?page=teacher&manageSALN&year=<?php echo $current_sy;?>">Manage SALN</a></li>
									-->
									<!--
									<li class="divider"></li>	
									<li class="dropdown-header">PROPERTY</li>
									<li><a href="./?page=teacher&showProperty=<?php echo $_SESSION['userid'];?>&year=<?php echo date("Y");?>">Property Dashboard</a></li>
									<li><a href="./?page=teacher&manageProperty&year=<?php echo date("Y");?>">Manage Property</a></li>
									-->
									<?php }  ?>
									
								</ul>							
							</li>
							
								<li <?php echo ($_GET['page']=="support"?"class=active":""); ?>> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Support <span class="caret"></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="./about.frm.php" data-toggle="modal" data-target="#modal-medium" data-backdrop="static" data-keyboard="false">About the Web Application</a></li>
										<!---<li><a href="./assets/manual.pdf" target="_blank">Download the Instructional Manual</a></li>-->

									</ul>
								</li>
						</ul>
					</div>
				
					<ul class="nav navbar-nav navbar-right">
						<li <?php echo ($_GET['page']=="admin"?"class=active":""); ?>>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo strtoupper($_SESSION["user_fullname"]);?> <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="./userTools.frm.php" data-toggle="modal" data-target="#modal-medium" data-backdrop="static" data-keyboard="false">My Account</a></li>
								<?php
								if($_SESSION["user_role"]==3 || $_SESSION["user_role"]==2){}
								else{
								?>
								<!-- <li><a href="../att/admin/?page=user&showDTR=<?php echo $_SESSION["userid"];?>&year=<?php echo date('Y');?>&month=<?php echo date('m');?>">AMS</a></li> -->
								<?php 
								}
								if($_SESSION["user_role"]==1){
								?>
								<li class="divider"></li>
								<li class="dropdown-header">Administrative Tools</li>
								<li><a href="./?page=settings">Site Settings</a></li>
								<li><a href="./?page=admin">User Administration</a></li>
								<!--<li><a href="./?page=sf7header&enrol_sy=<?php echo $current_sy; ?>">SF 7 Header Data</a></li>-->
								<!--<li><a href="./?page=sectioning">Class Sectioning</a></li>-->
								<li><a href="./?page=dropdowns&category=TIMELSLOTS">Dropdown Configuration</a></li>	
								<li class="divider"></li>
								<li class="dropdown-header">Updates</li>
								<li><a href="./?page=settingsfi">Version Updates</a></li>
								<li><a href="./?page=settingsdb">Database Updates</a></li>	
								<li class="divider"></li>								
								<li class="dropdown-header">Backup & Restore</li>
								<li><a href="backupdb.frm.php" title="Backup Database" data-toggle="modal" data-target="#modal-medium" data-backdrop="static" data-keyboard="false">Backup Database</a></li>
								<li><a href="../phpmyadmin/index.php?lang=en&server=1&pma_username=root&pma_password=03231979&db=sanhsmis" target="_blank" title="Restore Backup">Restore Backup</a></li>
								<!-- <li><a href="?page=restoredb" title="Restore Backup">Restore Backup</a></li>-->
										
								<?php } ?>
							</ul>
						</li>
						<li><a href="logout.php?username=<?php echo $_SESSION["user_name"];?>" onClick="return confirm('Are you sure you want to logout?');">Sign out <span class="glyphicon glyphicon-log-out"></span></a></li>
					</ul>
				</div>
			</div>
		</div><br><br>

		
