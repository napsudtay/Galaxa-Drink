<?php
include('style.css');
include('database/db.php');

$color = array("Red","Green","Blue");
$word = array("No alcohol","X1","X2","X3","X4","X5");
$summoney=0;
$sumalcohol=0;
$sum=0;

for($j=0;$j<=2;$j++){
$view_users_query="SELECT COUNT(number) from shop WHERE color = \"".$color[$j]."\"";//select query for viewing users.  
$run=mysqli_query($db,$view_users_query);//here run the sql query.  
while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.  
        {
        	$value=$row[0];
        }

for($i=0;$i<=5;$i++){
		$view_users_query="SELECT COUNT(number) from shop WHERE color = \"".$color[$j]."\" and alcohol = ".$i;//select query for viewing users.  
		$run=mysqli_query($db,$view_users_query);//here run the sql query.  
		while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.  
		        {
		        	$x[$i]=$row[0];
		        }
}

$view_users_query="SELECT SUM(price) from shop WHERE color = \"".$color[$j]."\"";//select query for viewing users.  
$run=mysqli_query($db,$view_users_query);//here run the sql query.  
while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.  
        {
        	$sum=$row[0];
        }        

	echo"<div class='background_wall_css'>";
		echo"<div class='list_menu_css'>";
		echo"<center>";
			echo"<table border='1'>";
				echo"<tr>";
					echo"<th width='200' class='headmenu'>";
						echo"Topic";
					echo"</th>";
					echo"<th width='200' class='headmenu'>";
						echo"Value";
					echo"</th>";					
				echo"</tr>";

				echo"<tr>";
					echo"<td>";
						echo "<font color=".$color[$j].">".$color[$j]." water</font>";
					echo"</td>";
					echo"<td><center>";

						echo $value;
					echo"</th></center>";					
				echo"</tr>";

for($i=0;$i<=5;$i++){
				echo"<tr>";
					echo"<td>";
						echo"<dd>".$word[$i];
					echo"</td>";
					echo"<td><center>";
						echo $x[$i];
						$sumalcohol=$sumalcohol+$x[$i]*$i;
					echo"</th></center>";					
				echo"</tr>";
}

				echo"<tr>";
					echo"<td>";
						echo"Money";
					echo"</td>";
					echo"<td><center>";
					$sum=number_format($sum);
						echo $sum." Bath";
						$summoney=$summoney+$sum;
					echo"</th></center>";					
				echo"</tr>";
			echo"</table>";
			echo"</center>";
		echo"</div>";
	echo"</div>";
	echo"</div>";
}
	echo"<div class='background_wall_css'>";
		echo"<div class='list_menu_css'>";
		echo"<center>";
			echo"<table border='1'>";
				echo"<tr>";
					echo"<th width='200' class='headmenu'>";
						echo"Topic";
					echo"</th>";
					echo"<th width='200' class='headmenu'>";
						echo"Value";
					echo"</th>";					
				echo"</tr>";

				echo"<tr>";
					echo"<td>";
						echo "Sum Alcohol";
					echo"</td>";
					echo"<td><center>";

						echo $sumalcohol;
					echo"</th></center>";					
				echo"</tr>";

				echo"<tr>";
					echo"<td>";
						echo"Sum money";
					echo"</td>";
					echo"<td><center>";
					$summoney=number_format($summoney);
						echo $summoney." Bath";
					echo"</th></center>";					
				echo"</tr>";
			echo"</table>";
			echo"</center>";
		echo"</div>";
	echo"</div>";
	echo"</div>";


?>