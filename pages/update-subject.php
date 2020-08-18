<?php require_once("../php/database.php"); ?>

<?php

if(isset($_POST['update']))
{
    $sub_code = $_POST['sub_code'];
    $sub_name = $_POST['sub_name'];

    $sql = "UPDATE subjects"."SET sub_name = $sub_name"."WHERE sub_code = $sub_code";

    $retval = mysqli_query($sql, $con);

    if(!$retval)
    {
        echo "Could not update data";
    }
    else
    {
        echo "Updated data successfully";
    }
}

?>


<?php require_once("../templates/header.php") ;?>
<?php require_once("../templates/aside.php"); ?>


<div id="content" class="col-11 col-md-8 col-lg-9 flex-col align-items-center justify-content-start">

<h2 class="fs-30">Update Subjects</h2>
		
	<hr class="w-100">

    <form action="<?php echo set_url('pages/update-subject.php'); ?>" class="col-12 align-items-start" method="post">

        <div class="form-group mt-1">
            <label>Subject Code</label>
            <input type="text" name="sub_code"  value="">
            
        </div>

        <div class="form-group mt-1">
            <label>Subject Name</label>
            <input type="text" name="sub_name"  value="">
        </div>

        <div class="w-100 p-1"></div>
		<div class="form-group d-flex flex-row w-auto float-right">
			
			<button type="submit" name="submit" class="btn btn-blue w-auto m-1">Update</button>
		</div>
        

    </form>




</div>

<?php require_once("../templates/footer.php") ;?>