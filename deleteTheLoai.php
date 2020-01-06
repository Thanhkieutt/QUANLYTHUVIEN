<?php 
include('inc/myconnect.php');
include('inc/function.php');
if(isset($_GET['MaTheLoai']) && filter_var($_GET['MaTheLoai'],FILTER_VALIDATE_INT,array('min_range'=>1)))
{
	$MTG=$_GET['MaTheLoai'];
	$query="DELETE FROM theloai WHERE MaTheLoai={$MTG}";
	$result=mysqli_query($dbc,$query);
	kt_query($result,$query);
	header('Location: listTheLoai.php');
}
else
{
	header('Location: listTheLoai.php');	
}
?>