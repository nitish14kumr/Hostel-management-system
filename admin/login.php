<?php
session_start();
//connectivity
include('config.php');
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$user = $_POST['admname'];
	$pass = $_POST['admpass'];
	$q = "select * from admin where auser='$user' && apass='$pass'";
	var_dump($q);
	$data = mysql_query($q);
	var_dump($data);
	$res=mysql_fetch_array($data);
	var_dump($res['auser']);
	var_dump($res['apass']);
	if($res['auser']==$user && $res['apass']==$pass)
	{
		$_SESSION['admin']=$res['auser'];
		header('location:backend.php');
	}
	else
	{
		echo "<script>alert('Wrong Login Details, Try Again!');location.href='index.php'</script>";
	}
}
?>