<?php 
include('inc/myconnect.php');
include('inc/function.php');
if(isset($_GET['MaTG']) && filter_var($_GET['MaTG'],FILTER_VALIDATE_INT,array('min_range'=>1)))
{
	$MTG=$_GET['MaTG'];
	$query="DELETE FROM tacgia WHERE MaTG={$MTG}";
	$result=mysqli_query($dbc,$query);
	kt_query($result,$query);
	header('Location: listTacGia.php');
}
else
{
	header('Location: listTacGia.php');	
}
?>