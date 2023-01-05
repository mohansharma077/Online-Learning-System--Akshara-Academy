<?php
$server="localhost";
$username="root";
$password="";
$database="onlinelearning";
$un_message = "";
$su_message = "";
$name = "";
$email = "";
$password1 = "";
$password2 = "";


$conn=mysqli_connect($server,$username,$password,$database);

if(!$conn){
    die("connection failed");
}
if(isset($_POST['register']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password1=$_POST['password1'];
    $password2=$_POST['password2'];

   if($password1!==$password2){
        $un_message='Passwords not matched.';
    }
    else{
    $em="select *from student where email='$email'";
    $result1=mysqli_query($conn,$em);
    $num=mysqli_num_rows($result1);
    
   
    if($num>0){
        $un_message= 'Email already Taken';
    }

    else{

$sql="INSERT INTO student(name,email,password)VALUES('$name','$email','$password1')";
$result=mysqli_query($conn,$sql);
if(!$result){
    echo 'Something went wrong';
}
else{
    $su_message= 'Signup successful.You can login.';
}
}
}
}
?>