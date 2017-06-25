<html>
<head>
<title>Shop</title>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
</head>
    <body>  

<?php   
include('style.css');
  ?>
    <div class="table-scrol">  
    <div class="table-responsive mainbara">

        <center> <table class="table" border="1px" style="table-layout: fixed">  
        <thead>  
  
        <tr>  
			<th width="50"><div align="center"><font color=#AAAAAA>No.</div></font></th> 
            <th width="200"><div align="center"><font color=#AAAAAA>Color</div></font></th>  
            <th width="200"><div align="center"><font color=#AAAAAA>Alcohol</div></font></th> 
            <th width="200"><div align="center"><font color=#AAAAAA>Price</div></font></th>
            <th width="10"><div align="center"><font color=#AAAAAA>Status</div></font></th>    
        </tr>  
        </thead>  
  <?php  
        include("database/db.php");  
        $view_users_query="select * from shop ORDER by number DESC";//select query for viewing users.  
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
            <td width="200"><div align="center"><?php echo "<font color=000000>".number_format($price)." Bath</font>";  ?></div></td>
         <?php   if($status==1){  ?>  
            <td width="10"><div align="center"><b><font color=red>Not</font></b></div></td>
        <?php    }else if($status==2){   ?>  
            <td width="10"><div align="center"><b><font color=blue>Making</font></b></div></td>
       <?php    }else{   ?>  
            <td width="10"><div align="center"><b><font color=green>Finish</font></b></div></td>
       <?php     }  ?> 

        </tr>  	
     <?php     }  ?>
           </table> </center> 
    </div>
</div>
    </body>
 </html>
<?php
	mysqli_close($db);
?>