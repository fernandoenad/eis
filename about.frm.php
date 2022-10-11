<?php
session_start();
require ('maincore.php');
?>
<!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">About the Web Application</h4>
      </div>
      <div class="modal-body">
		<div class="card-body">
			<div class="row">
				<div class="col-lg-12 col-md-12">
				<h3 align="center"><?php echo $app_name;?> v1.0</h3><hr>
				<small>Application Name: <strong><?php echo $app_fullname;?></strong><br>
				Version Update Date: <strong>October 10, 2022</strong><br>
				Developer: <strong>FERNANDO B. ENAD (San Agustin National High School - Sagbayan, Bohol)</strong><br>
				Developer Contacts: <strong>fernando.enad@deped.gov.ph</strong> (email), <strong>+63.917.626.8262</strong> (mobile)<br>
			
				This product is licensed to DepEd - Division of Bohol under the terms and conditions stipulated on the Project Design.
				</small><br><br>
				</div>
			</div>
		</div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
	  </form>
	</div>
