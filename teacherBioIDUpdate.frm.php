<?php
require ("maincore.php");
$resultAnec = dbquery("SELECT * FROM teacher WHERE teach_no='".$_GET['teach_no']."'");
$dataAnec = dbarray($resultAnec);
?>
<div class="modal-content">
    <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title">Modify DTR Information</h4>
    </div>
	<form method="post" action="teacherID.scr.php?UpdateBiometricID=Yes">
	<input type="hidden" id="teach_no" name="teach_no" required="required" class=" form-control" value="<?php echo $_GET['teach_no'];?>">
	<div class="modal-body">
		<div class="card-body">	
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="form-group">
						<label class="control-label required" for="stud_lrn">Biometric ID Number <span title="Required" class="text-danger">*</span></label>
						<input type="number" id="teach_bio_no" name="teach_bio_no"  required="required" class=" form-control" value="<?php echo $dataAnec['teach_bio_no'];?>" style="text-transform:uppercase;">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="form-group">
						<label class="control-label required" for="stud_lrn">Barcode <span title="Required" class="text-danger">*</span></label>
						<input type="text" id="teach_dialect" name="teach_dialect"  required="required" class=" form-control" value="<?php echo $dataAnec['teach_dialect'];?>" style="text-transform:uppercase;">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="form-group">
						<label class="control-label required" for="stud_lrn">Supervisor <span title="Required" class="text-danger">*</span></label>
						<select class="form-control" id="ui-classes" style="margin-top: 5px" name="teach_tin" required>
							<option value="">---</value>
							<?php
							$checkFaculty = dbquery("SELECT * FROM teacher ORDER BY teach_lname ASC, teach_fname asc");
							while($dataFaculty=dbarray($checkFaculty)){
							?>
								<option value="<?php echo $dataFaculty['teach_no'];?>" <?php echo ($dataFaculty['teach_no']==$dataAnec['teach_tin']?"selected":"");?>><?php echo $dataFaculty['teach_lname'].", ".$dataFaculty['teach_fname']; ?></option>
							<?php } ?>
						</select>					
					</div>
				</div>
			</div>
		</div>
     </div>
	<div class="modal-footer">
		<button type="submit" class="btn btn-primary" onClick="return confirm('Are you sure you want to save changes?')">Update</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	</div>
	</form>
</div>