<!DOCTYPE html>
<html>
<head>
	<title>Result Page</title>

<style>
	#searchfield
	{
		width: 500px;
		height: 35px;
		border-radius: 5px;
		background-color: white;
		border: 1px solid green;
	}
	#gobtn
	{
		width: 100px;
		height: 38px;
		font-size: 18px;
		border-radius: 5px;
		background-color: white;
		border: 1px solid green;
	}
	#gobtn:hover
	{
		color: white;
		background-color: green;
	}
	a
	{
		color: #0000cc;
		text-decoration :none;
	}
	
</style>

</head>
<body>

<form action="" method="GET">
<table border="0" width="100%" bgcolor="f2f2f2">
	<tr>
		<td width="10%">
			<a href = "index.php"><img src="vividlogoresult.png" width="100%"></a>
		</td>
		
		<td>
			<input type="text" name="search" id="searchfield">
			<input type="submit" name="searchbtn" value="Go!" id="gobtn">
		</td>
	</tr>
</table>

<table border="0" style="margin-left: 190px;">
	<tr> 

<?php
include("connection.php");

if(isset($_GET['searchbtn']))
{
	$search = $_GET['search'];
	
	
	
	if($search=="")
	{
		echo "<b>Please write something in the Search Box :)</b>";
		exit();
	}
	$query = "select * from add_website where website_keywords like '%$search%' limit 0,4";
	$data = mysqli_query($conn,$query);
	
	if(mysqli_num_rows($data)<1)
	{
		echo "<center><font size='4'><b> SORRY, No Results Were found Related To Your Search :(</b></font></center>";
		exit();
	}
echo "<a href='#' style='margin-left:190px;'><font size='5'> More Images for $search</a>";
	
while($row = mysqli_fetch_array($data))
{
	echo "
			<td>
			<img src='$row[4]' width='250px;'>
			</td>
	";
}
}
?>
</tr>

</form>

<?php include("finalsearch.php") ;?>

</body>
</html>