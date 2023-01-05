 <?php
 
if(!isset($_COOKIE['admin'])){
die("Please click <a href='../login.php'>here</a> to login");
	
}

 
$server="localhost";
$username="root";
$password="";
$database="onlinelearning";
$un_message = "";
$su_message = "";
$un_message1 = "";
$su_message1 = "";

try{
$conn=new PDO("mysql:host={$server}; dbname={$database}", $username,  $password);
}catch (PDOException $message ) {
			echo $message->getMessage();
		}



 if(isset($_POST['post_cont'])){
    $data = $_POST;

   $cont_link = $data['cont_link'];
 	if(isset($data['ispdf'])){
 		$ispdf = $data['ispdf'];
 	}else{
 		$ispdf = 0;
 	}
 	if ($ispdf == 1) {
 		$pdffile = $_FILES['pdffile'];
 		$pdfstring = bin2hex(openssl_random_pseudo_bytes(2));
 		$pdfname =$pdfstring."-".$pdffile["name"];
 		$pdftempname = $pdffile["tmp_name"];

 		$pdffolder = "../Files/pdf/".$pdfname;
 		$ext = pathinfo($pdfname, PATHINFO_EXTENSION);
		if ($ext !== 'pdf') {
    		die("Only PDF file is allowed.");
			}

 		if (file_exists($pdffolder)) {
			$un_message = "PDF File Name already exists";
		  } else if(!move_uploaded_file($pdftempname, $pdffolder)){
			$un_message = "Problem while uploading PDF.";
			}
		$cont_link = $pdfname;
 	}else{
 	}

 	$file = $_FILES['cont_file'];
   $cont_name = $data['cont_name'];
 	$topic = $data['topic'];
 	$filestring = bin2hex(openssl_random_pseudo_bytes(2));
 	$filename =$filestring."-".$file["name"];
	$tempname = $file["tmp_name"];


	if($cont_name == NULL || $filename == NULL || $topic == NULL || $cont_link == NULL){
		$un_message = "Please Fill all fields";
	}
	else{
		$folder = "../Files/content/".$filename;
		if (file_exists($folder)) {
			$un_message = "File Name already exists";
		  } else if(!move_uploaded_file($tempname, $folder)){
			$un_message = "Problem while uploading";
			}

		else{

		try{
			$post_cont = $conn-> prepare('INSERT INTO content(content_name, content_link, content_thumbnail, topic,ispdf)VALUES(:a,:b,:c, :d, :e)');
			$post_cont->bindparam(':a', $cont_name);
			$post_cont->bindparam(':b', $cont_link);
			$post_cont->bindparam(':c', $filename);
			$post_cont->bindparam(':d', $topic);
			$post_cont->bindparam(':e', $ispdf);

			$post_cont->execute();
			$su_message = "Content posted successfully.";
		}
		catch(PDOException $exception){
			echo $exception->getMessage();
			echo "error";
		}

	}
}
}




 if(isset($_POST['post_top'])){
    $data1 = $_POST;
    $file1 = $_FILES['top_file'];

    $top_name = $data1['top_name'];
    $top_desc = $data1['top_desc'];
 	$filename1 =$file1["name"];
	$tempname1 = $file1["tmp_name"];

	if($top_name == NULL || $filename1 == NULL){
		$un_message1 = "Please Fill all fields";
	}
	else{
		$folder1 = "../Files/topic/".$filename1;
		if (file_exists($folder1)) {
			$un_message1 = "File Name already exists";
		  } else if(!move_uploaded_file($tempname1, $folder1)){
			$un_message1 = "Problem while uploading";
			}

		else{

		try{
			$post_top = $conn-> prepare('INSERT INTO topic(topic_name,  topic_thumbnail, topic_desc)VALUES(:a,:b, :c)');
			$post_top->bindparam(':a', $top_name);
			$post_top->bindparam(':b', $filename1);
			$post_top->bindparam(':c', $top_desc);
			$post_top->execute();
			$su_message1 = "Topic posted successfully.";
		}
		catch(PDOException $exception){
			echo $exception->getMessage();
			echo "error";
		}

	}
}
}



try {
			$sql = "SELECT * FROM topic ORDER BY topic_id DESC";			
			$stmt = $conn->prepare($sql);			
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			$topic = $stmt->fetchAll();
		  } catch (PDOException $exception) {
			echo $exception->getMessage();
		  }







?>




<html>
<head>
    <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
    <title>Manage</title>
	<link rel="stylesheet" type="text/css" href="admin.css">
	
	<style type="text/css">


		.topic, .content{
			margin: 0 auto;
		width: 30%;
		margin-bottom: 50px; 
		border:1px solid black;
		 padding: 10px;
		}
		input[type=text]{
			width: 80%;
		}

		.su{
			color: green;
		}
		.un{
			color: red;
		}
		#pdffile{
			display: none;
		}
	</style>
</head>
<body>
       <ul>
        <li><a href="../subjects/gate.php">Go to site</a></li>
        <li><a href="manage.php">Manage</a></li>
        <li><a class="active" href="admin.php">Add</a></li>
        <li><a href="users.php">Students</a></li>
        <li><a onclick='return confirm("Are you sure?")' href="../subjects/logout.php">Log Out</a></li>
    </ul>
    
	<div class="content">
		<h2 style="text-align: center;">Post Content</h2>
	 <form class="" method="post" enctype="multipart/form-data">
                        <!-- <p class="title">Post Assignment</p> -->

                        <label>Content Name</label> <br>
                        <input type="text" name="cont_name"> <br> <br>

                        <input type="checkbox" id="ispdf" name="ispdf" value="1" onchange="validate()">
                        <label>is PDF?</label> <br><br>

                        <div id="pdffile">
                        	<label>PDF File</label><br>
                        	<input type="file" name="pdffile"><br> <br>
                        </div>

                        <div id="link">
                        <label>Content Link</label> <br>
                        <input type="text" name="cont_link"> <br><br>
                        </div>

                        <label>Topic</label><br>
                        <select name="topic">
                        <?php foreach ($topic as $t){ ?>
                        	<option value="<?php echo $t['topic_name']; ?>" >
                        		<?php echo $t['topic_name']; ?>
                        	</option>
                        <?php } ?>                        	
                        
                        </select>
                         <br><br>


                       

                        <label>Thumbnail</label><br>
                        <input type="file" name="cont_file"><br> <br>
                       <div class="un"><?php echo $un_message; ?></div>
                       <div class="su"><?php echo $su_message; ?></div>
                        <input type="submit" name="post_cont" value="Post">
	</form>
	</div>



		<div class="topic" style="">
			<h2 style="text-align: center;">Post Topic</h2>
	 <form class="" method="post" enctype="multipart/form-data">
                        <!-- <p class="title">Post Assignment</p> -->

                        <label>Topic Name</label> <br>
                        <input type="text" name="top_name"> <br> <br>

                        <label>Topic Description</label> <br>
                        <input type="text" name="top_desc"> <br> <br>
                       

                        <label>Thumbnail</label><br>
                        <input type="file" name="top_file"><br> <br>
                       <div class="un"><?php echo $un_message1; ?></div>
                       <div class="su"><?php echo $su_message1; ?></div>
                        <input type="submit" name="post_top" value="Post">
	</form>
	</div>
	<script type="text/javascript">
    function validate() {
        if (document.getElementById('ispdf').checked) {
            document.getElementById('pdffile').style.display="block";
            document.getElementById('link').style.display="none";
        } else {
            document.getElementById('pdffile').style.display="none";
            document.getElementById('link').style.display="";

        }
    }
</script>

</body>
</html>
