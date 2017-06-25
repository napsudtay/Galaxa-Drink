<?php
include('menu.php');
include('style.css');
echo"<link rel=\"icon\" href=\"img/icon2.png\" type=\"image/x-icon\">";
@$_GET['menu']?$menu=@$_GET['menu']:$menu="";
if($menu==2){
echo "<title>Shop - Make Panel</title>";
include('make.php');
}
elseif($menu==3){
echo "<title>Shop - Summary Panel</title>";
include('summary.php');
}else{
echo "<title>Shop - Order Panel</title>";
include('order.php');
}
?>
<div style="color:#CCC; margin-bottom: 0px;">
<center>Power by NECHSTEP</center>
</div>