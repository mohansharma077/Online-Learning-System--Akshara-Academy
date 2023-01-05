<?php


$server="localhost";
$username="root";
$password="";
$database="onlinelearning";
$un_message = "";
$su_message = "";

$conn=mysqli_connect($server,$username,$password,$database);

if(!$conn){
    die("connection failed");
}

if(isset($_POST['login'])){

    $email=$_POST['email'];
    $password=$_POST['password'];

    $st="select * from student where email='$email' && password='$password'";
    $result1=mysqli_query($conn,$st);
    $num=mysqli_num_rows($result1);
    $row = $result1 -> fetch_array(MYSQLI_ASSOC);
if($num>0){
    $su_message="Login Success";
    setcookie('login',true,time()+86400, '/');
    if($row['isadmin']==1){
        setcookie('admin',true,time()+86400, '/');
        header('Location:admin/admin.php');
   }else{
    header('Location:subjects/gate.php');
 }
}
    
else{
    $un_message='<p style="color:red">Incorrect email or password.</p>';
}
}
?>