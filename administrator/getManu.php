<?php
include('../func/config.php');
if(!$user->is_logged_in()){ header('Location: login'); }
global $db;
if($_POST['id'])
{
	$id=$_POST['id'];
		
	$stmt = mysqli_query($db,"select distinct(m.manu_id),m.manu_name from manufactures m, sub_category sc where m.manu_id=sc.manu_id and category_Id='".$id."'");
	?><option selected="selected">--Select Manufactures--</option><?php
	while($row_manu= mysqli_fetch_assoc($stmt))
	{
		?>
        	<option value="<?php echo $row_manu['manu_id']; ?>"><?php echo $row_manu['manu_name']; ?></option>
        <?php
	}
}
?>
