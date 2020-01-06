<?php 
include('inc/myconnect.php');
include('inc/function.php');
if(isset($_GET['MaDG']) && filter_var($_GET['MaDG'],FILTER_VALIDATE_INT,array('min_range'=>1)))
{
	$MTG=$_GET['MaDG'];
	$query="DELETE FROM thedocgia WHERE MaDG={$MTG}";
	$result=mysqli_query($dbc,$query);
	kt_query($result,$query);
	header('Location: listDocGia.php');
}
else
{
	header('Location: listDocGia.php');	
}
?>