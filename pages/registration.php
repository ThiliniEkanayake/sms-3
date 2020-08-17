
<?php require_once("../templates/header.php") ?>
<?php require_once("../php/database.php") ?>


<?php 

	$index_number = '';
	$name_with_initials = '';
	$full_name = '';
	$grade='';
	$genfer = '';
	$dob = '';
	$address = '';
	$email = '';
	$contact_number = '';
	$father_name = '';
	$parent_type = "";
	$already_have_account = false;
	$parent_account_id = "";
	$father_occupation = '';
	$father_contact_number = '';
	$father_email = "";
	$mother_name = '';
	$mother_occupation = '';
	$mother_contact_number = '';
	$mother_email = "";
	$guardian_name = '';
	$guardian_occupation = '';
	$guardian_contact_number = '';
	$guardian_email = "";

	if(isset($_POST['submit'])){

		// $index_number = $_POST['index-number'];
		$name_with_initials = $_POST['name-with-initials'];
		$full_name = $_POST['full-name'];
		$grade =$_POST['grade'];
		$gender = $_POST['gender'];
		$dob = $_POST['dob'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$contact_number = $_POST['contact-number'];
		if(isset($_POST['already-have-account'])){
			$already_have_account = $_POST['already-have-account'];
			$parent_account_id = $_POST['parent-account-id'];
		}else{
			$parent_type = $_POST['parent-type'];
			$father_name = $_POST['father-name'];
			$father_occupation = $_POST['father-occupation'];
			$father_contact_number = $_POST['father-contact-number'];
			$father_email = $_POST['father-email'];
			$mother_name = $_POST['mother-name'];
			$mother_occupation = $_POST['mother-occupation'];
			$mother_contact_number = $_POST['mother-contact-number'];
			$mother_email = $_POST['mother-email'];
			$guardian_name = $_POST['guardian-name'];
			$guardian_occupation = $_POST['guardian-occupation'];
			$guardian_contact_number = $_POST['guardian-contact-number'];
			$guardian_email = $_POST['guardian-email'];
		}



		$required_fields = array();
		// $required_fields['index-number']=6;
		$required_fields['name-with-initials']=255;
		$required_fields['full-name']=255;
		$required_fields['grade']=2;
		$required_fields['gender']=10;
		$required_fields['dob']=Null;
		$required_fields['address']=255;
		$required_fields['email']=100;

		if($already_have_account == true){
			$required_fields['parent-account-id']=6;
		}else{
			if($parent_type == "father"){
				$required_fields['father-name']=100;
				$required_fields['father-occupation']=100;
				$required_fields['father-contact-number']=10;
				$required_fields['father-email']=100;
			}else if($parent_type == "mother"){
				$required_fields['mother-name']=100;
				$required_fields['mother-occupation']=100;
				$required_fields['mother-contact-number']=10;
				$required_fields['mother-email']=100;
			}else{
				$required_fields['guardian-name']=100;
				$required_fields['guardian-occupation']=100;
				$required_fields['guardian-contact-number']=10;
				$required_fields['guardian-email']=100;
			}
		}


		$all_errors = check_input_fields($required_fields);

		foreach ($all_errors[0] as $error) {
			echo $error." is required.<br>";
		}

		foreach ($all_errors[1] as $error) {
			echo $error." length must less than ".$required_fields[$error].".<br>";
		}

		$con->where(array("account_id"));
		$con->select("parents");

		if($con->db->num_rows() != 1){
			echo "Parent id is not valid.";
		}

		if(empty($all_errors[0]) && empty($all_errors[1])){
			$data = array();
			 // $data["index_number"]= $index_number;
			 $data["name_with_initials"]= $name_with_initials;
			 $data["full_name"]= $full_name;
			 $data["grade"]= $grade;
			 $data["gender"]= $gender;
			 $data["dob"]= $dob;
			 $data["address"]= $address;
			 $data["email"]= $email;
			 $data["contact_number"]= $contact_number;
			 $data['parent_type'] = $parent_type;
			 $data['already_have_account'] = $already_have_account;
			 $data['parent_account_id'] = $parent_account_id;
			 $data["father_name"]= $father_name;
			 $data["father_occupation"]= $father_occupation;
			 $data["father_contact_number"]= $father_contact_number;
			 $data["father_email"]= $father_email;
			 $data["mother_name"]= $mother_name;
			 $data["mother_occupation"]= $mother_occupation;
			 $data["mother_contact_number"]= $mother_contact_number;
			 $data["mother_email"]= $mother_email;
			 $data["guardian_name"]= $guardian_name;
			 $data["guardian_occupation"]= $guardian_occupation;
			 $data["guardian_contact_number"]= $guardian_contact_number;
			 $data["guardian_email"]= $guardian_email;
			 
			$result = $con ->insert('admissions',$data);
			if($result){
				echo "Registration success";
			}else{
				echo "Registration Failed";
			}
		}

	}
 ?>

<div id="content" class="col-12 flex-col align-items-center justify-content-start">
	<div class="registration-form col-12 justify-content-center">
		<div class="admissions-header mt-5">
			<h2 class="fs-30">Student Admission</h2>
		</div> <!-- .admission-header -->
		<hr class="w-100">
		<form action="<?php echo set_url('pages/registration.php'); ?>" class="col-12 align-items-start" method="post">
			<div class="col-12 col-md-6 p-3">
				<fieldset >
					<legend>Student Info</legend>

					<!-- <div class="form-group">
						<label for="index-number">Index Number (<code title="required"> * </code>)</label>
						<input type="number" value="<?php //if(isset($_POST['index-number'])){echo $_POST['index-number'];} ?>" name="index-number" placeholder="Index Number" id="index-number">
					</div> -->

					<div class="form-group">
						<label for="name-with-initials">Name with initials (<code title="required"> * </code>)</label>
						<input type="text" value="<?php if(isset($_POST['name-with-initials'])){echo $_POST['name-with-initials'];} ?>" name="name-with-initials" placeholder="Name with initials" id="name-with-initials">
					</div>

					<div class="form-group">
						<label for="full-name">Full Name (<code title="required"> * </code>)</label>
						<input type="text" value="<?php if(isset($_POST['full-name'])){echo $_POST['full-name'];} ?>" name="full-name" placeholder="Full Name" id="full-name">
					</div>

					<div class="form-group">
						<label for="grade">Grade (<code title="required"> * </code>)</label>
						<select name="grade" id="grade" class="w-30">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
							<option value="12">13</option>
						</select>
					</div>

					<div class="form-group">
						<label for="gender">Gender (<code title="required"> * </code>)</label>
						<div id="gender" value="<?php if(isset($_POST['gender'])){echo $_POST['gender'];} ?>" class="w-100 d-flex">
							<label for="male" class="w-auto"><input type="radio" name="gender" id="male" value="male" checked>Male</label>
							<label for="female" class="w-auto"><input type="radio" name="gender" id="female" value="female">Female</label>
						</div>
					</div>

					<div class="form-group">
						<label for="dob">Date of Birth (<code title="required"> * </code>)</label>
						<input type="date" value="<?php if(isset($_POST['dob'])){echo $_POST['dob'];} ?>" name="dob" id="dob" value="<?php echo date("Y-m-d"); ?>" onchange="validate_birthday(this,6)">
						<label style="color: red; display: none;" for="errors"></label>
					</div>

					<div class="form-group">
						<label for="address">Address (<code title="required"> * </code>)</label>
						<input type="text" value="<?php if(isset($_POST['address'])){echo $_POST['address'];} ?>" name="address" placeholder="Address" id="address">
					</div>

					<div class="form-group">
						<label for="email">Email Address (<code title="required"> * </code>)</label>
						<input type="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>" name="email" placeholder="Email Address" id="email">
					</div>

					<div class="form-group">
						<label for="contact-number">Contact Number (<code title="required"> * </code>)</label>
						<input type="text" value="<?php if(isset($_POST['contact-number'])){echo $_POST['contact-number'];} ?>" name="contact-number" placeholder="Contact Number" id="contact-number" oninput="validate_contact_number(this)">
						<label for="errors" style="color: red;display: none;"></label>
					</div>
				</fieldset>
			</div>
			<div  class="col-12 col-md-6 p-3 flex-col">
				<fieldset>
					<legend>Parent and Gurdian Info</legend>
					<div class="form-group">
						<label for="already-have-account" class="ml-5 d-flex" style="color:red">
							<p class="d-inline">Alredy have Parent account </p>
							<input type="checkbox" onchange="already_have_parent_account(this,'parent-details-wrapper','parent-account-field')" name="already-have-account" id="already-have-account" class="ml-3">
						</label>
					</div>

					<div id="parent-account-field" class="col-12 no-collapsed">
						<div class="form-group">
							<label for="parent-account-id">Parent Account ID</label>
							<input type="text" name="parent-account-id" id="parent-account-id" placeholder="Parent account ID">
						</div>
					</div>

					<div id="parent-details-wrapper">
						<div class="form-group">
							<label for="parent-type">Select parent or guardian : </label>
							<div class="d-flex ">
								<select name="parent-type"  onchange="registration_parent_change(this)" id="parent-type"  style="width: 200px;">
									<option value="father" <?php if(isset($_POST['parent-type'])){if($_POST['parent-type'] == "father"){echo 'selected="selected"';}}else{echo "selected='selected'";} ?> >Father</option>
									<option value="mother" <?php if(isset($_POST['parent-type']) && ($_POST['parent-type'] == "mother")){echo "selected='selected'";}  ?> >Mother</option>
									<option value="guardian" <?php if(isset($_POST['parent-type']) && ($_POST['parent-type'] == "guardian")){echo "selected='selected'";}  ?> >Guardian</option>
								</select>
							</div>
						</div>
						<div id="father" class="collapsed">
							<div class="form-group">
								<label for="father-name">Father Name (<code title="required"> * </code>)</label>
								<input type="text" value="<?php if(isset($_POST['father-name'])){echo $_POST['father-name'];} ?>" name="father-name" placeholder="Father Name" id="father-name" >
							</div>

							<div class="form-group">
								<label for="father-occupation">Father Occupation (<code title="required"> * </code>)</label>
								<input type="text" value="<?php if(isset($_POST['father-occupation'])){echo $_POST['father-occupation'];} ?>" name="father-occupation" placeholder="Father Occupation" id="father-occupation" >
							</div>

							<div class="form-group">
								<label for="father-contact-number">Father Contact Number (<code title="required"> * </code>)</label>
								<input type="text" value="<?php if(isset($_POST['father-contact-number'])){echo $_POST['father-contact-number'];} ?>" name="father-contact-number" placeholder="Father Contact Number" id="father-contact-number"  oninput="validate_contact_number(this)">
								<label for="errors" style="color: red;display: none;"></label>
							</div>

							<div class="form-group">
								<label for="father-email">Father Email (<code title="required"> * </code>)</label>
								<input type="email" value="<?php if(isset($_POST['father-email'])){echo $_POST['father-email'];} ?>" name="father-email" placeholder="Father Email" id="father-email" >
							</div>
						</div>

						<div id="mother" class="no-collapsed">
							<div class="form-group">
								<label for="mother-name">Mother Name (<code title="required"> * </code>)</label>
								<input type="text" value="<?php if(isset($_POST['mother-name'])){echo $_POST['mother-name'];} ?>" name="mother-name" placeholder="Mother Name" id="mother-name">
							</div>

							<div class="form-group">
								<label for="mother-occupation">Mother Occupation (<code title="required"> * </code>)</label>
								<input type="text" value="<?php if(isset($_POST['mother-occupation'])){echo $_POST['mother-occupation'];} ?>" name="mother-occupation" placeholder="Mother Occupation" id="mother-occupation">
							</div>

							<div class="form-group">
								<label for="mother-contact-number">Mother Contact Number (<code title="required"> * </code>)</label>
								<input type="text" value="<?php if(isset($_POST['mother-contact-number'])){echo $_POST['mother-contact-number'];} ?>" name="mother-contact-number" placeholder="Mother Contact Number" id="mother-contact-number" oninput="validate_contact_number(this)">
								<label for="errors" style="color: red;display: none;"></label>
							</div>

							<div class="form-group">
								<label for="mother-email">Mother Email (<code title="required"> * </code>)</label>
								<input type="email" value="<?php if(isset($_POST['mother-email'])){echo $_POST['mother-email'];} ?>" name="mother-email" placeholder="Mother Email" id="mother-email">
							</div>						
						</div>

						<div id="guardian" class="no-collapsed">
							<div class="form-group">
								<label for="guardian-name">Guardian Name (<code title="required"> * </code>)</label>
								<input type="text" value="<?php if(isset($_POST['guardian-name'])){echo $_POST['guardian-name'];} ?>" name="guardian-name" placeholder="Guardian Name" id="guardian-name">
							</div>

							<div class="form-group">
								<label for="guardian-occupation">Guardian Occupation (<code title="required"> * </code>)</label>
								<input type="text" value="<?php if(isset($_POST['guardian-occupation'])){echo $_POST['guardian-occupation'];} ?>" name="guardian-occupation" placeholder="Guardian Occupation" id="guardian-occupation">
							</div>

							<div class="form-group">
								<label for="guardian-contact-number">Guardian Contact Number (<code title="required"> * </code>)</label>
								<input type="number" value="<?php if(isset($_POST['guardian-contact-number'])){echo $_POST['guardian-contact-number'];} ?>" name="guardian-contact-number" placeholder="Guardian Contact Number" id="guardian-contact-number" oninput="validate_contact_number(this)">
								<label for="errors" style="color: red;display: none;"></label>
							</div>

							<div class="form-group">
								<label for="guardian-email">Guardian Email (<code title="required"> * </code>)</label>
								<input type="email" value="<?php if(isset($_POST['guardian-email">'])){echo $_POST['					</div>	'];} ?>" name="guardian-email" placeholder="Guardian Email" id="guardian-email">
							</div>	
						</div>
						<div class="w-100 p-1"></div>
						<div class="form-group d-flex flex-row w-auto float-right">
							<a href="<?php echo set_url('pages/registration.php'); ?>" class="btn btn-blue m-1">Reset Form</a>
							<button type="submit" name="submit" id="submit" class="btn btn-blue w-auto m-1">Submit</button>
						</div>
					</div>
				</fieldset>
			</div>
		</form>
	</div>
</div>


<?php require_once("../templates/footer.php") ?>