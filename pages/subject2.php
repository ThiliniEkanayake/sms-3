<?php require_once("../php/database.php"); ?>

<?php
    $result_set = $con->select('subjects');
?>


<?php
if(isset($_POST['del']))
{
    $del = $_POST['sub_id'];
    $query = mysqli_query("DELETE FROM subjects where sub_id='$del'", $con);
}
?>

<?php 

	if(isset($_GET['delete']))
	{
		$con->update("admissions",array("state"=>"deleted"),array("index_number"=>$_GET["delete"]));
	}
?>


<?php require_once("../templates/header.php") ;?>
<?php require_once("../templates/aside.php"); ?>



<div id="content" class="col-11 col-md-8 col-lg-9 flex-col align-items-center justify-content-start">

		<div class="col-12 flex-col" style="overflow-x: scroll;overflow-y: hidden;">
            
        <?php  ?>

		<table class="table-strip-dark">
			<caption class="p-5">Subjects</caption>
			<thead>
				<tr>
					<th>Subject id</th>
					<th>Subject Code</th>
					<th>Subject Name</th>

					<th>Update</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>

				<?php 

				foreach ($result_set as $result) {
					$row ="<tr>";
					$row .= "<td>".$result['sub_id']."</td>";
					$row .= "<td>".$result['sub_code']."</td>";
					$row .= "<td>".$result['sub_name']."</td>";

					$row .= "<td><a href=". set_url('pages/update-subject.php?update='.$result['sub_id']).">update</a></td>";
                    $row .= "<td><a href=". set_url('pages/subjects.php?delete='.$result['sub_id']).">delete</a></td>";

                    
                    $row .= "</tr>";
                    
                   

					echo $row;
				}
                 ?>
                 
                
				
			</tbody>
        </table>
        
        <div class="login_buttons col-12 col-md-12 justify-content-end pr-5 d-flex align-items-center">
            <a class="btn btn-blue" href="<?php echo set_url('pages/add-subject2.php'); ?> ">Add Subject</a>
        
		</div>
		
     
		</div>  



</div>
<?php require_once("../templates/footer.php") ;?>