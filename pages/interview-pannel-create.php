<?php 

	

 ?>

<?php require_once('../templates/header.php')?>
<?php require_once('../templates/aside.php') ?>



<div id="content" class="col-11 col-md-8 col-lg-9 flex-col align-items-center justify-content-start">

	<div>
		<h2>Create New Interview Pannel</h2>
	</div>
	<form action="<?php echo set_url('pages/interview-pannel-create.php') ?>" class="col-12" method="POST">
		<div class="col-12 col-lg-6 p-3">
			<fieldset>
				<legend>Basic Info</legend>
				<div class="form-group">
					<label for="pannel-id">Pannel ID</label>
					<input type="text" name="pannel-id" id="pannel-id" disabled="">
				</div>

				<div class="form-group">
					<label for="pannel-grade">Grade</label>
					<input type="text" name="pannel-grade" id="pannel-grade" required="required">
				</div>
				<div class="form-group">
					<label for="pannel-name">Pannel Name</label>
					<input type="text" name="pannel-name" id="pannel-name" required="required">
				</div>

			</fieldset>
		</div>
		<div class="col-12 col-lg-6 p-3">
			<fieldset class="col-12 flex-col">
				<legend>Teachers Info</legend>
				<div id="interview-teachers">
					<div id="teacherid-1" class="form-group interview-teacher">
						<label for="teacher-1">Teacher ID</label>
						<input type="text" name="teacher-1" id="teacher-1" required="required">
					</div>
					<div id="teacherid-2" class="form-group nmt-5 interview-teacher">
						<label for="teacherid-2">Teacher ID</label>
						<input type="text" name="teacher-2" id="teacher-2" required="required">
					</div>
					<div id="teacherid-3" class="form-group interview-teacher">
						<label for="teacherid-3">Teacher ID</label>
						<input type="text" name="teacher-3" id="teacher-3" required="required">
					</div>
				</div>
				<div class=" form-group d-flex justify-content-end">
					<button type="button" class="btn btn-blue" id="add-teacher"  onclick="interview_add_teacher(this,'interview-teachers',4)">+add a teacher</button>
				</div>
				<hr>
				<div class="d-flex justify-content-center">
					<button type="submit" class="btn btn-blue" name="submit" id="submit">Submit</button>
				</div>
			</fieldset>
		</div>
	</form>
</div>

<?php require_once("../templates/footer.php") ?>