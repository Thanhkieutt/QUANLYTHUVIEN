<?php 
include('inc/myconnect.php');
include('inc/function.php');
if(isset($_GET['MaNV']) && filter_var($_GET['MaNV'],FILTER_VALIDATE_INT,array('min_range'=>1)))
{
	$MTG=$_GET['MaNV'];
	$query="DELETE FROM nhanvien WHERE MaNV={$MTG}";
	$result=mysqli_query($dbc,$query);
	kt_query($result,$query);
	header('Location: listNhanVien.php');
}
else
{
	header('Location: listNhanVien.php');	
}
?>