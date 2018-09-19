<?php 
  include 'header.php';
  include 'config.php';
  include 'database.php';
?>

<?php
	$id    = $_GET['id'];
	$db    = new Database();// DATABASE class object
	$query ="SELECT * FROM tbl_user WHERE ID=$id";
	$getData = $db->select($query)->fetch_assoc();


	if (isset($_POST['submit'])) {
			//mysqli_real_escape_string FUNCTION save your Database from any scripting language

		$name=mysqli_real_escape_string($db->link, $_POST['name']);
		$email=mysqli_real_escape_string($db->link,$_POST['email']);
		$skill=mysqli_real_escape_string($db->link,$_POST['skill']);
		if ($name ==''|| $email==''|| $skill=='') {
			$error="Update Fail";
		}else {
			$query="UPDATE tbl_user 
			SET Name='$name',  Email='$email', Skill='$skill'  
			WHERE ID = $id"; 
						///////////////////SET the address from (Name/Email/Skill) DB Table 


			$update=$db->update($query);//create a UPDATE METHOD and link with database.php file
		}

	}  
?>

<?php 
	if (isset($_POST['delete'])) {
		$query="DELETE FROM tbl_user WHERE ID=$id";
		$deleteData=$db->delete($query);
	}
?>



<?php
  if (isset($error)) {
    echo "<span style='color:red'>".$error."</span>";
  }
?>


<form action="update.php?id=<?php echo $id;?>" method="post">
<table>
	<tr>
		<td>Name</td>
		<td><input type="text" name="name" value="<?php echo $getData['Name']?>" "></td>
	</tr>
	<tr>
		<td>Email</td>
		<td><input type="text" name="email" value="<?php echo $getData['Email']?>"></td>
	</tr>
	<tr>
		<td>Skill</td>
		<td><input type="text" name="skill" value="<?php echo $getData['Skill']?>"></td>
	</tr>
	<tr>
		<td></td>
		<td>
			<input type="submit" name="submit" value="Update "/>
			<input type="reset" value="Cancel">
			<input type="submit" name="delete" value="Delete">

		</td>
	</tr>
</table>
</form>
 
 <a href="index.php">Go Back</a>



<?php include 'footer.php';?>