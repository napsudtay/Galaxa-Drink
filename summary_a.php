<?php
include('style.css');
include('database/db.php');
$color = array("Red","Green","Blue");
$word = array("No alcohol","X1","X2","X3","X4","X5");
$summoney=0;
$sumalcohol=0;
$sum=0;
$sumall=0;

for($j=0;$j<=2;$j++){
$view_users_query="SELECT COUNT(number) from shop WHERE status = 0 and color = \"".$color[$j]."\"";//select query for viewing users.  
$run=mysqli_query($db,$view_users_query);//here run the sql query.  
while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.  
        {
        	$value=$row[0];
        }
        $sumall=$sumall+$value;

for($i=0;$i<=5;$i++){
		$view_users_query="SELECT COUNT(number) from shop WHERE status = 0 and color = \"".$color[$j]."\" and alcohol = ".$i;//select query for viewing users.  
		$run=mysqli_query($db,$view_users_query);//here run the sql query.  
		while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.  
		        {
		        	$x[$i]=$row[0];
		        }
}

$view_users_query="SELECT SUM(price) from shop WHERE status = 0 and color = \"".$color[$j]."\"";//select query for viewing users.  
$run=mysqli_query($db,$view_users_query);//here run the sql query.  
while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.  
        {
        	$sum=$row[0];
        }        

	echo"<div class='background_wall_css'>";
		echo"<div class='list_menu_css'>";
		echo"<center>";
			echo"<h2>".$color[$j]." water list</h2><table border='1'>";
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
					$summoney=$summoney+$sum;
					$sum=number_format($sum);
						echo $sum." Bath";
					echo"</th></center>";					
				echo"</tr>";
			echo"</table>";
			echo"</center>";
		echo"</div>";
	echo"</div>";
	echo"</div>";
}
?>
<?php
$view_users_query="SELECT COUNT(number) from shop WHERE status = 3";//select query for viewing users.  
$run=mysqli_query($db,$view_users_query);//here run the sql query.  
while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.  
        {
        	$cancle=$row[0];
        } 

  if($cancle){
        ?>

<div id="ummarycid" class="canclelist">

   <div class="table-scrol">  
    <div class="table-responsive mainbara">

        <center> <h2>Cancle list</h2>
        <table class="table" border="1px" style="table-layout: fixed">  
        <thead>  
  
        <tr>  
			<th width="50"><div align="center"><font color=#AAAAAA>No.</div></font></th> 
            <th width="200"><div align="center"><font color=#AAAAAA>Color</div></font></th>  
            <th width="200"><div align="center"><font color=#AAAAAA>Alcohol</div></font></th> 
            <th width="200"><div align="center"><font color=#AAAAAA>Price</div></font></th>   
        </tr>  
        </thead>  

  		<?php  
        $view_users_query="select * from shop WHERE status = 3 ORDER by number DESC ";//select query for viewing users.  
        $run=mysqli_query($db,$view_users_query);//here run the sql query.  
        while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.  
        {  
            $number=$row[0];
            $color=$row[1];  
            $alcohol=$row[2];  
            $price=$row[3];
            $status=$row[4];   
        ?>  
        <tr>  
			<td width="50"><div align="center"><?php echo "<font color=000000>$number</font>";  ?></div></td>
            <td width="200"><div align="center"><?php echo "<b><font color=$color>$color</font></b>";  ?></div></td>  
            <td width="200"><div align="center"><?php echo "<font color=000000>$alcohol</font>";  ?></div></td>
            <td width="200"><div align="center"><?php echo "<font color=000000>".number_format($price)." Bath</font>"; ?>
            </div>
            </td>
 		</tr>
 		<?php } ?>
           </table> </center> 
    </div>
</div>
</div>


<?php
}
	echo"<div class='background_wall_css'>";
		echo"<div class='list_menu_css'>";
		echo"<center>";
			echo"<h2>Summary list</h2><table border='1'>";
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
						echo "Cancle";
					echo"</td>";
					echo"<td><center>";

						echo $cancle;
					echo"</th></center>";					
				echo"</tr>";

				echo"<tr>";
					echo"<td>";
						echo "Sum all";
					echo"</td>";
					echo"<td><center>";

						echo $sumall;
					echo"</th></center>";					
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