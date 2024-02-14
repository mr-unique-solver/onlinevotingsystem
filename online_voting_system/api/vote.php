<?php
session_start();
include("./connect.php");
//previous votes
$votes=$_POST['gvotes'];
$total_votes=$votes+1;
$gid=$_POST['gid'];
$uid=$_SESSION['userdata']['id'];
$update_votes=mysqli_query($connect,"update user set votes='$total_votes' where id='$gid' ");
$update_user_status=mysqli_query($connect,"update user set status=1 where id='$uid' ");
if($update_votes and $update_user_status)
{
    $groups=mysqli_query($connect,"select * from user where role=2");
    $groupsdata=mysqli_fetch_all($groups,MYSQLI_ASSOC);
    $_SESSION['userdata']['status']=1;
    $_SESSION['groupdata']=$groupsdata;
    echo '
    <script>
alert("voting successfull");
window.location="../routes/dashboard.php";
    </script>
    ';
}
else
{
    echo '
    <script>
alert("some error occured");
window.location="../routes/dashboard.php";
    </script>
    ';
}
