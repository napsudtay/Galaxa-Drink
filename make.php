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
include('style.css');
include('database/db.php');

if(@$_GET['number']){
$number=@$_GET['number'];
}else{
$number=-1;
}

if(@$_GET['make']){
        $view_query="update shop set status=2 where number=$number";  
        $run=mysqli_query($db,$view_query); 
        if (!$run) {
            printf("Error: %s\n", mysqli_error($db));
        }
}
else if(@$_GET['finish']){
        $view_query="update shop set status=0 where number=$number";  
        $run=mysqli_query($db,$view_query); 
        if (!$run) {
            printf("Error: %s\n", mysqli_error($db));
        }
}
        $view_query="select min(number),color,alcohol from shop where status=1 or status=2";  
        $run=mysqli_query($db,$view_query); 
        if (!$run) {
            printf("Error: %s\n", mysqli_error($db));
        }
        	while($row=mysqli_fetch_array($run)){
        		$number=$row[0];
        		$color=$row[1];
        		$alcohol=$row[2];
        	}

	echo"<div class='background_wall_css'>";
		echo"<div class='list_menu_css'>";
		echo"<center>";
			echo"<table border=\"1px\" style=\"table-layout: fixed\" class='headmenu'>";
				echo"<tr>";
					echo"<th colspan='3'>";
					 	echo"Color";
					echo"</th>";
					echo"<th class='headmenu'>";
					echo"Order List";
				echo"</tr>";
				echo"<tr>";
					echo"<td colspan='3'>";
					echo"<center>";
									echo "<a class='blue_button_css' id='blue_button'>";
									echo "<div class='color_$color button' id='color'>";
									echo "</div>";				
									echo"</a>";
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
					echo"<center>";
									echo "<a class='blue_button_css' id='blue_button'>";
									echo "<div class='color_$color button' id='color'><br><font color=#FFFFFF size=18>$alcohol</font>";
									echo "</div>";				
									echo"</a>";
					echo"</center>";								
								echo "</td>";
							echo"</tr>";														
						echo"</table>";
					echo"</center>";
					echo"</td>";
				echo"</tr>";
				echo"<tr>";
					echo"<td width='50'>";
		
					echo"<font color=#000><center>No.$number</center></font>";
					echo"</td>";
					echo"<td colspan=2 width='50'>";
						if($number!=-1){
							echo "<center><a class='made_a' id='made_button' href='make.php?number=$number&make=y'>";
							}else{
					 		echo "<center><a class='made_a' id='made_button'>";
					 	}
							echo "<div class='made button' id='made'>Made";
							echo "</div>";				
							echo"</a></center>";
					echo"</td>";
				echo"</tr>";
				echo"<tr>";
					echo"<td width='50'>";
					 		echo "<center><a class='refresh_a' id='refresh_button' href='index.php?menu=2'>";
					 		echo "<div class='refresh button button_h' id='refresh'>Oder";
							echo "</div>";
							echo "<div class='refresh button button_h' id='refresh'>Refresh";
							echo "</div>";

							echo"</a></center>";
					echo"</td>";
					echo"<td colspan=2 width='50'>";
							if($number!=''){
					 		echo "<center><a class='made_a' id='made_button' href='index.php?menu=2&number=$number&finish=y'>";
					 		}else{
					 		echo "<center><a class='made_a' id='made_button'>";
					 		}
							echo "<div class='made button' id='made'>Finish";
							echo "</div>";				
							echo"</a></center>";
					echo"</td>";
				echo"</tr>";				
			echo"</table>";
			echo"</center>";

		echo"</div>";
	echo"</div>";
	echo"</div>";
?>