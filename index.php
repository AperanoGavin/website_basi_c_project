<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<?php
	$title = 'Accueil';
	include('includes/head.php');
	?>
	<body>

		<?php include('includes/header.php'); ?>

		<main>
			<div class="container">
				<?php include('includes/message.php'); ?>
				
				<?php
				if(isset($_SESSION['email'])){
					
					include('includes/db.php');
			
								
								
							   
					$recupUsers = $bdd->query('select * from doctor'); 
					 while ($user = $recupUsers->fetch()){
						 ?>
							   <p><?= $user['email_doctor']; ?> 

						  <?php	 echo'<img src="uploads/' . $user['image_doctor'] . '" alt="Image de profil" width="50" height="100" >';
			   
								  ?>
								  </br>
								  
				<?php 
					 }

						}else if(isset($_SESSION['email_doctor'])){
					
								include('includes/db.php');
			
								
								
							   
								  $recupUsers = $bdd->query('select * from users'); 
								   while ($user = $recupUsers->fetch()){
									   ?>
											 <p><?= $user['email']; ?> 

										<?php echo '<img src="uploads/' . $user['image'] . '" alt="Image de profil" width="50" height="100">';
							 
												?>
												</br>
												
							  <?php 
								   }
							  
							
								
							
				}else{
					echo'<p>Bienvenue sur Doctodog.</p>';
				}
				?>
			</div>
		</main>

		<?php include('includes/footer.php'); ?>

	</body>
</html>