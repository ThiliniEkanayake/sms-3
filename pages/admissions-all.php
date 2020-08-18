
<?php require_once("../php/database.php"); ?>

<?php 

	if(isset($_GET['delete'])){
		$con->update("admissions",array("state"=>"deleted"),array("admission_id"=>$_GET["delete"]));
		header("Location:". explode(".php?","http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'])[0] .".php" );	
	}

	$con->get(array("admission_id","admission_type","full_name","grade","address","state"));
	if(isset($_GET['admission-search'])){
		if($_GET['admission-search'] == "all"){
			$result_set = $con->select('admissions');
		}else if($_GET['admission-search'] == "accepted"){
			$con->where(array("state"=>"accepted"));
			$result_set = $con->select('admissions');
		}else if($_GET['admission-search'] == "rejected"){
			$con->where(array("state"=>"rejected"));
			$result_set = $con->select('admissions');
		}
		else if($_GET['admission-search'] == "read"){
			$con->where(array("state"=>"read"));
			$result_set = $con->select('admissions');
		}
		else if($_GET['admission-search'] == "unread"){
			$con->where(array("state"=>"unread"));
			$result_set = $con->select('admissions');
		}
		else if($_GET['admission-search'] == "deleted"){
			$con->where(array("state"=>"deleted"));
			$result_set = $con->select('admissions');
		}
	}else{
		$result_set = $con->select('admissions');
	}
 ?>
<?php require_once("../templates/header.php"); ?>
<?php require_once("../templates/aside.php"); ?>

<div id="content" class="col-11 col-md-8 col-lg-9 flex-col align-items-center justify-content-start">
	<div class="admissions-header mt-5">
		<h2 class="fs-30">Admissions Managment</h2>
	</div> <!-- .admission-header -->
	<div id="all-admission-table"  class="admissions-table">
		<hr>
		<div class="d-flex justify-content-center align-items-center">
			<form action="<?php echo set_url('pages/admissions-all.php'); ?>" method="get" class="d-flex align-items-center">
				<label for="" class="mr-3 d-normal">Search : </label>
				<select name="admission-search" id="admission-search" style="width: 100px">
					<option value="all" <?php if(isset($_GET['admission-search'])){if($_GET['admission-search'] == "all"){echo 'selected="selected"';}}else{echo 'selected="selected"';} ?>>All</option>
					<option value="accepted" <?php if(isset($_GET['admission-search']) && ($_GET['admission-search'] == "accepted")){echo 'selected="selected"';} ?> >Accepted</option>
					<option value="rejected" <?php if(isset($_GET['admission-search']) && ($_GET['admission-search'] == "rejected")){echo 'selected="selected"';} ?> >Rejected</option>
					<option value="deleted" <?php if(isset($_GET['admission-search']) && ($_GET['admission-search'] == "deleted")){echo 'selected="selected"';} ?> >Deleted</option>
					<option value="read" <?php if(isset($_GET['admission-search']) && ($_GET['admission-search'] == "read")){echo 'selected="selected"';} ?> >Read</option>
					<option value="unread" <?php if(isset($_GET['admission-search']) && ($_GET['admission-search'] == "unread")){echo 'selected="selected"';} ?> >Unread</option>
				</select>
				<input type="submit" class="btn btn-blue ml-3" value="Show">
			</form>
		</div>
		<div class="col-12 flex-col" style="overflow-x: scroll;overflow-y: hidden;">
			
		<table class="table-strip-dark">
			<caption class="p-5"><?php if(isset($_GET['admission-search'])){ echo ucfirst($_GET['admission-search']);} ?> Admissions</caption>
			<thead>
				<tr>
					<th>Adm. ID</th>
					<th>Adm. type</th>
					<th>Full Name</th>
					<th>grade</th>
					<th>Address</th>
					<th>state</th>
					<th>View</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>

				<?php 

				foreach ($result_set as $result) {
					$row ="<tr>";
					$row .= "<td>".$result['admission_id']."</td>";
					$row .= "<td>".$result['admission_type']."</td>";
					$row .= "<td>".$result['full_name']."</td>";
					$row .= "<td>".$result['grade']."</td>";
					$row .= "<td>".$result['address']."</td>";
					$row .= "<td>".$result['state']."</td>";
					$row .= "<td><a href=\"admission-view.php?admission-id=".$result['admission_id']."&back=". "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']."\">view</a></td>";
					$row .= "<td><a href=". set_url('pages/admissions-all.php?delete='.$result['admission_id']).">delete</a></td>";
					$row .= "</tr>";

					echo $row;
				}
				 ?>
				
			</tbody>
		</table>
		</div>
	</div>
</div>

<?php require_once("../templates/footer.php"); ?>