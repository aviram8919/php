<?php
require ("ConnectionToDatabase.php");
$user_name=$_POST["user_name"]; //under square bracket "user_name" is key name which is defined in android coding
$user_pass=$_POST["password"];
//to prevent mysql injection
$user_name=stripcslashes($user_name);
$user_pass=stripcslashes($user_pass);

$user_name=mysqli_real_escape_string($conn,$user_name);
$user_pass=mysqli_real_escape_string($conn,$user_pass);

//query
$mysql_qry="SELECT * From userdata where Username='$user_name' and Password='$user_pass'";//mysql query is executed
$result=mysqli_query($conn,$mysql_qry);
if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
$row=mysqli_fetch_array($result,2);
if($row['Username']==$user_name && $row['Password']==$user_pass)
{
    echo "Login Success";
}
else
{
    echo "error: " . $mysql_qry . "<br>" . $row->error. "br" .$mysql_qry->error;
}
?>