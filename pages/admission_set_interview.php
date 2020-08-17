<?php require_once('../php/common.php'); ?>
<?php require_once('../php/database.php'); ?>


<?php 
	
	if(isset($_POST['submit'])){
		
	}

	if(isset($_GET['admission-id'])){
		$con->update('admissions',array("state"=>"accepted"),array("admission_id"=>$_GET['admission-id']));
		$con->where(array("admission_id"=>$_GET['admission-id']));
		$result = $con->select("admissions")->fetch();
	}else{
		if(isset($_GET['back'])){
			header("Location:". $_GET['back'] );
		}else{
			header("Location:". set_url('pages/admissions-all.php'));
		}
	}

 ?>

<?php require_once('../templates/header.php')?>
<?php require_once('../templates/aside.php') ?>

<div id="content" class="col-11 col-md-8 col-lg-9 flex-col align-items-center justify-content-start">
	<form action="<?php echo set_url('/pages/set_interview.php?admission-id='.$_GET['admission-id']) ?>" method="post">
		<fieldset>
			<legend>Interview Info</legend>

			<div class="form-group">
				<label for="admission-id">Admission ID</label>
				<input type="text" name="admission-id" id="admission-id" placeholder="Admission ID" value="<?php if(isset($result['admission_id'])){echo $result['admission_id'];} ?>">
			</div>
			<div class="form-group">
				<label for="name-with-initials">Name with initials</label>
				<input type="text" name="name-with-initials" id="name-with-initials" placeholder="Name with Initials" value="<?php if(isset($result['name_with_initials'])){echo $result['name_with_initials'];} ?>">
			</div>
			<div class="form-group">
				<label for="grade">Grade</label>
				<input type="text" name="grade" id="grade" placeholder="Grade" value="<?php if(isset($result['grade'])){echo $result['grade'];} ?>">
			</div>
			<div class="form-group">
				<label for="interview-pannel">Interview Pannel</label>
				<select name="interview-pannel" id="interview-pannel">
					<option value="">Option 1</option>
					<option value="">Option 2</option>
					<option value="">Option 3</option>
					<option value="">Option 4</option>
					<option value="">Option 5</option>
				</select>
			</div>
			<div class="form-group">
				<label for="interview-date">Interview Date</label>
				<select name="interview-date" id="interview-date">
					<option value="">Option 1</option>
					<option value="">Option 2</option>
					<option value="">Option 3</option>
					<option value="">Option 4</option>
					<option value="">Option 5</option>
				</select>
			</div>
			<div class="form-group">
				<label for="interview-time">Interview time</label>
				<select name="interview-time" id="interview-time">
					<option value="">Option 1</option>
					<option value="">Option 2</option>
					<option value="">Option 3</option>
					<option value="">Option 4</option>
					<option value="">Option 5</option>
				</select>
			</div>

			<div class="form-group d-flex justify-content-end">
				<button type="submit" name="submit" id="submit" class="btn btn-blue m-2">Arrange Interview</button>
			</div>
		</fieldset>
	</form>
	
</div>

<?php require_once("../templates/footer.php") ?>