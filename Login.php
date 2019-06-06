<?php
require ("ConnectionToDatabase.php");
$user_name=$_POST["user_name"]; //under square bracket "user_name" is key name which is defined in android coding
$user_pass=$_POST["password"];
$mysql_qry="SELECT * From userdata where Username like '$user_name' and Password like '$user_pass'";//mysql query is executed
$result=mysqli_query($conn,$mysql_qry);
if($is_query_run=$result)
{
    echo "Login Success";
}
else
{
    echo "error: " . $mysql_qry . "<br>" . $is_query_run->error;
}
?>