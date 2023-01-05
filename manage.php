<?php
if(!isset($_COOKIE['admin'])){
die("Please click <a href='../login.php'>here</a> to login");
	
}


    require 'control_class.php';
    $obj = new control_class;
   $content = $obj->display('content','content_id'); 
   $topic = $obj->display('topic','topic_id');
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
        <li><a class="active" href="manage.php">Manage</a></li>
        <li><a href="admin.php">Add</a></li>
        <li><a href="users.php">Students</a></li>
        <li><a onclick='return confirm("Are you sure?")' href="../subjects/logout.php">Log Out</a></li>
    </ul>

<div class="left">
<!-- -------------------Manage Questions-------------------- -->
  <h2>Manage Topics </h2>

                <table>
                    <thead>
                        <td style="width:50px">id</td>
                        <td style="width:100px">Name</td>
                        <td style="width:100px">Thumbnail</td>
                        <td style="width:600px">Description</td>
                        <td style="width:100px">Actions</td>
                    </thead>

                    <?php if ($topic[0]['topic_id']==NULL){ ?>
                      <tr>
                          <td colspan="4" style="text-align: center;"> No Topic Found. </td>
                      </tr>
                    <?php }else{ 

                     foreach($topic as $q){  ?>
                    <tr>
                        <td><?php echo $q['topic_id'] ?></td>  
                        <td><?php echo $q['topic_name'] ?></td>
                        <td><?php echo $q['topic_thumbnail']?></td>
                        <td><?php echo $q['topic_desc']?></td>
                        <td>
                            <a href="edit.php?a=*&b=topic&c=topic_id&d=<?php echo $q['topic_id'] ?>" style="color:green;">Edit</a> 
                            <a onclick="return confirm('Are you sure to delete?')"  href="delete.php?a=topic&b=topic_id&c=<?php echo $q['topic_id'] ?>" style="color:red" class="right">Delete </a>
                        </td>





                    <?php } } ?>
                </table>




  <!-- -------------------Manage Content-------------------- -->
  <h2>Manage Content </h2>


                <table>
                    <thead>
                        <td style="width:50px">id</td>
                        <td style="width:100px">Name</td>
                        <td style="width:100px">Thumbnail</td>
                        <td style="width:300px">Link</td>
                        <td style="width:200px">Topic</td>
                        <td style="width:50px">isPDF?</td>
                        <td style="width:100px">Actions</td>
                    </thead>

                    <?php if ($content[0]['content_id']==NULL){ ?>
                      <tr>
                          <td colspan="4" style="text-align: center;"> No Posts Found. </td>
                      </tr>
                    <?php }else{ 

                     foreach($content as $n){ ?>
                    <tr>
                        <td><?php echo $n['content_id'] ?></td>  
                        <td><?php echo $n['content_name']?></td>
                        <td><?php echo $n['content_thumbnail']?></td>
                        <td><?php echo $n['content_link']?></td>
                        <td><?php echo $n['topic']?></td>
                        <td><?php if($n['ispdf']==1){
                            echo "Yes";
                        }else{
                            echo "No";
                        } ?></td>  
                        <td>
                            <form method="post">
                            <a href="edit.php?a=*&b=content&c=content_id&d=<?php echo $n['content_id'] ?>" style="color:green;">Edit</a> 
                            <a onclick="return confirm('Are you sure to delete?')"  href="delete.php?a=content&b=content_id&c=<?php echo $n['content_id'] ?>" style="color:red" class="right">Delete </a>
                        </form>
                        </td>





                    <?php } }  ?>
                </table>

</body>
</html>


