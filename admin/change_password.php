<!-- Header Include -->
<link rel="stylesheet" type="text/css" href="../css/style.css">
<title>Getlisting - Change Paassword</title>
<?php include('header.php'); ?>

<?php include('prevent_admin.php'); ?>

<?php  

	$admin = mysqli_query($conn,"SELECT * FROM admin WHERE id='{$_SESSION['admin_id']}'");

	$admin_row = mysqli_fetch_row($admin);

	if (mysqli_num_rows($admin)>0) 
        {
            echo "

            	<div class='sidebar'>
	            	<label><a href='home.php'>Home</a></label>
	            	<label><a href='profile.php'>Profile</a></label>
	            	<label><a href='feedback.php'>Feedbacks</a></label>
	            	<label><a href='allow_listing.php'>Allow Listing</a></label>
	            	<label><a href='allow_blog.php'>Allow Blog</a></label>
	            	<label><a href='change_password.php'>Change Password</a></label>
	            	<label><a href='logout.php'>Logout</a></label>
	            </div>
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='change_password.php' class='a_right'>Change Password</a></label>
	            </div>
	            <div class='change_password'>
	            	<h2>Change You Password</h2>
					<form class='authen_form' method='POST'>
						<input type='password' placeholder='Old Password' name='old_password'>
						<input type='password' placeholder='New Password' name='new_password'>
						<input type='submit' value='Change Password' name='submit'>
					</form>
				</div>

            ";

            if (isset($_POST['submit']))
			{
				    
				$old_password = $admin_row['4']; //from DB
				$new_password = $_POST['new_password'];

				if($_POST['old_password']!='' && ($_POST['old_password'] == $old_password))
				{
					$query = mysqli_query($conn,"UPDATE admin SET password = '$new_password' WHERE id = '{$_SESSION['admin_id']}' ");

					if ($query==TRUE) 
					{
						echo "<script>alert('Your password is changed successfully')</script>";
					}
					
				}
				else
				{
					echo "<script>alert('Old Password was wrong.')</script>";
				}
	   		}
        }

?>