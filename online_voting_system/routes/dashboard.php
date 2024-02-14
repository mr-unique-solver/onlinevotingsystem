
<?php
session_start();
if(!isset($_SESSION['userdata']))
{
header("location: ./index.html");
}
$userdata=$_SESSION['userdata'];
$groupsdata=$_SESSION['groupdata'];
if($_SESSION['userdata']['status']==0)
{
    $status='<b style="color:red">Not Voted</b>';
}
else
{
    $status='<b style="color:green">Voted</b>';
}
?>
<html>
    <head>
        <title>Online Voting System-Dashboard</title>
        <link rel="stylesheet" href="../css/stylesheet.css">
    </head>
    <body>
        <style>
#backbtn
{
    padding:5px;
    font-size:15px;
    border-radius: 5px;
    background-color: blueviolet;
    color:white;
    float:left;
    margin:10px;

}
#logoutbtn
{
    padding:5px;
    font-size:15px;
    border-radius: 5px;
    background-color: blueviolet;
    color:white;
    float:right;
    margin:10px;

}
#Profile
{
    background-color: white;
    width:30%;
    padding:20px;
    float:left;
}
#Group
{
    background-color: white;
    width:60%;
    padding:20px;
    float:right;
}
#votebtn
{
    padding:5px;
    font-size:15px;
    border-radius: 5px;
    background-color: blueviolet;
    color:white;
}
#mainsection
{
    padding: 10px;
}
#votedbtn
{
    padding:5px;
    font-size:15px;
    border-radius: 5px;
    background-color: green;
    color:white;
}
            </style>
        <div id="mainsection">
            <center>
        <div id="headersection">
        <a href="./index.html"><button id="backbtn">Back</button></a>
        <a href="./logout.php"><button id="logoutbtn">Logout</button></a> 
        <h1>Online Voting System</h1>
        </div>
</center>
        <hr>
        <div id="mainpanel">
        <div id="Profile">
<center><img src="../uploads/<?php echo $userdata['photo'] ?>" height="100" width="100"></center><br><br>
<b>Name:<?php echo $userdata['name']?><b><br><br>
<b>Mobile:<?php echo $userdata['mobile']?><b><br><br>
<b>Address:<?php echo $userdata['address']?><b><br><br>
<b>Status:<?php echo $status?><b><br><br>
        </div>
        <div id="Group">
            <?php
            if($_SESSION['groupdata'])
            {
              for($i=0;$i<count($groupsdata);$i++)
              {
                ?>
                <div>
                    <img style="float:right" src="../uploads/<?php echo $groupsdata[$i]['photo'] ?>" height="100" width="300">
                    <b>Group Name:</b><?php echo $groupsdata[$i]['name'] ?><br><br>
                    <b>Votes:</b><?php echo $groupsdata[$i]['votes'] ?><br><br>
                    <form action="../api/vote.php" method="POST">
                        <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes'] ?>">
                        <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id'] ?>">
                        <?php
                        if($_SESSION['userdata']['status']==0)
                        {
                            ?>
                            <input type="submit" name="votebtn" value="vote" id="votebtn">
                            <?php
                        }
                        else
                        {
                            ?>
                            <button disabled type="button" name="votebtn" value="vote" id="votedbtn">voted</button>
                                <?php
                        }
                        ?>
                        
                    </form>
                </div>
                <hr>
                <?php
              }
            }
            else{

            }
            ?>
        </div>
        </div>
        </div>
    </body>
</html>