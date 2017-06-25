<script src="jquery-lastest.js"></script>
<script>
$(document).ready(function () {
    setInterval(function() {
        $.get("viewlist.php", function (result) {
            $('#list_orderid').html(result);
        });
    },500);
});
</script>
<?php
include('database/db.php');

if(@$_GET['color']){$color=@$_GET['color'];}
else{$color=-1;}

if(@$_GET['alcohol']){$alcohol=@$_GET['alcohol'];}
else{$alcohol=-1;}

if(@$_GET['price']){$price=@$_GET['price'];}
else{$price=0;}


if(@$_GET['order']){
        $insertquery= "INSERT INTO `shop` (`color`, `alcohol`, `price`,`status`) VALUES 
        ('$color', '$alcohol', '$price','1')";
$run=mysqli_query($db,$insertquery); 
        if (!$run) {
            printf("Error: %s\n", mysqli_error($db));
        }
}
$price=0;
	echo"<div class='background_wall_css'>";
		echo"<div class='list_menu_css'>";
		echo"<center>";
			echo"<table border=\"1px\" style=\"table-layout: fixed\">";
				echo"<tr>";
					echo"<th colspan='3' class='headmenu'>";
					 	echo"Menu";
					echo"</th>";
					echo"<th class='headmenu'>";
					echo"Order List";
				echo"</tr>";
				echo"<tr>";
					echo"<td colspan='3' class='headmenu'>";
					echo"<center>";
						echo"<table name='color'>";	
							echo"<tr>";
								echo "<td>";
									echo "<a class='blue_button_css' id='blue_button' href='index.php?color=Blue&alcohol=$alcohol'>";
									echo "<div class='color_blue button button_h' id='color'><center>Blue</center>";
									echo "</div>";				
									echo"</a>";
								echo "</td>";
								echo "<td>";
									echo "<a class='red_button_css' id='blue_button' href='index.php?color=Red&alcohol=$alcohol'>";
									echo "<div class='color_red button button_h' id='color'><center>Red</center>";
									echo "</div>";				
									echo"</a>";
								echo "</td>";
								echo "<td>";
									echo "<a class='green_button_css' id='green_button' href='index.php?color=Green&alcohol=$alcohol'>";
									echo "<div class='color_green button button_h' id='color'><center>Green</center>";
									echo "</div>";				
									echo"</a>";
								echo "</td>";
							echo"</tr>";							
						echo"</table>";
					echo"</center>";
					echo"</td>";
					echo"<td rowspan=5>";
							echo"<div class='list_order_css' name='list_order_name' id='list_orderid'>";
							echo"</div>";
					echo"</td>";
				echo"</tr>";
				echo"<tr>";
					echo"<th colspan='3' class='headmenu'>";
					echo"Alcohol";
					echo"</th>";
				echo"</tr>";
				echo"<tr>";
					echo"<td colspan='3'>";
					echo"<center>";
						echo"<table name='alcohol'>";	
							echo"<tr>";
								echo "<td>";
									echo "<a class='alcohol_a' id='alcohol_button' href='index.php?color=$color&alcohol=6'>";
									echo "<div class='alcohol button button_h' id='alcohol'><center>X</center>";
									echo "</div>";				
									echo"</a>";
								echo "</td>";
								echo "<td>";
									echo "<a class='alcohol_a' id='alcohol_button' href='index.php?color=$color&alcohol=1'>";
									echo "<div class='alcohol button button_h' id='alcohol'><center>1</center>";
									echo "</div>";				
									echo"</a>";
								echo "</td>";
								echo "<td>";
									echo "<a class='alcohol_a' id='alcohol_button' href='index.php?color=$color&alcohol=2'>";
									echo "<div class='alcohol button button_h' id='alcohol'><center>2</center>";
									echo "</div>";				
									echo"</a>";
								echo "</td>";
							echo"</tr>";
							echo"<tr>";
								echo "<td>";
									echo "<a class='alcohol_a' id='alcohol_button' href='index.php?color=$color&alcohol=3'>";
									echo "<div class='alcohol button button_h' id='alcohol'><center>3</center>";
									echo "</div>";				
									echo"</a>";
								echo "</td>";
								echo "<td>";
									echo "<a class='alcohol_a' id='alcohol_button' href='index.php?color=$color&alcohol=4'>";
									echo "<div class='alcohol button button_h' id='alcohol'><center>4</center>";
									echo "</div>";				
									echo"</a>";
								echo "</td>";
								echo "<td>";
									echo "<a class='alcohol_a' id='alcohol_button' href='index.php?color=$color&alcohol=5'>";
									echo "<div class='alcohol button button_h' id='alcohol'><center>5</center>";
									echo "</div>";				
									echo"</a>";
								echo "</td>";
							echo"</tr>";														
						echo"</table>";
					echo"</center>";
					echo"</td>";
				echo"</tr>";
				echo"<tr>";
					echo"<td width='50'>";

        $view_query="select max(number) from shop";  
        $run=mysqli_query($db,$view_query); 
        if (!$run) {
            printf("Error: %s\n", mysqli_error($db));
        }
        	while($row=mysqli_fetch_array($run)){
        		$number=$row[0];
        	}		
        			$numbers=$number;
        			$number=$number+1;
					echo"<center>No.$number</center>";
					echo"</td>";
					echo"<td>";
					if($color!=-1){
						$b=$alcohol;
					}else{$b=0;
						$color="";
					}
					if($alcohol>=1){
							if($alcohol==6)$alcohol=0;
							$price=89+$alcohol*30;
						}
					 	echo"Color: <b><font color=$color>$color</font></b> ,Price = ".number_format($price)." Bath";
					echo"</td>";
					echo"<td width='50'>";
					$alcohol=$b;
						if($color!="" and $alcohol!=-1){
							if($alcohol==6){
							$alcohol=0;
							}
					 		echo "<center><a class='order_a' id='order_button' href='index.php?color=$color&alcohol=$alcohol&price=$price&order=y#popup1'>";
					 			echo "<div class='order button button_h' id='order'>order";
					 		}else{
						 	echo "<center><a class='order_a' id='order_button'>";
						 		echo "<div class='order button' id='order'>order"; 			
					 		}
							echo "</div>";				
							echo"</a></center>";
					echo"</td>";
				echo"</tr>";
				echo"<tr>";
					echo"<td width='50' colspan='3'>";
					 		echo "<center><a class='refresh_a' id='refresh_button' href='index.php'>";
							echo "<div class='refresh button button_h' id='refresh'>Clear";
							echo "</div>";				
							echo"</a></center>";
					echo"</td>";
				echo"</tr>";				
			echo"</table>";
			echo"</center>";

		echo"</div>";
	echo"</div>";

	echo"<div id='popup1' class='overlay'>";
		echo"<div class='popup'>";
		echo"<a class='close' href='index.php'>&times;</a>";
		echo"<div class='content contt' name='display'>";
		echo"<center>";
			echo"No.$numbers Color : <font color=$color>$color</font> Alcohol: $alcohol Price = $price Bath. ";
		echo"</center>";
		echo"</div>";
		echo"</div>";
	echo"</div>";
?>