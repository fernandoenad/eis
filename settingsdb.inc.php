<br>
<?php
/*
if(isset($_GET['installed']) && $_GET['installed']=="dbu_enr_tbl"){
	unlink('./updates/dbu_enr_tbl.php');
}
*/
?>
<div class="pagecontent container">
	<div class="page-header" style="margin-top: 20px">
		<h1>Database Updates</h1>
	</div> 
	<div class="tab-content">
		<div class="tab-pane active" id="view_ledger">
			<div class="row-fluid">
				<div class="span12"><br>
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="btn-toolbar  pull-right">
							<div class="btn-group">
																									
							</div>
							</div>
							
							Database Update History</div>
						<div class="table-responsive">
							<table class="table table-bordered table-condensed table-striped table-sticky" style="margin-bottom:20px !important">
								<thead>
									<tr>
										<th width="3%">#</th>
										<th width="20%">Database Update #</th>
										<th>Update Details</th>
										<th width="20%">Date/Time of Update</th>
										<th width="10%"></th>					
									</tr>
								</thead>
								<tbody> 
									<tr>
										<td>1</td>
										<td>Re-zero Backup</td>
										<td>This re-zeroes the whole database. Please note that re-zeroing the database, deletes all information you have entered so far.</td>
										<td>May 1, 2018 @ 6:19AM</td>
										<td>
										<?php
										if (file_exists("./backupdb/sanhsmis.sql")){
										?>
										<a href="./confirmRezeroDB.frm.php" title="Restore Backup" data-toggle="modal" data-target="#modal-medium" data-backdrop="static" data-keyboard="false" onclick="return confirm('Are you sure you want to re-zero the database? This action will erase all your data...')">Re-zero Database</a>
										<?php
										}
										else  {
										?>
										File not found!</a>
										<?php
										}
										?>
										</td>
									</tr>	
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>		
		</div>
		</div>
	</div>
</div>



