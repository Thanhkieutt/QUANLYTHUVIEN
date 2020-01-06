<?php 
include('inc/myconnect.php');
include('inc/function.php');
if(isset($_GET['MaNXB']) && filter_var($_GET['MaNXB'],FILTER_VALIDATE_INT,array('min_range'=>1)))
{
	$MTG=$_GET['MaNXB'];
	$query="DELETE FROM nhaxb WHERE MaNXB={$MTG}";
	$result=mysqli_query($dbc,$query);
	kt_query($result,$query);
	header('Location: listNXB.php');
}
else
{
	header('Location: listNXB.php');	
}
?>