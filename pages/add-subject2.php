<?php require_once("../php/database.php"); ?>


<?php

    $sub_code = '';
    $sub_name = '';

    if(isset($_POST['submit']))
    {
        $sub_code = $_POST['sub_code'];
        $sub_name = $_POST['sub_name'];

        $required_fields = array();
        $required_fields ['sub_code'] = 20;
        $required_fields ['sub_name'] = 50;

        $data = array();
         $data["sub_code"] = $sub_code;
         $data["sub_name"] = $sub_name;

        $result1 = $con -> select('subjects') ;





        
        
            $result = $con -> insert('subjects', $data);

            if($result)
            {
                echo "Added successfully";
            }
            else{
                echo "Added Fail";
            }
        
        
    
    }
?>





<?php require_once("../templates/header.php") ;?>
<?php require_once("../templates/aside.php"); ?>

<div id="content" class="col-11 col-md-8 col-lg-9 flex-col align-items-center justify-content-start">

        
    

    <h2 class="fs-30">Add Subjects</h2>
		
	<hr class="w-100">

    <form action="<?php echo set_url('pages/add-subject2.php'); ?>" class="col-12 align-items-start" method="post">

        <div class="form-group mt-1">
            <label>Subject Code</label>
            <input type="text" name="sub_code"  value="<?php echo $sub_code; ?>">
            
        </div>

        <div class="form-group mt-1">
            <label>Subject Name</label>
            <input type="text" name="sub_name"  value="<?php echo $sub_name; ?>">
        </div>

        <div class="w-100 p-1"></div>
		<div class="form-group d-flex flex-row w-auto float-right">
			
			<button type="submit" name="submit" class="btn btn-blue w-auto m-1">Save</button>
		</div>
        

    </form>
</div>
<?php require_once("../templates/footer.php") ;?>