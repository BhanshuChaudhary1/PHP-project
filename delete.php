<?php
$con=mysqli_connect('localhost','root','','shoppingcart');
$id=$_GET["id"];


$res=mysqli_query($con,"select * from product where id=".$id);
while($row=mysqli_fetch_array($res))
{
	$img=$row["productimage"];
}
unlink($img);



mysqli_query($con,"delete from product where id=".$id);

?>
<script type="text/javascript">
	window.location="projectdisplay_item.php";
</script>