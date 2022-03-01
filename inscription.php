<!DOCTYPE html>
<html>
	<?php
	$title = 'Inscription';
	include('includes/head.php');
	?>
	<body>

		<?php include('includes/header.php'); ?>

		<main>
			<div class="container">
				<?php include('includes/message.php'); ?>
				<section id="course" class="course">
					

				<div class="row">
					
					 <div class="course-col">
					 <h5>login for dog</h5>
							<form method="post" action="verification_inscription.php" enctype="multipart/form-data" class="form1">

							
							<div class="mb-3">
							<label class="form-label">Votre email</label>
								<input type="email" name="email" class="form-control" placeholder="Votre email" value="<?php echo isset($_COOKIE['email']) ? $_COOKIE['email'] : ''; ?>">
							</div>
							<div class="mb-3">
							<label class="form-label">Votre mot de passe</label>
								<input type="password" name="password" class="form-control" placeholder="Votre mot de passe">
							</div>
								<input type="file" name="image" class="btn btn-outline-light" accept="image/gif, image/png, image/jpeg">
								<input type="submit" class="btn btn-primary" value="S'inscrire" >
							</form>

					   </div>
				

				
				
						<div class="course-col">
						<h5>login for doctor</h5>
							<form method="post" action="verification_inscription_doctor.php" enctype="multipart/form-data" class="form2">
							<div class="mb-3">
							<label class="form-label">Votre email doctor</label>
								<input type="email" name="email_doctor" class="form-control" placeholder="Votre email" value="<?php echo isset($_COOKIE['email']) ? $_COOKIE['email'] : ''; ?>">
							</div>
							<div class="mb-3">
							<label class="form-label">Votre mot de passe doctor</label>
								<input type="password" name="password_doctor" class="form-control" placeholder="Votre mot de passe">
							</div>
								<input type="file" name="image_doctor" class="btn btn-outline-light" accept="image/gif, image/png, image/jpeg">
								<input type="submit" class="btn btn-primary" value="S'inscrire" >
							</form>
						</div>
				</div>
				</section>
			</div>
		</main>

		<?php include('includes/footer.php'); ?>

	</body>
</html>