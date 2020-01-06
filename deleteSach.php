<?php 
include('inc/myconnect.php');
include('inc/function.php');
if(isset($_GET['MaSach']) && filter_var($_GET['MaSach'],FILTER_VALIDATE_INT,array('min_range'=>1)))
{
	$MTG=$_GET['MaSach'];
	$query="DELETE FROM sach WHERE MaSach={$MTG}";
	$result=mysqli_query($dbc,$query);
	kt_query($result,$query);
	header('Location: listSach.php');
}
else
{
	header('Location: listSach.php');	
}
?>