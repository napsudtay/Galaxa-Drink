<link rel="shortcut icon" href="img/icon2.png" />
<?php
include('menu.php');
include('style.css');
@$_GET['menu']?$menu=@$_GET['menu']:$menu="";
if($menu==2){
echo "<title>Galaxa Drink - Make Panel</title>";
include('make.php');
}
elseif($menu==3){
echo "<title>Galaxa Drink - Summary Panel</title>";
include('summary.php');
}else{
echo "<title>Galaxa Drink - Order Panel</title>";
include('order.php');
}
?>
<div style="color:#AAA; margin-bottom: 0px;">
<center>Power by NECHSTEP</center>
</div>