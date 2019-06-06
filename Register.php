<?php 
require ("ConnectionToDatabase.php");//require method is used to connect with another php file
$mobile_no_or_email=$_POST["mobile_no_or_email"];
$username=$_POST["username"];
$userpassword=$_POST["password"];
//to prevent mysql injection
$mobile_no_or_email=stripcslashes($username);
$username=stripcslashes($username);
$userpassword=stripcslashes($userpassword);

$mobile_no_or_email=mysqli_real_escape_string($conn,$mobile_no_or_email);
$username=mysqli_real_escape_string($conn,$username);
$userpassword=mysqli_real_escape_string($conn,$userpassword);

//query
$mysql_qry="INSERT INTO userdata (MobileOREmail,Username,Password) values('$mobile_no_or_email','$username','$userpassword')";//Mysql Query is executed

if($conn->query($mysql_qry) === True)
{
    echo "insert success";
}
else
{
    echo "error: " . $mysql_qry . "<br>" . $conn->error; //gives what error is in your code
}
$conn->close();
?>