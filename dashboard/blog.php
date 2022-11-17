<!-- Header Include -->
<link rel="stylesheet" type="text/css" href="../css/style.css">
<?php include('header.php'); ?>

<?php include('prevent_user.php'); ?>

<!-- User Roll Code For Dashboard-->
<?php 	
		$user = mysqli_query($conn,"SELECT * FROM user_type WHERE id='{$_SESSION['id']}' AND type='user'");
        $free = mysqli_query($conn,"SELECT * FROM user_type WHERE id='{$_SESSION['id']}' AND type='free'");
        $standard = mysqli_query($conn,"SELECT * FROM user_type WHERE id='{$_SESSION['id']}' AND type='standard'");
		$premium = mysqli_query($conn,"SELECT * FROM user_type WHERE id='{$_SESSION['id']}' AND type='premium'");
        
        // Fetching all the above data
        $user_row = mysqli_fetch_row($user);
        $free_row = mysqli_fetch_row($free);
        $standard_row = mysqli_fetch_row($standard);
        $premium_row = mysqli_fetch_row($premium);

        // Dashboard as per the priority
        if (mysqli_num_rows($free)>0) 
        {
        	$blog = mysqli_query($conn,"SELECT * FROM blog WHERE member_email = '{$free_row['2']}'");

        	include('free_sidebar.php');
        	?>
        	<title><?php echo ucfirst($free_row['1'])." - Blogs"; ?></title>
        	<?php
            echo "
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='blog.php' class='a_right'>Blog</a></label>
	            </div>
	            <div class='listing'>
					<table>
						<tr>
							<th>Sr No</th>
							<th>Blog Title</th>
							<th>Blog Description</th>
							<th>Blog Date</th>
							<th>Action</th>
						</tr>
					";
	
						if (mysqli_num_rows($blog)>0) 
						{
							$i = 1;
							while ($blog_row = mysqli_fetch_row($blog)) 
							{
								echo '

								<tr>
									<td>'.$i.'</td>
									<td>'.$blog_row['3'].'</td>
									<td>'.$blog_row['4'].'</td>
									<td>'.$blog_row['5'].'</td>
									<td><a href="blog_details.php?id='. $blog_row['0'] .'">View</a></td>
								</tr>

								';
								$i++;
							}
							
						}
						
						
					echo "
							<tr>
								<th>Sr No</th>
								<th>Blog Title</th>
								<th>Blog Description</th>
								<th>Blog Date</th>
								<th>Action</th>
							</tr>
						</table>
				</div>

					";
        }
        elseif (mysqli_num_rows($standard)>0)
        {
        	$blog = mysqli_query($conn,"SELECT * FROM blog WHERE member_email = '{$standard_row['2']}'");

        	include('standard_sidebar.php');
        	?>
        	<title><?php echo ucfirst($standard_row['1'])." - Blogs"; ?></title>
        	<?php
            echo "
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='blog.php' class='a_right'>Blog</a></label>
	            </div>
	            <div class='listing'>
					<table>
						<tr>
							<th>Sr No</th>
							<th>Blog Title</th>
							<th>Blog Description</th>
							<th>Blog Date</th>
							<th>Action</th>
						</tr>
					";
	
						if (mysqli_num_rows($blog)>0) 
						{
							$i = 1;
							while ($blog_row = mysqli_fetch_row($blog)) 
							{
								echo '

								<tr>
									<td>'.$i.'</td>
									<td>'.$blog_row['3'].'</td>
									<td>'.$blog_row['4'].'</td>
									<td>'.$blog_row['5'].'</td>
									<td><a href="blog_details.php?id='. $blog_row['0'] .'">View</a></td>
								</tr>

								';
								$i++;
							}
							
						}
						
						
					echo "
							<tr>
								<th>Sr No</th>
								<th>Blog Title</th>
								<th>Blog Description</th>
								<th>Blog Date</th>
								<th>Action</th>
							</tr>
						</table>
				</div>

					";
        }
        elseif (mysqli_num_rows($premium)>0)
        {

        	$blog = mysqli_query($conn,"SELECT * FROM blog WHERE member_email = '{$premium_row['2']}'");

        	include('premium_sidebar.php');
        	?>
        	<title><?php echo ucfirst($premium_row['1'])." - Blogs"; ?></title>
        	<?php
            echo "
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='blog.php' class='a_right'>Blog</a></label>
	            </div>
	            <div class='listing'>
					<table>
						<tr>
							<th>Sr No</th>
							<th>Blog Title</th>
							<th>Blog Description</th>
							<th>Blog Date</th>
							<th>Action</th>
						</tr>
					";
	
						if (mysqli_num_rows($blog)>0) 
						{
							$i = 1;
							while ($blog_row = mysqli_fetch_row($blog)) 
							{
								echo '

								<tr>
									<td>'.$i.'</td>
									<td>'.$blog_row['3'].'</td>
									<td>'.$blog_row['4'].'</td>
									<td>'.$blog_row['5'].'</td>
									<td><a href="blog_details.php?id='. $blog_row['0'] .'">View</a></td>
								</tr>

								';
								$i++;
							}
							
						}
						
						
					echo "
							<tr>
								<th>Sr No</th>
								<th>Blog Title</th>
								<th>Blog Description</th>
								<th>Blog Date</th>
								<th>Action</th>
							</tr>
						</table>
				</div>

					";


        }
        
?>