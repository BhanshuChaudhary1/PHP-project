<?php

include "projectheader.php";
include "projectmenu.php";
$con=mysqli_connect('localhost','root','','shoppingcart');
?>
<div class="grid_10">
	<div class="box round first">
		<h2>
			Display item
		</h2>
		<div class="block">
			<?php
			$res=mysqli_query($con,"select * from product");
			echo "<table>";
			echo "<tr>";
			echo "<th>";echo "product image";  echo "</th>";
			echo "<th>";echo "product name";  echo "</th>";
			echo "<th>";echo "product price";  echo "</th>";
			echo "<th>";echo "product quantity";  echo "</th>";
			echo "<th>";echo "product category";  echo "</th>";
			echo "<th>";echo "delete";  echo "</th>";
			echo "<th>";echo "edit";  echo "</th>";
			echo "</tr>";
			while($row=mysqli_fetch_array($res))
			{
				echo "<tr>";
				echo "<td>"; ?> <img src="<?php echo $row["productimage"]; ?>" height="100" width="100"> <?php echo "</td>";
				echo "<td>"; echo $row["productname"]; echo "</td>";
				echo "<td>"; echo $row["productprice"]; echo "</td>";
				echo "<td>"; echo $row["productqty"]; echo "</td>";
				echo "<td>"; echo $row["productcategory"]; echo "</td>";
				echo "<td>"; ?>  <a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a>  <?php echo "</td>";
				echo "<td>"; ?>  <a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a>  <?php echo "</td>";

				echo "</tr>";
			}
			echo "</table>";


			?>
		</div>
	</div>
	<?php
	include "projectfooter.php";
	?>

