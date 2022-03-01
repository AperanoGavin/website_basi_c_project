<?php
	$title = 'Connexion';
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

						<form method="post" action="verification.php" id="form1">
						<div class="mb-3">
							<label class="form-label">Votre email</label>
							<input type="email" name="email" class="form-control" value="<?php echo isset($_COOKIE['email']) ? $_COOKIE['email'] : ''; ?>">
						</div>
						<div class="mb-3">
							<label class="form-label">Votre mot de passe</label>
							<input type="password" name="password" class="form-control">
						</div>
						<input type="submit" value="Se connecter" class="btn btn-primary" id="form1">
						</form>
					 </div>

						
					 <div class="course-col">

						<form method="post" action="verification_doctor.php" id="form2">
						<div class="mb-3">
							<label class="form-label">Votre email</label>
							<input type="email" name="email_doctor" class="form-control" value="<?php echo isset($_COOKIE['email_doctor']) ? $_COOKIE['email_doctor'] : ''; ?>">
						</div>
						<div class="mb-3">
							<label class="form-label">Votre mot de passe</label>
							<input type="password" name="password_doctor" class="form-control">
						</div>
						<input type="submit" value="Se connecter" class="btn btn-primary" id="form2">
						</form>
					 </div>
					 </div>
				</section>
			</div>
		</main>

		<?php include('includes/footer.php'); ?>

	</body>
</html>