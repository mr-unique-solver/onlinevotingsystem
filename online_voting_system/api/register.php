<?php
include("./connect.php");
$name=$_POST['name'];
$mobile=$_POST['mobile'];
$pass=$_POST['password'];
$cpass=$_POST['cpassword'];
$address=$_POST['address'];
$image=$_FILES['photo']['name'];
$tmp_name=$_FILES['photo']['tmp_name'];
$role=$_POST['role'];

if($pass==$cpass)
{
 move_uploaded_file($tmp_name,"../uploads/$image");
 $insert=mysqli_query($connect,"insert into user(name,mobile,address,password,photo,role,status,votes) values('$name','$mobile','$address','$pass','$image','$role',0,0)");
 if($insert)
 {
    echo '
    <script>
alert("registration successfull");
window.location="../routes/index.html";
    </script>
    ';
 }
 else
 {
    echo'
<script>
alert("some error occurred");
window.location="../routes/register.html";
</script>
    ';
 }
}
else
{
   echo'
<script>
alert("password and confirm password does not match");
window.location="../routes/register.html";
</script>
   ';
}
?>