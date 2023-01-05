<?php 
require 'auth.php';
$a = $_GET['a'];
$b = $_GET['b'];
$c = $_GET['c'];
$d = $_GET['d'];



if(isset($_POST['submit'])){
	$data = "";
	foreach($_POST as $k => $v){
		 if($k !== 'submit') {
		if(!empty($data)) $data .=", ";
        $data .= "`{$k}` = '{$v}'";
    }
    
    
	$post = $obj_admin->update($b,$data,$c, $d);
	if($b=='student'){
    header('Location:users.php');
	    
	}else{
	    header('Location:manage.php');
        
    }
}

}

$res = $obj_admin->edit($a, $b, $c, $d);

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../../style/admin.css">
	<style type="text/css">
		.form{
			width: 30%;
			margin: 0 auto;
			padding: 30px;
			border: 1px solid black;
			margin-top: 20px;
		}
		textarea{
			width: 100%;
			resize: none;
		}
	</style>
</head>
<body>


<div class="form">
	<form method="post">
	<?php
	
		foreach ($res as $key => $value) {
			 if(is_int($key) != 1){
				?>
				<label><?php echo $key; ?></label><br>
				<textarea name="<?php echo $key ?>" value="<?php echo $value ?>"><?php echo $value ?></textarea>  <br><br>



				<?php
			}	
		}
			?>
			
<input type="submit" name="submit" value="submit">
</form>


</div>


</body>
</html>
