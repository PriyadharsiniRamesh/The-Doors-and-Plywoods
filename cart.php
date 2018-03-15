<?php
if(isset($_POST['qty']))
{
	extract($_POST);
	setcookie($name,"$price,$qty",time()+3600*24*60*60);
	header("Location:cart.php");
}
if(sizeof($_COOKIE) == 0)
	echo "Cart is empty...";
else
{
	$total = 0;
	echo "<table border='1'>";
	echo "<tr><th>Product name<th>Price<th>Quantity<th>Amount</tr>";
	foreach($_COOKIE as $title=>$details)
	{
		$details = explode(',',$details);
		if($title!="PHPSESSID")
		{
			echo "<tr>";
			echo "<th>" . $title;
			echo "<td>" . $details[0];
			echo "<td>" . $details[1];
			echo "<td>" . $details[0] * $details[1];
			echo "</tr>";
			$total += $details[0] * $details[1];
		}
	}
	echo "</table>";
	echo "<br><h3>The grand total is " . $total;
	
}
?>