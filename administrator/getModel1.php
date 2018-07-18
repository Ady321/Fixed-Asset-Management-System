<?php
include('../func/config.php');
if(!$user->is_logged_in()){ header('Location: login'); }
global $db;
global $m1;
if($_POST['id'])
{
	$id=$_POST['id'];
	
	$stmt = mysqli_query($db, "select sub_Id,Name from sub_category where manu_id='".$id."'")
	?><option selected="selected">--Select Model--</option>
	<?php while($row_model= mysqli_fetch_assoc($stmt))
	{
            
		?>
		<option value="<?php echo $row_model['sub_Id']; ?>"><?php echo $row_model['Name']; ?></option>
		<?php
	}
}
?>