
<?php 
include_once("config.php");

function set_url($url = none){
		return ($GLOBALS['base_url']."".$url);
}

function check_input_fields($fields){
	$errors_fields = array();
	$errors_len = array();
	foreach($fields as $field => $len){
		if (strlen(trim($_POST[$field])) == 0 ){
			array_push($errors_fields,$field);
		}else if($len != NULL && strlen(trim("".$_POST[$field])."") > $len){
			array_push($errors_len,$field);
		}
	}
	return array($errors_fields,$errors_len);
}

 ?>
