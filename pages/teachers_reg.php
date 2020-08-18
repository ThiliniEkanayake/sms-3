
<?php require_once("../php/database.php") ?>

<?php 

	$ID = '';
	$name_with_initials = '';
	$full_name = '';
	$gender = '';
	$dob = '';
	$address = '';
	$email = '';
	$contact_number = '';
	$subjects='';
	$grade ='';
	$class='';

	if(isset($_POST['submit'])){

		$ID = $_POST['id'];
		$name_with_initials = $_POST['name_with_initials'];
		$full_name = $_POST['fullname'];
		
		$gender = $_POST['gender'];
		$dob = $_POST['dob'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$contact_number = $_POST['contact_number'];
		$subjects=$_POST['subjects'];
	    $grade =$_POST['grade'];
	    $class=$_POST['class'];
		
		$required_fields = array();
		$required_fields['id']=50;
		$required_fields['name_with_initials']=50;
		$required_fields['fullname']=100;
		
		$required_fields['gender']=5;
		$required_fields['dob']=Null;
		$required_fields['address']=200;
		$required_fields['email']=100;
		$required_fields['contact_number']=10;
		$required_fields['subjects']=100;
		$required_fields['grade']=2;
		$required_fields['class']=2;
		

	
		$all_errors = check_input_fields($required_fields);

		foreach ($all_errors[0] as $error) {
			echo $error." is required.<br>";
		}

		foreach ($all_errors[1] as $error) {
			echo $error." length must less than ".$required_fields[$error].".<br>";
		}

		if(empty($all_errors[0]) && empty($all_errors[1])){
			$data = array();
			 $data["id"]= $ID;
			 $data["name_with_initials"]= $name_with_initials;
			 $data["fullname"]= $full_name;
			 
			 $data["gender"]= $gender;
			 $data["dob"]= $dob;
			 $data["address"]= $address;
			 $data["email"]= $email;
			 $data["contact_number"]= $contact_number;
			 $data["subjects"]= $subjects;
			 $data["grade"]= $grade;
			 $data["class"]= $class;
			
			$result = $con ->insert('admission_teachers',$data);
			if($result){
				echo "Registration success";
			}else{
				echo "Registration Failed";
			}
		}

	}
 ?>


<?php require_once("../templates/header.php") ?>

<div id="content" class="col-12 flex-col align-items-center justify-content-start">
	<div class="registration-form col-12 col-md-8 col-lg-6 justify-content-center">
		<div class="admissions-header mt-5">
			<h2 class="fs-30">Teachers Registration</h2>
		</div> <!-- .admission-header -->
		<hr class="w-100">
		<form action="<?php echo set_url('pages/teachers_reg.php'); ?>" class="col-12 align-items-start" method="post">
				<fieldset >
					<legend>Teachers Info</legend>

					<div class="form-group">
						<label for="id">ID (<code title="required"> * </code>)</label>
						<input type="number" value="<?php if(isset($_POST['id'])){echo $_POST['id'];} ?>" name="id" placeholder="id" id="id">
					</div>

					<div class="form-group">
						<label for="name-with-initials">Name with initials (<code title="required"> * </code>)</label>
						<input type="text" value="<?php if(isset($_POST['name_with_initials'])){echo $_POST['name_with_initials'];} ?>" name="name-with-initials" placeholder="Name with initials" id="name-with-initials">
					</div>

					<div class="form-group">
						<label for="fullname">Full Name (<code title="required"> * </code>)</label>
						<input type="text" value="<?php if(isset($_POST['fullname'])){echo $_POST['fullname'];} ?>" name="full-name" placeholder="Full Name" id="full-name">
					</div>
                    <div class="form-group">
						<label for="subjects">Subject (<code title="required"> * </code>)</label>
						<select name="subjects" id="subjects" class="w-30">
							<option value="1">Mathematics</option>
							<option value="2">Sinhala</option>
							<option value="3">English</option>
							<option value="4">Science</option>
							<option value="5">Buddhism</option>
							<option value="6">History</option>
							<option value="7">Geography</option>
							<option value="8">Music</option>
							<option value="9">Art</option>
							<option value="10">Civics</option>
							<option value="11">Tamil</option>
							<option value="12">ICT</option>
							<option value="12">Agriculture</option>
						</select>
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
						<label for="class">Class (<code title="required"> * </code>)</label>
						<select name="class" id="class" class="w-30">
							<option value="1">A</option>
							<option value="2">B</option>
							<option value="3">C</option>
							<option value="4">D</option>
							<option value="5">E</option>
							<option value="6">F</option>
							<option value="7">G</option>
							<option value="8">H</option>
							<option value="9">I</option>
							<option value="10">J</option>
							<option value="11">K</option>
							<option value="12">L</option>
							<option value="12">M</option>
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
						<input type="date" value="<?php if(isset($_POST['dob'])){echo $_POST['dob'];} ?>" name="dob" id="dob" value="<?php echo date("Y-m-d"); ?>">
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
						<input type="number" value="<?php if(isset($_POST['contact_number'])){echo $_POST['contact_number'];} ?>" name="contact-number" placeholder="Contact Number" id="contact-number">
					</div>
					<div class="form-group d-flex flex-row w-auto float-right">
							<a href="<?php echo set_url('pages/teachers_reg.php'); ?>" class="btn btn-blue m-1">Reset Form</a>
							<button type="submit" name="submit" class="btn btn-blue w-auto m-1">Submit</button>
					</div>
				</fieldset>
			</div>
		</form>
	</div>
</div>


<?php require_once("../templates/footer.php") ?>