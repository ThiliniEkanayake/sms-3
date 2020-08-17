
<?php require_once("../templates/header.php") ;?>
<?php require_once("../templates/aside.php"); ?>

<div id="content" class="col-9 flex-col align-items-center justify-content-start">
	<div id="school-statistics" class="col-12  justify-content-center ">
		<h2 class="text-center p-5">School Statistics</h2>
		<div class="statistics-flex justify-content-center">	
			<div id="total-students" class="d-flex flex-col s-item align-items-center bg-lightgreen m-2 p-3">
				<h3 class="bb pb-1 text-center">Total Students</h3>
				<span class="pt-1">1000</span>
			</div> <!-- #total-student -->
			<div id="total-teachers" class="d-flex flex-col s-item align-items-center bg-lightgreen m-2 p-3">
				<h3 class="bb pb-1 text-center">Total Students</h3>
				<span class="pt-1">1000</span>
			</div> <!-- #total-teachers -->
			<div id="total-classes" class="d-flex flex-col s-item align-items-center bg-lightgreen m-2 p-3">
				<h3 class="bb pb-1  text-center">Total Students</h3>
				<span class="pt-1">1000</span>
			</div> <!-- #total-classes -->
			<div id="total-subjects" class="d-flex flex-col s-item align-items-center bg-lightgreen m-2 p-3">
				<h3 class="bb pb-1  text-center">Total Students</h3>
				<span class="pt-1">1000</span>
			</div> <!-- #total-subjects -->
			
		</div>
	</div> <!-- #school-statistics -->

	<div id="school-attendance">
		<h2 class="text-center p-5">School Attendance</h2>
		<div class="statistics-flex">	
			<div id="total-students-attendance" class="d-flex flex-col align-items-center bg-lightgreen m-2 p-3">
				<h3 class="bb pb-1 text-center">Total Students Attendance</h3>
				<span class="pt-1"> Presents : 900</span>
				<span class="pt-1"> Absent : 100</span>
			</div> <!-- #total-student-attendance -->

			<div id="total-teachers-attendance" class="d-flex flex-col align-items-center bg-lightgreen m-2 p-3">
				<h3 class="bb pb-1 text-center">Total Teachers Attendance</h3>
				<span> Presents : 135</span>
				<span> Absent : 10</span>
			</div> <!-- #total-teachers-attendance -->

		</div>
	</div> <!-- #school-attendance -->
</div> <!-- #content -->

<?php require_once("../templates/footer.php"); ?>