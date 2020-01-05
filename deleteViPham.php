<?php 
include('inc/myconnect.php');
include('inc/function.php');
if(isset($_GET['MaVP']) && filter_var($_GET['MaVP'],FILTER_VALIDATE_INT,array('min_range'=>1)))
{
	$MTG=$_GET['MaVP'];
	$query="DELETE FROM xulivipham WHERE MaVP={$MTG}";
	$result=mysqli_query($dbc,$query);
	kt_query($result,$query);
	header('Location: listViPham.php');
}
else
{
	header('Location: listViPham.php');	
}
?>