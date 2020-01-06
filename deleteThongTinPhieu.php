<?php 
include('inc/myconnect.php');
include('inc/function.php');
if(isset($_GET['MaPhieu']) && filter_var($_GET['MaPhieu'],FILTER_VALIDATE_INT,array('min_range'=>1)))
{
	$MTG=$_GET['MaPhieu'];
	$query="DELETE FROM phieumuontra WHERE MaPhieu={$MTG}";
	$result=mysqli_query($dbc,$query);
	kt_query($result,$query);
	header('Location: listThongTinPhieu.php');
}
else
{
	header('Location: listThongTinPhieu.php');	
}
?>