<?php 
include('inc/myconnect.php');
include('inc/function.php');
if(isset($_GET['MaPhieuCT']) && filter_var($_GET['MaPhieuCT'],FILTER_VALIDATE_INT,array('min_range'=>1)))
{
	$MTG=$_GET['MaPhieuCT'];
	$query="DELETE FROM chitiet WHERE MaPhieuCT={$MTG}";
	$result=mysqli_query($dbc,$query);
	kt_query($result,$query);
	header('Location: listChiTiet.php');
}
else
{
	header('Location: listChiTiet.php');	
}
?>