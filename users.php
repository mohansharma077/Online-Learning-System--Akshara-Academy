<?php
if(!isset($_COOKIE['admin'])){
die("Please click <a href='../login.php'>here</a> to login");
	
}

    require 'control_class.php';
    $obj = new control_class;
    $student = $obj->display('student','student_id'); 
   
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
    <title>Manage</title>
	<link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
        <ul>
        <li><a href="../subjects/gate.php">Go to site</a></li>
        <li><a  href="manage.php">Manage</a></li>
        <li><a href="admin.php">Add</a></li>
        <li><a class="active" href="users.php">Students</a></li>
        <li><a onclick='return confirm("Are you sure?")' href="../subjects/logout.php">Log Out</a></li>
    </ul>

<div class="left">
<!-- -------------------Manage Questions-------------------- -->
  <h2>Users </h2>

                <table>
                    <thead>
                        <td style="width:50px">id</td>
                        <td style="width:100px">Name</td>
                        <td style="width:100px">Email</td>
                        <td style="width:100px">Actions</td>
                    </thead>

                    <?php if ($student[0]['student_id']==NULL){ ?>
                      <tr>
                          <td colspan="4" style="text-align: center;"> No Topic Found. </td>
                      </tr>
                    <?php }else{ 

                     foreach($student as $q){  ?>
                    <tr>
                        <td><?php echo $q['student_id'] ?></td>  
                        <td><?php echo $q['name'] ?></td>
                        <td><?php echo $q['email']?></td>
                        <td>
                            <a href="edit.php?a=*&b=student&c=student_id&d=<?php echo $q['student_id'] ?>" style="color:green;">Edit</a> 
                            <a onclick="return confirm('Are you sure to delete?')"  href="delete.php?a=student&b=stdent_id&c=<?php echo $q['student_id'] ?>" style="color:red" class="right">Delete </a>
                        </td>





                    <?php } } ?>
                </table>



    

</body>
</html>


