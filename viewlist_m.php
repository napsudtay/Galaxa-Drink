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
            <th width="10"><div align="center"><font color=#AAAAAA>Cancle</div></font></th>    
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
            <td width="50"><div align="center">

    <?php 
           if($number!=@$_GET['sle'] and $status !=0 and $status!= 3){ 
               echo "<center><a class='refresh_a' id='cancle_button' href='?menu=2&sle=".$number."'>";
                echo "<div class='sle button button_h' id='refresh'>".$number;
         }else{ 
               echo "<center><a class='refresh_a'>";
                echo "<div class='sle_e button' id='refresh'>".$number;     
          } ?>                

            </div></td>
            <td width="200"><div align="center"><?php echo "<b><font color=$color>$color</font></b>";  ?></div></td>  
            <td width="200"><div align="center"><?php echo "<font color=000000>$alcohol</font>";  ?></div></td>
            <td width="200"><div align="center"><?php echo "<font color=000000>".number_format($price)." Bath</font>";  ?></div></td>
         <?php   if($status==1){  ?>  
            <td width="10"><div align="center"><b><font color=red>Not</font></b></div></td>
        <?php    }else if($status==2){   ?>  
            <td width="10"><div align="center"><b><font color=blue>Making</font></b></div></td>
       <?php    }else if($status==3){   ?>
            <td width="10"><div align="center"><b><font color=black>Cancle</font></b></div></td>
       <?php    }else if($status==4){   ?>
            <td width="10"><div align="center"><b><font color=Orange>Exigent</font></b></div></td>
       <?php    }else if($status==5){   ?>
            <td width="10"><div align="center"><b><font color=Yellow>Making Ext</font></b></div></td>
       <?php    }else{   ?>  
            <td width="10"><div align="center"><b><font color=green>Finish</font></b></div></td>
       <?php     }  ?> 

            <td width="10"><div align="center"><b><font color=green>
<?php            if($status==1 or $status==2 or $status==4 or $status==5){ ?>
                <center><a class='refresh_a' id='cancle_button' href='?menu=2&X=<?php echo $number;?>#popup2'>
                <div class='cancle button button_h' id='refresh'>Cancle
<?php             }else{ ?>
                <center><a class='refresh_a' id='cancle_button'>
                <div class='cancle_e button'>Cancle         
<?php            } ?>
                </div>             
                </a></center>

            </font></b></div></td>

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