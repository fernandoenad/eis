
		<div class="pagecontent container">
			<div class="row row-toolbar">
				<div class="col-lg-3 col-md-3 col-lg-push-9 col-md-push-9">
					<div class="btn-group pull-right" style="margin-top: 5px;">
						<form class="navbar-form navbar-right" method="post" action="./?page=student">
							<div class="input-group">
								<input type="text" name="searchStudent" class="form-control" placeholder="Search Student..." value="<?php echo (isset($_POST['searchStudent'])?$_POST['searchStudent']:""); ?>" autofocus>
								<div class="input-group-btn">
									<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="page-header" style="margin-top: 20px">
				<h1>Student</h1>
			</div>                  
    <ol class="breadcrumb">
        <li><a href="./?page=student">Student</a></li>
        <li class="active">New Profile</li>
    </ol>
    
    <form id="enrol" method="post" action="./student.scr.php?saveStudent=Yes" >
	<div class="card">
		<div class="card-heading simple">Learner</div>
		<div class="card-body">
			<div class="row">
				<div class="col-lg-3 col-md-3">
					<div class="form-group">
						<label class="control-label required" for="stud_lrn">Learner's Reference Number <span title="Required" class="text-danger">*</span></label>
						<img id="tick" src="assets/images/tick.png" width="16" height="16"/>
						<img id="cross" src="assets/images/cross.png" width="16" height="16"/>
						<input type="text" id="stud_lrn" name="stud_lrn" maxlength="12" required="required" class=" form-control" value=""> 
						

					</div>
				</div>
				<div class="col-lg-9 col-md-9">
					<div class="form-group">
						<br><i><small>
						Important: Do not copy-paste the LRN, type it in!<br>
						Note: Check if the Residence contains the desired address of the learner before inputting values, otherwise click on the "Not Found?" link.</small></i>
					</div>
				</div>
			</div>
		<div class="row">
				<div class="col-lg-3 col-md-3">
					<div class="form-group">
						<label class="control-label required" for="enrol_actual_fname">First name <span title="Required" class="text-danger">*</span></label>
						<input type="text" id="enrol_actual_fname" name="stud_fname"  required="required" class=" form-control" value="" style="text-transform:uppercase;" />
					</div>
				</div>
				<div class="col-lg-3 col-md-3">
					<div class="form-group">
						<label class="control-label required" for="enrol_actual_mname">Middle name <span title="Required" class="text-danger">* </span> <i><small>(Dash "-" for none)</small></i></label>
						<input type="text" id="enrol_actual_mname" name="stud_mname" required="required" class=" form-control"  style="text-transform:uppercase;"/>
					</div>
				</div>
				<div class="col-lg-3 col-md-3">
					<div class="form-group">
						<label class="control-label required" for="enrol_actual_lname">Last name <span title="Required" class="text-danger">*</span></label>
						<input type="text" id="enrol_actual_lname" name="stud_lname" required="required" class=" form-control" value="" style="text-transform:uppercase;" />
					</div>
				</div>
				<div class="col-lg-3 col-md-3">
					<div class="form-group">
						<label class="control-label" for="enrol_actual_xname">Ext name</label>
						<select id="enrol_actual_xname" name="stud_xname" class="form-control">
							<?php
							$result = dbquery("SELECT * FROM dropdowns WHERE field_category='FIELD_EXT' ORDER BY field_no DESC");
							$rows = dbrows($result);
							while($data = dbarray($result)){
							?>
								<option value="<?php echo $data['field_name']; ?>" <?php echo ($data['field_name']==""?"selected":"");?>><?php echo ($data['field_name']==""?"NONE":$data['field_name']); ?></option>
							<?php
							}
							?>
						</select>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-3 col-md-3">
					<div class="form-group">
						<label class="control-label required" for="enrol_actual_gender">Gender <span title="Required" class="text-danger">*</span></label>
						<select id="enrol_actual_gender" name="stud_gender" required="required" class="form-control">
							<option value="" selected="selected">---select---</option>
							<?php
							$result = dbquery("SELECT * FROM dropdowns WHERE field_category='GENDER' ORDER BY field_name ASC");
							$rows = dbrows($result);
							while($data = dbarray($result)){
							?>
								<option value="<?php echo $data['field_name']; ?>"><?php echo $data['field_name']; ?></option>
							<?php
							}
							?>
						</select>
					</div>
				</div>
				<div class="col-lg-3 col-md-3">
					<div class="form-group">
						<label class="control-label required" for="enrol_actual_bdate">Birth date <span title="Required" class="text-danger">*</span></label>
						<input type="date" id="enrol_actual_bdate" name="stud_bdate" required="required" class=" form-control" style="text-transform:uppercase;"/>
					</div>
				</div>
				<div class="col-lg-3 col-md-3">
					<div class="form-group">
						<label class="control-label required" for="enrol_actual_residence">Residence <span title="Required" class="text-danger">*</span>  </label>
						
						<select id="enrol_actual_residence" name="stud_residence" required="required" class="form-control">
							<option value="" selected="selected">---select---</option>
							<?php
							$result = dbquery("SELECT * FROM dropdowns WHERE field_category='RESIDENCE' ORDER BY field_name ASC");
							$rows = dbrows($result);
							while($data = dbarray($result)){
							?>
								<option value="<?php echo $data['field_name']; ?>"><?php echo $data['field_name']; ?></option>
							<?php
							}
							?>
						</select><a href="newResidence.frm.php"  data-toggle="modal" data-target="#modal-medium">Not found?</a>
						
						
						
					</div>
				</div>
				<div class="col-lg-3 col-md-3">
					<div class="form-group">
						<label class="control-label required" for="enrol_actual_birthDate">CCT <span title="Required" class="text-danger">*</span></label>
						<select id="enrol_actual_gender" name="stud_cct" required="required" class="form-control">
							<option value="" selected="selected">---select---</option>
							<?php
							$result = dbquery("SELECT * FROM dropdowns WHERE field_category='CCT' ORDER BY field_name ASC");
							$rows = dbrows($result);
							while($data = dbarray($result)){
							?>
								<option value="<?php echo $data['field_name']; ?>" <?php echo ($data['field_name']=="YES (MCCV)"?"disabled":""); ?>><?php echo $data['field_name']; ?></option>
							<?php
							}
							?>
						</select>
					</div>
				</div>
			</div>
		</div>
	</div>

		
	<hr/>
	<button type="submit" name="submit" id="submit" class="btn btn-primary pull-right"  onclick="return confirm('Are you sure you want to save the inputted values?')">Save</button>
	<!--<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="btn btn-default">Back to Profile</a>-->
	<br/>
	</form>
              </div>
            </div>
          </div>
        </div>