<?php

include "projectheader.php";
include "projectmenu.php";
$con=mysqli_connect('localhost','root','','shoppingcart');
$id=$_GET["id"];
$res=mysqli_query($con,"select * from product where id=".$id);
while ($row=mysqli_fetch_array($res)) 
{
	$product_name=$row["productname"];
	$product_price=$row["productprice"];
	$product_qty=$row["productqty"];
	$product_img=$row["productimage"];
	$product_cat=$row["productcategory"];
	$product_deac=$row["pproduct_desc"];
}

?>
<div class="grid_10">
	<div class="box round first">
		<h2>
			Edit item
		</h2>
		<div class="block">
			<form name="form1" action="" method="POST" enctype="multipart/form-data">
                    <table>
                    	<tr>
                    		<td colspan="2" align="center">
                    			<img src="<?php echo $product_img; ?>" height="100" width="100">
                    		</td>
                    	</tr>
                        <tr>
                            <td>Product Name</td>
                            <td><input type="text" name="pnm" value="<?php echo $product_name ?>"></td>
                        </tr>
                        <tr>
                            <td>Product Price</td>
                            <td><input type="text" name="pprice" value="<?php echo $product_price ?>"></td>
                        </tr>
                        <tr>
                            <td>Product Quantity</td>
                            <td><input type="text" name="pqty" value="<?php echo $product_qty ?>"></td>
                        </tr>
                        <tr>
                            <td>Product Image</td>
                            <td><input type="file" name="pimage"></td>
                        </tr>
                        <tr>
                            <td>Product Category</td>
                            <td>
                                <input type="text" name="pcategory" value="<?php echo $product_cat ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Product Description</td>
                            <td><textarea cols="15" rows="10" name="pdesc" value="<?php echo $product_deac ?>"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"><input type="submit" name="submit1" value="update"></td>
                        </tr>
                    </table>
                </form>

		</div>
	</div>
    <?php
    if (isset($_POST["submit1"])) 
    {
    	$fnm=$_FILES["pimage"]["name"];
    	if($fnm="")
    	{
    		mysqli_query($con,"update product set productimage='$_POST[pimage]',productname='$_POST[pnm]',productprice='$_POST[pprice]',productqty='$_POST[pqty]',productcategory='$_POST[pcategory]',pproduct_desc='$_POST[pdesc]' where id=".$id);
    		
    	}
    	else
    	{
    		$v1=rand(1111,9999);
        $v2=rand(1111,9999);
        $v3=$v1.$v2;
        $v3=md5($v3);

        $fnm=$_FILES["pimage"]["name"];
        $dst="./product_image/".$fnm;
        $dst1="product_image/".$fnm;
        move_uploaded_file($_FILES["pimage"]["tmp_name"],$dst);

    		mysqli_query($con,"update product set productimage='$dst1',productname='$_POST[pnm]',productprice='$_POST[pprice]',productqty='$_POST[pqty]',productcategory='$_POST[pcategory]',pproduct_desc='$_POST[pdesc]' where id=".$id);
    	}
    	?>
    	<script type="text/javascript">
    		window.location="projectdisplay_item.php";
    	</script>
    	<?php
    }
    ?>

	<?php
	include "projectfooter.php";
	?>

