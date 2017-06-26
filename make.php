<script src="jquery-lastest.js"></script>
<script>
$(document).ready(function () {
    setInterval(function() {
        $.get("viewlist_m.php", function (result) {
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
$number='';
}


if(@$_GET['sle']){
	$sle=@$_GET['sle'];
}else{
$sle='';
}
if(@$_GET['XY']){
        $view_query="update shop set status=3 where number=".@$_GET['X'];  
        $run=mysqli_query($db,$view_query); 
        if (!$run) {
            printf("Error: %s\n", mysqli_error($db));
        }
}
else if(@$_GET['make'] and @$_GET['status']==4){
        $view_query="update shop set status=5 where number=$number";  
        $run=mysqli_query($db,$view_query); 
        if (!$run) {
            printf("Error: %s\n", mysqli_error($db));
        }
}
else if(@$_GET['make'] and @$_GET['status']==1){
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

		$view_users_query="SELECT COUNT(number) from shop WHERE status = 4 or status = 5";//select query for viewing users.  
		$run=mysqli_query($db,$view_users_query);//here run the sql query.  
		while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.  
		        {
		        	$ex=$row[0];
		        }

if(@$_GET['sle']){
        $view_query="select min(number),color,alcohol,status  from shop where number=$sle";  
        $run=mysqli_query($db,$view_query); 
        if (!$run) {
            printf("Error: %s\n", mysqli_error($db));
        }
        	while($row=mysqli_fetch_array($run)){
        		$number=$row[0];
        		$color=$row[1];
        		$alcohol=$row[2];
        		$status=$row[3];
}
}
else if($ex or @$_GET['satatus']==5){
        $view_query="select min(number),color,alcohol,status  from shop where status=4 or status=5";  
        $run=mysqli_query($db,$view_query); 
        if (!$run) {
            printf("Error: %s\n", mysqli_error($db));
        }
        	while($row=mysqli_fetch_array($run)){
        		$number=$row[0];
        		$color=$row[1];
        		$alcohol=$row[2];
        		$status=$row[3];
        	}
}else{
        $view_query="select min(number),color,alcohol,status from shop where status=1 or status=2 ";  
        $run=mysqli_query($db,$view_query); 
        if (!$run) {
            printf("Error: %s\n", mysqli_error($db));
        }
        	while($row=mysqli_fetch_array($run)){
        		$number=$row[0];
        		$color=$row[1];
        		$alcohol=$row[2];
        		$status=$row[3];
        	}
}

 if(@$_GET['XY']){

        $view_query="update shop set status=3 where number=".@$_GET['X'];  
        $run=mysqli_query($db,$view_query); 
        if (!$run) {
            printf("Error: %s\n", mysqli_error($db));
        }

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
						if($number!=""){
							echo "<center><a class='made_a' id='made_button' href='make.php?number=$number&make=y&status=$status&sle=$sle'>";
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

	echo"<div id='popup2' class='overlay'>";
		echo"<div class='popup'>";
		echo"<a class='close' href='index.php?menu=2'>&times;</a>";
		echo"<div class='content contt' name='display'>";
		echo"<center>";
			echo"Do you really want to cancel it?<br><br>";
					echo "<center><a class='refresh_a' id='refresh_button' href='index.php?menu=2&XY=1&X=".@$_GET['X']."'>";
					echo "<div class='notcancle button button_h' id='refresh'>Yes";
					echo "</div>";				
					echo "</a>";
					echo "<a class='refresh_a' id='refresh_button' href='index.php?menu=2'>";
					echo "<div class='cancle button button_h' id='refresh'>No";
					echo "</div>";				
					echo"</a></center>";					
		echo"</center>";
		echo"</div>";
		echo"</div>";
	echo"</div>";

?>